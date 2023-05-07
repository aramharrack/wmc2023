<?php
if (isset($_GET['oppid'])) {
   $oppid = $_GET['oppid'];
   if (DeleteOpportunity($oppid)) {
      header("location:index.php?page=viewopportunity");
      exit();
   } else {
      echo "Failed to delete opportunity.";
   }
}
?>