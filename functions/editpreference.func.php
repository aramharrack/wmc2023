<?php
function EditPreference($prefid, $datesubmitted, $prefdetails, $clientid, $assetid, $parmcode, $countrycode, $regionid)
{
    include "db_connect.php";

    $sql = "update preferences
            set datesubmitted = :datesubmitted,
                prefdetails = :prefdetails,
                clientid = :clientid,
                assetid = :assetid, 
                parmcode = :parmcode,
                countrycode = :countrycode,
                regionid = :regionid
            where prefid = :prefid";
    //prepare the query
    $query = $db->prepare($sql);
    //execute the query
    if ($query) {
        $query->execute(
            array(
                ':datesubmitted' => $datesubmitted,
                ':prefdetails' => $prefdetails,
                ':clientid' => $clientid,
                ':assetid' => $assetid,
                ':parmcode' => $parmcode,
                ':countrycode' => $countrycode,
                ':regionid' => $regionid,
                ':prefid' => $prefid
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

function GetPreference($prefid)
{
    include "db_connect.php";

    $prefinfos = array();

    $sql = "select prefid,datesubmitted,prefdetails
            from preferences
            where prefid = :prefid";

    $query = $db->prepare($sql);
    $query->execute(array(':prefid' => $prefid));

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $prefinfos[] = $row;
    }
    return $prefinfos;
}

function GetAssetOptions()
{
    include "db_connect.php";
    $sql = "select assetid, assetdesc from assettypes order by assetid asc";
    $query = $db->prepare($sql);
    $query->execute();
    $options = '';
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['assetid'] . '">' . $row['assetid']." - ".$row['assetdesc'] . '</option>';
    }
    return $options;
}

function GetIndustryOptions()
{
    include "db_connect.php";
    $sql = "select parmcode, sectordesc from industrysectors order by parmcode asc";
    $query = $db->prepare($sql);
    $query->execute();
    $options = '';
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['parmcode'] . '">' . $row['parmcode']." - ".$row['sectordesc'] . '</option>';
    }
    return $options;
}

function GetCountryOptions()
{
    include "db_connect.php";
    $sql = "select countrycode, countryname from countries order by countryname asc";
    $query = $db->prepare($sql);
    $query->execute();
    $options = '';
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['countrycode'] . '">' . $row['countrycode']." - ".$row['countryname'] . '</option>';
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