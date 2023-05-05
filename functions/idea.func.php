<?php
function GetOpportunities($prefid)
{
   include "db_connect.php";

   $sql = "select opportunities.oppid, opportunities.oppname, instruments.instrumentid,   
                instruments.shortname,instruments.issuer,instruments.currency, instruments.closingprice,
                instruments.priceclosingdate, preferenceopportunities.status 
            from preferenceopportunities
            join opportunities on preferenceopportunities.oppid = opportunities.oppid
            join instruments on opportunities.instrumentid = instruments.instrumentid
            where preferenceopportunities.prefid = :prefid";

   $query = $db->prepare($sql);
   $query->execute(array(':prefid' => $prefid));

   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
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
?>