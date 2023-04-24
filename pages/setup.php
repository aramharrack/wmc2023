<?php
include "db_connect.php";

$query[0] = "drop table if exists clients";
$query[1] = "create table clients
            (id int not null auto_increment,
            fullname varchar (30),
            emailaddress varchar (30),
            username varchar (30),
            password varchar (30),
            classicalusertype varchar (30),
            primary key(id))";

for ($i = 0; $i < sizeof($query); $i++) {
    echo "<p> Executing: " . $query[$i];
    $sql = mysqli_query($con, $query[$i]);
    if ($sql)
        echo "<p> Success! </p>";
    else
        echo "Something went wrong. " . print_r($db->errorInfo());
}

?>