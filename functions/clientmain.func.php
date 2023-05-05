<?php
function GetPreferences($username)
{
   include "db_connect.php";

   $prefinfos = array();

   $sql = "select preferences.prefid, preferences.datesubmitted, preferences.prefdetails, 
               assettypes.assetdesc, industrysectors.sectordesc,
               countries.countryname, regions.regionname
            from preferences, clients, assettypes, industrysectors, countries, regions 
            where clients.id = preferences.clientid
            and assettypes.assetid = preferences.assetid
            and industrysectors.parmcode = preferences.parmcode
            and countries.countrycode = preferences.countrycode
            and regions.regionid = preferences.regionid
            and clients.username = :username";

   $query = $db->prepare($sql);
   $query->execute(array(':username' => $username));

   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
      while ($row = $query->fetch(PDO::FETCH_ASSOC))
         $prefinfos[] = $row;
   }
   return $prefinfos;
}
?>