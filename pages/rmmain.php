<!doctype html>
<html lang="en">

<head>
   <title>WMC RM Main</title>
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
            } else {
               header('location:index.php?page=login');
               exit();
            }
            ?>
            <a href="index.php?page=logout">Logout</a>
         </div>
         <br>
         <ul class="breadcrumb">
            <li><a href="index.php?page=rmmain">Main</a></li>
            <li><a href="index.php?page=profile">Profile</a></li>
            <li><a href="index.php?page=viewrecommendation">View Recommendations</a></li>
         </ul>
         <h2>WMC Relationship Manager</h2>
         <h3>Main Menu</h3>
         <form method="post" action="">
            <select name="lstoption" id="lstoption">
               <option selected disabled>Select an option</option>
               <option value="clients">Clients</option>
               <option value="ideas">Investment Opportunities</option>
            </select>
            <input type="text" name="txtoption" id="txtoption" placeholder="Enter search criteria"
               value="<?php echo isset($clientname) ? $clientname : ''; ?>">
            <input type="submit" name="btnoption" id="btnoption" value="Search">
         </form>

         <?php
         if (!empty($_POST['lstoption'])) {
            $option = $_POST['lstoption'];

            if (!empty($_POST['txtoption'])) {
               $txtoption = trim($_POST['txtoption']);

               if ($option === 'clients') {
                  $clientname = $_POST['txtoption'];
                  $clientinfos = GetClientInfo($clientname);

                  if (!empty($clientinfos)) {
                     foreach ($clientinfos as $clientinfo) {
                        echo "<br>";
                        echo "<strong>Client ID: " . $clientinfo['id'] . "</strong><br>";
                        echo "<strong>Client's  Name: " . $clientinfo['fullname'] . "</strong><br>";
                        echo "<strong>Client's Email: " . $clientinfo['emailaddress'] . "</strong><br>";
                        echo "<br>";
                     }
                     $prefinfos = GetPreferences($clientinfo['id']);
                     //var_dump($prefinfos);
                     if(!empty($prefinfos)){
                        ?>
                        <form method="post" action="index.php?page=opportunity">
                           <table id="preference">
                              <tr>
                                 <th align="left" class="p1">Preference ID</th>
                                 <th align="left" class="p1">Date Submitted</th>
                                 <th align="left" class="p1">Asset Type</th>
                                 <th align="left" class="p1">Industry Sector</th>
                                 <th align="left" class="p1">Country</th>
                                 <th align="left" class="p1">Region</th>
                                 <th align="left" class="p2">Preference Details</th>
                                 <th align="left" class="p3"></th>
                              </tr>
                              <?php
                              foreach ($prefinfos as $prefinfo) {
                                 ?>
                                 <tr>
                                    <td class="p1"><?php echo $prefinfo['prefid']; ?></td>
                                    <td class="p1"><?php echo $prefinfo['datesubmitted']; ?></td>
                                    <td class="p1"><?php echo $prefinfo['assetdesc']; ?></td>
                                    <td class="p1"><?php echo $prefinfo['sectordesc']; ?></td>
                                    <td class="p1"><?php echo $prefinfo['countryname']; ?></td>
                                    <td class="p1"><?php echo $prefinfo['regionname']; ?></td>
                                    <td class="p2"><?php echo $prefinfo['prefdetails']; ?></td>
                                    <td class="p3"><a href="index.php?page=opportunity&prefid=<?php echo
                                       $prefinfo['prefid']; ?>&clientname=<?php echo
                                        $clientinfo['fullname']; ?>">Find Opportunity</a></td>
                                 </tr>
                                 <?php
                              }
                              ?>
                           </table>
                        </form>
                        <?php
                     }else{
                        echo "No preferences set for this client as yet!";
                     }
                  } else 
                     echo "<br>Client not found!";
               } else if ($option === 'ideas') {
                  $oppinfos = SearchOpportunities($txtoption);

                  if (!empty($oppinfos)) {
                     ?>
                        <br>
                        <table id="opportunities">
                           <tr>
                              <th align="left" class="p1">Date Submitted</th>
                              <th align="left" class="p1">Opportunity ID</th>
                              <th align="left" class="p1">Opportunity Name</th>
                              <th align="left" class="p1">Instrument Name</th>
                              <th align="left" class="p1">Issuer Name</th>
                              <th align="left" class="p1"></th>
                           </tr>
                           <?php
                           foreach ($oppinfos as $oppinfo) {
                              ?>
                              <tr>
                                 <td class="p1">
                                 <?php echo $oppinfo['datesubmitted']; ?>
                                 </td>
                                 <td class="p1">
                                 <?php echo $oppinfo['oppid']; ?>
                                 </td>
                                 <td class="p1">
                                 <?php echo $oppinfo['oppname']; ?>
                                 </td>
                                 <td class="p1">
                                 <?php echo $oppinfo['instrumentname']; ?>
                                 </td>
                                 <td class="p1">
                                 <?php echo $oppinfo['issuer']; ?>
                                 </td>
                                 <td class="p1"><a href="index.php?page=opportunity&oppid=<?php echo
                                    $oppinfo['oppid']; ?>">Recommend</a></td>
                              </tr>
                           <?php
                           }
                           ?>
                        </table>
                     <?php
                  } else 
                     echo "<br>No investment opportunities found!";
               }
            } else 
               echo "<br>Enter search criteria!";
         } else 
            echo "<br>Select an option!";
         ?>
      </div>
   </div>
</body>

</html>