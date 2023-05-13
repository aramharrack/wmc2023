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
         // Update the status back to "Assigned"
         $oppid = GetOpportunityIdFromInvestment($investmentid);
         $prefid = GetPreferenceIdFromOpportunity($oppid);
         UpdateStatus($oppid, $prefid);
         return true;
      } else {
         return false;
      }
   } catch (PDOException $e) {
      echo "Error deleting investment: " . $e->getMessage();
      return false;
   }
}

function GetOpportunityIdFromInvestment($investmentid)
{
   include "db_connect.php";

   $sql = "select opportunities.oppid
            from opportunities
            join instruments on opportunities.instrumentid = instruments.instrumentid
            join investments on investments.instrumentid = instruments.instrumentid
            where investments.investmentid = :investmentid";

   $query = $db->prepare($sql);
   $query->execute(array(':investmentid' => $investmentid));

   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
      $result = $query->fetch(PDO::FETCH_ASSOC);
   }
   return $result['oppid'];
}


function GetPreferenceIdFromOpportunity($oppid)
{
   include "db_connect.php";

   $sql = "select prefid 
            from preferenceopportunities 
            where oppid = :oppid";

   $query = $db->prepare($sql);
   $query->execute(array(':oppid' => $oppid));

   if ($query) {
      $result = $query->fetch(PDO::FETCH_ASSOC);
      if ($result) {
         return $result['prefid'];
      }
   }

   return false;
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