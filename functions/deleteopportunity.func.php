<?php
function DeleteOpportunity($oppid)
{
   include "db_connect.php";

   $sql = "DELETE FROM opportunities WHERE oppid = :oppid";

   try {
      // prepare the query
      $query = $db->prepare($sql);
      $query->bindParam(':oppid', $oppid, PDO::PARAM_INT);

      // execute the query
      if ($query->execute()) {
         return true;
      } else {
         return false;
      }
   } catch (PDOException $e) {
      echo "Error deleting opportunity: " . $e->getMessage();
      return false;
   }
}
?>