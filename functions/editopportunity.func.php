<?php
function EditOpportunity($oppid, $oppname, $availabledate, $closingdate, $oppdetails)
{
   include "db_connect.php";

   $sql = "update opportunities
            set oppname = :oppname,
                availabledate = :availabledate,
                closingdate = :closingdate, 
                oppdetails = :oppdetails
            where oppid = :oppid";
   //prepare the query
   $query = $db->prepare($sql);
   //execute the query
   if ($query) {
      $query->execute(
         array(
            ':oppname' => $oppname,
            ':availabledate' => $availabledate,
            ':closingdate' => $closingdate,
            ':oppdetails' => $oppdetails,
            ':oppid' => $oppid
         )
      );
      if (!$query)
         echo "Something went wrong. " . print_r($db->errorInfo());
      else
         return $query;
   } else
      echo "Something went wrong." . print_r($db->errorInfo());
}

function GetOpportunity($oppid)
{
   include "db_connect.php";

   $oppinfos = array();

   $sql = "select *
            from opportunities
            where oppid = :oppid";

   $query = $db->prepare($sql);
   $query->execute(array(':oppid' => $oppid));

   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
      $row = $query->fetch(PDO::FETCH_ASSOC);
      $oppinfos[] = $row;
   }
   return $oppinfos;
}
?>