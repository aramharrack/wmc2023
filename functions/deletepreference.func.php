<?php 
function deletePreference($prefid) {
    include "db_connect.php";

    $sql = "DELETE FROM preferences WHERE prefid = :prefid";

    try {
        // prepare the query
        $query = $db->prepare($sql);
        $query->bindParam(':prefid', $prefid, PDO::PARAM_INT);

        // execute the query
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error deleting preference: " . $e->getMessage();
        return false;
    }
}
?>