<?php
function GetUserInfo($username)
{
    include "db_connect.php";

    $clientinfos = array();

    $sql = "select * 
            from clients
            where username = :username
            union all
            select *
            from managers
            where username = :username
            union all
            select *
            from admins
            where username = :username";

    $query = $db->prepare($sql);
    $query->execute(array(':username' => $username));

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $clientinfos[] = $row;
    }
    return $clientinfos;
}

function CheckPassword($password, $confirmPassword)
{
    $errors = [];
    if (strlen($password) < 8)
        $errors[] = 'Password must be at least 8 characters long!';
    if (!preg_match('/[a-z]/', $password))
        $errors[] = 'Password must contain at least one lowercase letter!';
    if (!preg_match('/[A-Z]/', $password))
        $errors[] = 'Password must contain at least one uppercase letter!';
    if (!preg_match('/\d/', $password))
        $errors[] = 'Password must contain at least one number!';
    if ($password !== $confirmPassword)
        $errors[] = 'Passwords do not match!';
    return $errors;
}

function UpdateUser($id, $fullname, $emailaddress, $username, $password, $classicalusertype)
{
    include "db_connect.php";

    if ($classicalusertype == "Relationship Manager") {
        $usertable = "managers";
    } else if ($classicalusertype == "Client") {
        $usertable = "clients";
    } else if ($classicalusertype == "Administrator") {
        $usertable = "admins";
    }else
    echo "Unrecognised user type found!";

    $sql = "update $usertable
            set fullname = :fullname,
                emailaddress = :emailaddress,
                username = :username,
                password = :password,
                classicalusertype = :classicalusertype
            where id = :id";
    //prepare the query
    $query = $db->prepare($sql);
    //execute the query
    if ($query) {
        $hash = "wmc@2023";
        $password = crypt($password, $hash);
        $query->execute(
                    array(
                        ':id' => $id,
                        ':fullname' => $fullname,
                        ':emailaddress' => $emailaddress,
                        ':username' => $username,
                        ':password' => $password,
                        ':classicalusertype' =>$classicalusertype
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