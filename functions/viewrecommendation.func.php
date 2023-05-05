<?php
function GetRecommendedOpportunities($clientid, $prefid)
{
   include "db_connect.php";

   $sql = "SELECT clients.fullname, preferences.prefid, preferences.prefdetails, 
                opportunities.oppname, instruments.instrumentname, preferenceopportunities.status
            FROM clients
            JOIN preferences ON clients.id = preferences.clientid
            JOIN preferenceopportunities ON preferences.prefid = preferenceopportunities.prefid
            JOIN opportunities ON preferenceopportunities.oppid = opportunities.oppid
            JOIN instruments ON opportunities.instrumentid = instruments.instrumentid
            WHERE clients.id = :clientid AND preferences.prefid = :prefid";

   $query = $db->prepare($sql);
   $query->execute(
      array(
         ':clientid' => $clientid,
         ':prefid' => $prefid
      )
   );

   $matches = array();
   while ($row = $query->fetch(PDO::FETCH_ASSOC))
      $matches[] = $row;
   return $matches;
}

function GetClientPreferences()
{
   include "db_connect.php";
   $sql = "SELECT clients.id, clients.fullname, preferences.prefid
            FROM clients, preferences
            where preferences.clientid = clients.id";

   $query = $db->prepare($sql);
   $query->execute();
   $options = '';
   while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $options .= '<option value="' . $row['id'] . ':' . $row['prefid'] . '">' . $row['fullname'] . ' (Pref ID: ' . $row['prefid'] . ')</option>';
   }
   return $options;
}
?>