<?php
if (isset($_GET['investmentid'])) {
   $investmentid = $_GET['investmentid'];
   if (DeleteInvestment($investmentid)) {
      header("location:index.php?page=viewinvestment");
      exit();
   } else {
      echo "Failed to delete investment.";
   }
}
?>