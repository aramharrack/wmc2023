<?php
function GetOpportunities()
{
   include "db_connect.php";

   $oppinfos = array();

   $sql = "select opportunities.*, instruments.instrumentname, admins.fullname
            from opportunities, instruments, admins
            where opportunities.instrumentid = instruments.instrumentid
            and opportunities.staffid = admins.id";

   $query = $db->prepare($sql);
   $query->execute();

   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
      while ($row = $query->fetch(PDO::FETCH_ASSOC))
         $oppinfos[] = $row;
   }
   return $oppinfos;
}
?>