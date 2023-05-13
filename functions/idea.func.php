<?php
function GetOpportunities($prefid, $clientid)
{
   include "db_connect.php";

   $sql = "select opportunities.oppid, opportunities.oppname, 
               instruments.instrumentid, instruments.shortname, instruments.issuer,
               instruments.currency, instruments.closingprice,
               instruments.priceclosingdate, 
               preferenceopportunities.status,
               investments.investmentid
            from preferenceopportunities
            join opportunities on preferenceopportunities.oppid = opportunities.oppid
            join instruments on opportunities.instrumentid = instruments.instrumentid
            left join investments on investments.instrumentid = instruments.instrumentid
                                  and investments.clientid = :clientid
            where preferenceopportunities.prefid = :prefid";

   $query = $db->prepare($sql);
   $query->execute(array(':prefid' => $prefid, ':clientid' => $clientid));

   if (!$query) {
      echo "Something went wrong. " . print_r($db->errorInfo());
   } else {
      $opportunities = $query->fetchAll(PDO::FETCH_ASSOC);
   }
   return $opportunities;
}

function GetPreference($prefid)
{
   include "db_connect.php";

   $prefinfos = array();

   $sql = "select preferences.prefid, preferences.datesubmitted, preferences.prefdetails, 
                assettypes.assetdesc, industrysectors.sectordesc,
                countries.countryname, regions.regionname
            from preferences, assettypes, industrysectors, countries, regions
            where prefid = :prefid
            and assettypes.assetid = preferences.assetid
            and industrysectors.parmcode = preferences.parmcode
            and countries.countrycode = preferences.countrycode
            and regions.regionid = preferences.regionid";

   $query = $db->prepare($sql);
   $query->execute(array(':prefid' => $prefid));

   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
      $row = $query->fetch(PDO::FETCH_ASSOC);
      $prefinfos[] = $row;
   }
   return $prefinfos;
}

function GetInvestmentID($instrumentid, $clientid)
{
   include "db_connect.php";

   $sql = "select investmentid 
            from investments 
            where instrumentid = :instrumentid 
            and clientid = :clientid";

   $query = $db->prepare($sql);
   $query->execute(array(':instrumentid' => $instrumentid, ':clientid' => $clientid));

   if (!$query) {
      echo "Something went wrong. " . print_r($db->errorInfo());
   } else {
      $result = $query->fetch(PDO::FETCH_ASSOC);
      if ($result) {
         return $result['investmentid'];
      }
   }
   return false;
}

function GetClientID($username)
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
?>