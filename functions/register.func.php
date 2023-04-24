<?php
function CheckUsernameExists($username)
{
    include "db_connect.php";
    // Check if the username already exists in any of the user tables
    $query = $db->prepare("
        select username from clients where username = :username
        union
        select username from managers where username = :username
        union
        select username from admins where username = :username
    ");
    $query->bindParam(':username', $username);
    $query->execute();

    return ($query->rowCount() > 0);
}

function CheckPassword($password, $confirmPassword)
{
    // Check length
    if (strlen($password) < 8) {
        return 'Password must be at least 8 characters long';
    }
    // Check lowercase letter
    if (!ctype_lower($password)) {
        return 'Password must contain at least one lowercase letter';
    }
    // Check uppercase letter
    if (!ctype_upper($password)) {
        return 'Password must contain at least one uppercase letter';
    }
    // Check number
    if (!preg_match('/\d/', $password)) {
        return 'Password must contain at least one number';
    }
    // Check confirm password
    if ($password !== $confirmPassword) {
        return 'Confirm password does not match';
    }
    return null;
}

function InsertRegistration($fullname, $emailaddress, $username, $password, $classicalusertype)
{
    include "db_connect.php";

    if ($classicalusertype == "managers") {
        $usertable = "managers";
        $classicalusertype = "Relationship Manager";
    } else if ($classicalusertype == "clients") {
        $usertable = "clients";
        $classicalusertype = "Client";
    } else if ($classicalusertype == "admins") {
        $usertable = "admins";
        $classicalusertype = "Administrator";
    }

    $sql = "insert into $usertable
            values(:id, :fullname, :emailaddress, :username, :password, :classicalusertype)";
    //prepare the query
    $query = $db->prepare($sql);
    //execute the query
    if ($query) {
        $hash = "wmc@2023";
        $id = null;
        $password = crypt($password, $hash);
        $query->execute(
            array(
                ':id' => $id,
                ':fullname' => $fullname,
                ':emailaddress' => $emailaddress,
                ':username' => $username,
                ':password' => $password,
                ':classicalusertype' => $classicalusertype
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