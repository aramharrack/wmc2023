<?php
function GetClientInfo($clientname)
{
   include "db_connect.php";

   $clientinfos = array();

   $sql = "select *
            from clients
            where fullname = :clientname";

   $query = $db->prepare($sql);
   $query->execute(array(':clientname' => $clientname));

   if (!$query) {
      echo "Something went wrong. " . print_r($db->errorInfo());
   } else {
      $row = $query->fetch(PDO::FETCH_ASSOC);
      if ($row)
         $clientinfos[] = $row;
   }
   return $clientinfos;
}


function GetPreferences($clientid)
{
   include "db_connect.php";

   $prefinfos = array();

   $sql = "select preferences.prefid, preferences.datesubmitted, preferences.prefdetails
            from preferences, clients 
            where clients.id = preferences.clientid
            and clients.id = :clientid";

   $query = $db->prepare($sql);
   $query->execute(array(':clientid' => $clientid));

   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
      while ($row = $query->fetch(PDO::FETCH_ASSOC))
         $prefinfos[] = $row;
   }
   return $prefinfos;
}

function GetIdeas()
{
   include "db_connect.php";

   $ideainfos = array();

   $sql = "select oppname
            from opportunities";

   $query = $db->prepare($sql);
   $query = $db->query($sql);
   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
      while ($row = $query->fetch(PDO::FETCH_ASSOC))
         $ideainfos[] = $row;
   }
   return $ideainfos;
}

function SearchOpportunities($txtoption)
{
   include "db_connect.php";
   $oppinfos = array();

   $sql = "select opportunities.datesubmitted, opportunities.oppid, opportunities.oppname,
            instruments.instrumentname, instruments.issuer
            from opportunities, instruments
            where opportunities.instrumentid = instruments.instrumentid
            and instruments.instrumentname like :txtoption";


   $query = $db->prepare($sql);
   $query->execute(array(':txtoption' => "%$txtoption%"));

   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
      while ($row = $query->fetch(PDO::FETCH_ASSOC))
         $oppinfos[] = $row;
   }
   return $oppinfos;
}
?>