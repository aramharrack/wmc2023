<?php
function DeleteInstrument($instrumentid)
{
   include "db_connect.php";

   $sql = "delete from instruments 
            where instrumentid = :instrumentid";

   try {
      // prepare the query
      $query = $db->prepare($sql);
      $query->bindParam(':instrumentid', $instrumentid, PDO::PARAM_INT);

      // execute the query
      if ($query->execute()) {
         return true;
      } else {
         return false;
      }
   } catch (PDOException $e) {
      echo "Error deleting instrument: " . $e->getMessage();
      return false;
   }
}
?>