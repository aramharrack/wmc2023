<?php
function InsertPreference($datesubmitted, $prefdetails, $clientid, $assetid, $parmcode, $countrycode, $regionid)
{
    include "db_connect.php";

    $sql = "insert into preferences
            values(:prefid, :datesubmitted, :prefdetails, :clientid, 
                    :assetid, :parmcode,:countrycode, :regionid)";
    //prepare the query
    $query = $db->prepare($sql);
    //execute the query
    if ($query) {
        $prefid = null;
        $query->execute(
            array(
                ':prefid' => $prefid,
                ':datesubmitted' => $datesubmitted,
                ':prefdetails' => $prefdetails,
                ':clientid' => $clientid,
                ':assetid' => $assetid,
                ':parmcode' => $parmcode,
                ':countrycode' => $countrycode,
                ':regionid' => $regionid
            )
        );
        if (!$query)
            echo "Something went wrong. " . print_r($db->errorInfo());
        else
            return $query;
    } else
        echo "Something went wrong." . print_r($db->errorInfo());
}

function getClientID($username)
{
    include "db_connect.php";

    $sql = "select id
            from clients
            where username = :username";

    //prepare the query
    $query = $db->prepare($sql);

    $query->execute(array(':username' => $username));

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $clientid = $row['id'];
    }
    return $clientid;
}

function GetAssetOptions()
{
    include "db_connect.php";
    $sql = "select assetid, assetdesc from assettypes";
    $query = $db->prepare($sql);
    $query->execute();
    $options = '';
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['assetid'] . '">' . $row['assetdesc'] . '</option>';
    }
    return $options;
}

function GetIndustryOptions()
{
    include "db_connect.php";
    $sql = "select parmcode, sectordesc from industrysectors";
    $query = $db->prepare($sql);
    $query->execute();
    $options = '';
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['parmcode'] . '">' . $row['sectordesc'] . '</option>';
    }
    return $options;
}

function GetCountryOptions()
{
    include "db_connect.php";
    $sql = "select countrycode, countryname from countries";
    $query = $db->prepare($sql);
    $query->execute();
    $options = '';
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['countrycode'] . '">' . $row['countryname'] . '</option>';
    }
    return $options;
}

function GetRegionOptions()
{
    include "db_connect.php";
    $sql = "select regionid, regionname from regions";
    $query = $db->prepare($sql);
    $query->execute();
    $options = '';
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['regionid'] . '">' . $row['regionname'] . '</option>';
    }
    return $options;
}
?>