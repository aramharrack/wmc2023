<?php
function GetOpportunity($oppid)
{
   include "db_connect.php";

   $sql = "select opportunities.oppid, opportunities.oppname, instruments.instrumentid,   
                instruments.shortname,instruments.issuer,instruments.currency, instruments.closingprice,
                instruments.priceclosingdate 
            from opportunities, instruments
            where opportunities.oppid = :oppid
            and opportunities.instrumentid = instruments.instrumentid";

   $query = $db->prepare($sql);
   $query->execute(array(':oppid' => $oppid));

   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
      $opportunities = $query->fetchAll(PDO::FETCH_ASSOC);
   }
   return $opportunities;
}

function getClientID($username)
{
   include "db_connect.php";

   $sql = "select id
            from clients
            where username = :username";

   //prepare the query
   $query = $db->prepare($sql);

   $query->execute(array(':username' => $username));

   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
      $row = $query->fetch(PDO::FETCH_ASSOC);
      $clientid = $row['id'];
   }
   return $clientid;
}

function InsertInvestment($investmentdate, $instrumentid, $clientid, $comments, $oppid, $prefid)
{
   include "db_connect.php";

   // Check if investment already exists
   $sql = "select count(*) 
            from investments 
            where instrumentid = :instrumentid 
            and clientid = :clientid";

   $query = $db->prepare($sql);
   $query->execute(
      array(
         ':instrumentid' => $instrumentid,
         ':clientid' => $clientid
      )
   );
   $result = $query->fetch(PDO::FETCH_ASSOC);
   $count = $result['count(*)'];

   if ($count > 0) {
      // Investment already exists, return false
      return false;
   }

   // Insert new investment
   $sql = "insert into investments
            values(:investmentid, :investmentdate, :instrumentid, :clientid, :comments)";
   //prepare the query
   $query = $db->prepare($sql);
   //execute the query
   if ($query) {
      $investmentid = null;
      $query->execute(
         array(
            ':investmentid' => $investmentid,
            ':investmentdate' => $investmentdate,
            ':instrumentid' => $instrumentid,
            ':clientid' => $clientid,
            ':comments' => $comments
         )
      );
      if (!$query)
         echo "Something went wrong. " . print_r($db->errorInfo());
      else {
         // Update the preference opportunity status to "Invested"
         UpdateStatus($oppid, $prefid);
         return $query;
      }
   } else
      echo "Something went wrong." . print_r($db->errorInfo());
}

function UpdateStatus($oppid, $prefid)
{
   include "db_connect.php";

   $sql = "UPDATE preferenceopportunities 
            SET status = 'Invested' 
            WHERE oppid = :oppid 
            AND prefid = :prefid";

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