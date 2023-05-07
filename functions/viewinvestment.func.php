<?php
function GetClientID($username)
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
function GetInvestments($clientid)
{
    include "db_connect.php";

    $investinfos = array();
    
    $sql = "select investments.*, instruments.instrumentname, clients.fullname
            from investments, instruments, clients
            where investments.instrumentid = instruments.instrumentid
            and clients.id = investments.clientid
            and investments.clientid = :clientid";
    
    $query = $db->prepare($sql);
    $query->execute(array(':clientid' => $clientid));

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        while ($row = $query->fetch(PDO::FETCH_ASSOC))
            $investinfos[] = $row;
    }
    return $investinfos;
}
?>