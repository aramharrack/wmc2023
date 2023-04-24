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

function GetPreferences($clientid)
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
        and clients.id = :clientid"; */

    $query = $db->prepare($sql);
    $query->execute(array(':clientid' => $clientid));

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        while ($row = $query->fetch(PDO::FETCH_ASSOC))
            $prefinfos[] = $row;
    }
    return $prefinfos;
}

function GetIdeas()
{
    include "db_connect.php";

    $oppinfos = array();

    $sql = "select oppname
            from opportunities";

    $result = $db->query($sql);
    if (!$result)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        while ($row = $result->fetch(PDO::FETCH_ASSOC))
            $oppinfos[] = $row;
    }
    return $oppinfos;
}
?>