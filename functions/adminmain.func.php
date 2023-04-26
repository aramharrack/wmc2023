<?php
function GetInstruments()
{
    include "db_connect.php";

    $instrumentinfos = array();
    
    $sql = "select instruments.*, admins.fullname
            from instruments, admins
            where instruments.staffid = admins.id";
    
    $query = $db->prepare($sql);
    $query->execute();

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        while ($row = $query->fetch(PDO::FETCH_ASSOC))
            $instrumentinfos[] = $row;
    }
    return $instrumentinfos;
}
?>