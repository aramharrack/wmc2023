<?php
function GetOpportunities($username)
{
    include "db_connect.php";

    $oppinfos = array();
    
    $sql = "select *
            from opportunities, admins 
            where admins.id = opportunities.staffid
            and admins.username = :username";
    
    $query = $db->prepare($sql);
    $query->execute(array(':username' => $username));

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        while ($row = $query->fetch(PDO::FETCH_ASSOC))
            $oppinfos[] = $row;
    }
    return $oppinfos;
}
?>