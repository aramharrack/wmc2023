<?php
function GetInstrument($instrumentid)
{
    include "db_connect.php";
    $instrumentinfos = array();
    //could modify query to take the attributes needed, but this is easier
    //but if assettype, industry sector, country and region could state it here
    $sql = "select *
            from instruments
            where instrumentid = :instrumentid";

    //prepare the query
    $query = $db->prepare($sql);
    $query->execute(array(':instrumentid' => $instrumentid));

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $instrumentinfos[] = $row;
    }
    return $instrumentinfos;
}

function GetInstrumentOptions()
{
    include "db_connect.php";
    $sql = "select instrumentid, instrumentname from instruments";
    $query = $db->prepare($sql);
    $query->execute();
    $options = '';
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['instrumentid'] . '">' . $row['instrumentname'] . '</option>';
    }
    return $options;
}

function GetAdminID($username)
{
    include "db_connect.php";

    $sql = "select id
            from admins
            where username = :username";

    //prepare the query
    $query = $db->prepare($sql);
    $query->execute(array(':username' => $username));

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $adminid = $row['id'];
    }
    return $adminid;
}

function InsertOpportunity($instrumentid, $availabledate, $closingdate, $oppdetails, $staffid)
{
    include "db_connect.php";

    $sql = "insert into opportunities
            values(:instrumentid, :availabledate, :closingdate, :oppdetails, :staffid)";
    //prepare the query
    $query = $db->prepare($sql);
    //execute the query
    if ($query) {
        $oppid = null;
        $query->execute(
            array(
                ':oppid' => $oppid,
                ':instrumentid' => $instrumentid,
                ':availabledate' => $availabledate,
                ':closingdate' => $closingdate,
                ':oppdetails' => $oppdetails,
                ':countrycode' => $countrycode,
                ':staffid' => $staffid
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