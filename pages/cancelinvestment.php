<?php
// Retrieve oppid and prefid from URL parameters
$oppid = $_GET['oppid'];
$prefid = $_GET['prefid'];

// Retrieve investmentid from URL parameters
$investmentid = $_GET['investmentid'];

// Call DeleteInvestment function
if (DeleteInvestment($investmentid)) {
   // Update the preference opportunity status to "Assigned"
   if (UpdateStatus($oppid, $prefid)) {
      // Redirect to idea page
      header('Location: index.php?page=idea&prefid=' . $prefid);
      exit();
   } else {
      echo "Failed to update status to 'Assigned'.";
   }
} else {
   echo "Failed to delete investment.";
}
?>
