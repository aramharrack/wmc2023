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

function UpdateStatus($oppid, $prefid)
{
   include "db_connect.php";

   $sql = "update preferenceopportunities 
            set status = 'Assigned' 
            where oppid = :oppid 
            and prefid = :prefid";

   $query = $db->prepare($sql);

   $query->execute(
      array(
         ':oppid' => $oppid,
         ':prefid' => $prefid
      )
   );

   if (!$query) {
      echo "Something went wrong. " . print_r($db->errorInfo());
      return false;
   }
   return true;
}
?>