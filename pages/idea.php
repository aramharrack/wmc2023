<!doctype html>
<html lang="en">

<head>
   <title>WMC Client Main</title>
   <meta charset="utf-8">
</head>

<body>
   <div class="container">
      <div class="box">
         <div class="header">
            <?php
            if (!empty($_SESSION['username'])) {
               $username = ($_SESSION['username']);
               echo "Hello, " . $username . " | ";
            } else
               header('location:index.php?page=login');
            ?>
            <a href="index.php?page=logout">Logout</a>
         </div>
         <br>
         <ul class="breadcrumb">
            <li><a href="index.php?page=clientmain">Main</a></li>
            <li><a href="index.php?page=profile">Profile</a></li>
            <li><a href="index.php?page=addpreference">Add Preference</a></li>
            <li><a href="index.php?page=viewinvestment">View Investments</a></li>
         </ul>
         <?php
         $prefid = $_GET['prefid'];
         $prefinfo = GetPreference($prefid);
         foreach ($prefinfo as $info) {
            echo "<h2>Preference Details</h2>";
            echo "<strong>Preference ID: </strong>" . $info['prefid'] . "<br>";
            echo "<strong>Date Submitted: </strong>" . $info['datesubmitted'] . "<br>";
            echo "<strong>Details: </strong>" . $info['prefdetails'] . "<br>";
            echo "<strong>Asset Type: </strong>" . $info['assetdesc'] . "<br>";
            echo "<strong>Industry Sector: </strong>" . $info['sectordesc'] . "<br>";
            echo "<strong>Country: </strong>" . $info['countryname'] . "<br>";
            echo "<strong>Region: </strong>" . $info['regionname'] . "<br>";
            echo "<br>";
         }
         ?>
         <a href="#" onclick="window.history.back()">Return to Main</a>
         <br>
         <?php
         $opportunities = GetOpportunities($prefid);
         if (!empty($opportunities)) {
            ?>
            <h2>Recommended Opportunities</h2>
            <table id="preference">
               <tr>
                  <th align="left" class="p1">Opportunity ID</th>
                  <th align="left" class="p1">Opportunity Name</th>
                  <th align="left" class="p1">Short Name</th>
                  <th align="left" class="p1">Issuer</th>
                  <th align="left" class="p1">Currency</th>
                  <th align="left" class="p1">Closing Price</th>
                  <th align="left" class="p1">Price Closing Date</th>
                  <th align="left" class="p1">Status</th>
                  <th align="left" class="p1"></th>
               </tr>
               <?php
               foreach ($opportunities as $opportunity) {
                  ?>
                  <tr>
                     <td class="p1">
                        <?php echo $opportunity['oppid']; ?>
                     </td>
                     <td class="p1">
                        <?php echo $opportunity['oppname']; ?>
                     </td>
                     <td class="p1">
                        <?php echo $opportunity['shortname']; ?>
                     </td>
                     <td class="p1">
                        <?php echo $opportunity['issuer']; ?>
                     </td>
                     <td class="p1">
                        <?php echo $opportunity['currency']; ?>
                     </td>
                     <td class="p1">
                        <?php echo $opportunity['closingprice']; ?>
                     </td>
                     <td class="p1">
                        <?php echo $opportunity['priceclosingdate']; ?>
                     </td>
                     <td class="p1">
                        <?php echo $opportunity['status']; ?>
                     </td>
                     <td class="p1">
                        <?php
                        if ($opportunity['status'] == 'Invested')
                           echo '<a href="index.php?page=cancelinvestment&oppid=' . $opportunity['oppid'] . '">Cancel</a>';
                        else
                           echo '<a href="index.php?page=investment&prefid=' . $prefid . '&oppid=' . $opportunity['oppid'] . '">Invest</a>';
                        ?>
                     </td>
                  </tr>
                  <?php
               }
               ?>
            </table>
            <?php
         } else {
            echo "<br>No opportunities found for this preference!";
         }
         ?>
      </div>
   </div>
</body>

</html>