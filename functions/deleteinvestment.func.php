<?php
function DeleteInvestment($investmentid)
{
   include "db_connect.php";

   $sql = "DELETE FROM investments WHERE investmentid = :investmentid";

   try {
      // prepare the query
      $query = $db->prepare($sql);
      $query->bindParam(':investmentid', $investmentid, PDO::PARAM_INT);

      // execute the query
      if ($query->execute()) {
         return true;
      } else {
         return false;
      }
   } catch (PDOException $e) {
      echo "Error deleting investment: " . $e->getMessage();
      return false;
   }
}
?>