<?php 
function DeletePreference($prefid) {
    include "db_connect.php";
    
    $sql = "delete from preferences 
            where prefid = :prefid";
    
    $query = $db->prepare($sql);

    if ($query) {
        $query->execute(array(':prefid' => $prefid));
        if (!$query)
            echo "Something went wrong. " . print_r($db->errorInfo());
        else
            return $query;
    } else
        echo "Something went wrong." . print_r($db->errorInfo());
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

?>