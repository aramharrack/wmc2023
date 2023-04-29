<?php
function GetClientInfo($clientname)
{
    include "db_connect.php";

    $clientinfos = array();

    $sql = "select *
            from clients
            where fullname = :clientname";

    $query = $db->prepare($sql);
    $query->execute(array(':clientname' => $clientname));

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $clientinfos[] = $row;
    }
    return $clientinfos;
}

/*function GetPreferences($clientid)
{
    include "db_connect.php";

    $prefinfos = array();

    $sql = "select preferences.prefid, preferences.datesubmitted, preferences.prefdetails
            from preferences, clients 
            where clients.id = preferences.clientid
            and clients.id = :clientid";

    /* $sql = "select preferences.prefid, preferences.datesubmitted, preferences.prefdetails, 
    assettypes.assetdesc, industrysectors.sectordesc,
    countries.countryname, regions.regionname
    from preferences, clients, assettypes, industrysectors, countries, regions 
    where clients.id = preferences.clientid
    and assettypes.assetid = preferences.assetid
    and industrysectors.parmcode = preferences.parmcode
    and countries.countrycode = preferences.countrycode
    and regions.regionid = preferences.regionid
    and clients.id = :clientid";

    $query = $db->prepare($sql);
    $query->execute(array(':clientid' => $clientid));

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        while ($row = $query->fetch(PDO::FETCH_ASSOC))
            $prefinfos[] = $row;
    }
    return $prefinfos;
}*/

function GetPreferences($clientid, $prefid = null) 
{
    include "db_connect.php";
    
    $sql = "select * 
            from preferences 
            where clientid = :clientid";

    if ($prefid) {
        $sql .= " and prefid = :prefid";
    }
    $query = $db->prepare($sql);
    $query->bindValue(':clientid', $clientid, PDO::PARAM_INT);
    if ($prefid) {
        $query->bindValue(':prefid', $prefid, PDO::PARAM_INT);
    }
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function GetIdeas()
{
    include "db_connect.php";

    $oppinfos = array();

    $sql = "select opportunities.oppid, opportunities.oppname, instruments.shortname
            from opportunities,instruments
            where opportunities.instrumentid = instruments.instrumentid";
    $query = $db->prepare($sql);
    $query->execute();
    if (!$query) {
        echo "Something went wrong. " . print_r($db->errorInfo());
    } else {
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $oppinfos[] = $row;
        }
    }
    return $oppinfos;
}

function AssignOpportunity($prefid, $oppid)
{
    include "db_connect.php";
    $status = "assigned";
    
    /*insert to db */
    $sql = "insert into preferenceopportunities
            values(:prefid, :oppid, :status)";
    //prepare the query
    $query = $db->prepare($sql);
    //execute the query
    if ($query) {
        $query->execute(
            array(
                ':prefid' => $prefid,
                ':oppid' => $oppid,
                ':status' => $status
            )
        );
        if (!$query)
            echo "Something went wrong. " . print_r($db->errorInfo());
        else
            return $query;
    } else
        echo "Something went wrong." . print_r($db->errorInfo());
}
?>