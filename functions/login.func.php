<?php
function getClassicalUser($username, $password)
{
    include "db_connect.php";

    $hash = "wmc@2023";
    $password = crypt($password, $hash);

    $sql = "select classicalusertype
            from clients
            where username = :username AND password = :password
            union all
            select classicalusertype
            from managers
            where username = :username AND password = :password
            union all
            select classicalusertype
            from admins
            where username = :username AND password = :password";

    $query = $db->prepare($sql);
    $query->execute([
        ':username' => $username,
        ':password' => $password
    ]);

    if (!$query) {
        echo "Something went wrong. " . print_r($db->errorInfo());
    }

    $numRows = $query->rowCount();
    if ($numRows > 0) {
        return $query;
    }
    return null;
}
?>