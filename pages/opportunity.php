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
            } else
               header('location:index.php?page=login');
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
         <button type="button" onclick="window.location.href='index.php?page=rmmain'">Return to Main</button>
         <br>
         <?php
         if (!empty($_GET['prefid']) && !empty($_GET['clientname'])) {
            $prefid = $_GET['prefid'];
            $clientname = $_GET['clientname'];
            $clientinfos = GetClientInfo($clientname);
            foreach ($clientinfos as $clientinfo) {
               echo "<br>";
               echo "<strong>Client Profile</strong><br>";
               echo "ID: " . $clientinfo['id'] . "<br>";
               echo "Name: " . $clientinfo['fullname'] . "<br>";
               echo "Email: " . $clientinfo['emailaddress'] . "<br>";
               echo "<br>";
            }
            $prefinfos = GetPreferences($clientinfo['id'], $prefid);

            if (isset($_POST['btnidea'])) {
               $lstopp = $_POST['lstopp'];
               if (!empty($lstopp)) {
                  $result = AssignOpportunity($prefid, $lstopp);
                  if ($result) {
                     header('location:index.php?page=rmmain');
                     exit;
                  }
               } else {
                  echo "Select an opportunity!";
               }
            }
            foreach ($prefinfos as $prefinfo) {
               echo "<br>";
               echo "<strong>Preference Details</strong><br>";
               echo "ID: " . $prefinfo['prefid'] . "<br>";
               echo "Date Submitted: " . $prefinfo['datesubmitted'] . "<br>";
               echo "Asset Type: " . $prefinfo['assetdesc'] . "<br>";
               echo "Industry Sector: " . $prefinfo['sectordesc'] . "<br>";
               echo "Country: " . $prefinfo['countryname'] . "<br>";
               echo "Region: " . $prefinfo['regionname'] . "<br>";
               echo "Preference Details: " . $prefinfo['prefdetails'] . "<br>";
               echo "<br>";
            }
            ?>
            <form action="" method="post">
               <select name="lstopp" id="lstopp">
                  <option selected disabled>Match Preference</option>
                  <?php
                  $oppinfos = GetIdeas();
                  foreach ($oppinfos as $oppinfo) {
                     ?>
                     <option value="<?php echo $oppinfo['oppid']; ?>"><?php
                        echo $oppinfo['oppname'] . " - " . $oppinfo['shortname']; ?></option>
                     <?php
                  }
                  ?>
               </select>
               <input type="submit" id="btnidea" name="btnidea" value="Assign Idea">
            </form>
            <?php
         } else if (!empty($_GET['oppid'])) {
            $oppid = $_GET['oppid'];
            $oppinfos = GetOpportunity($oppid);
            foreach ($oppinfos as $oppinfo) {
               echo "<br>";
               echo "<strong>Opportunity Details</strong><br>";
               echo "ID: " . $oppinfo['oppid'] . "<br>";
               echo "Name: " . $oppinfo['instrumentname'] . "<br>";
               echo "Admin: " . $oppinfo['fullname'] . "<br>";
               echo "<br>";
            }
            //setup if server_request == post as it might be 2 forms
         
            ?>
               <form action="" method="post">
                  <select name="lstclient" id="lstclient">
                     <option selected disabled>Clients</option>
                     <?php
                     $getclients = GetClientInfo();
                     foreach ($getclients as $client) {
                        ?>
                        <option value="<?php echo $client['id']; ?>"><?php
                           echo $client['fullname']; ?></option>
                     <?php
                     }
                     ?>
                  </select>
                  <input type="submit" id="btnclient" name="btnclient" value="Select Client">
               </form>
               <?php
               if (isset($_POST['btnclient'])) {
                  $lstclient = $_POST['lstclient'];
                  if (!empty($lstclient)) {
                     //get prefid of client
                     $prefinfos = GetPreferences($lstclient);
                     ?>
                     <h2>Client Preferences</h2>
                     <table id="preference">
                        <tr>
                           <th align="left" class="p1">Date Submitted</th>
                           <th align="left" class="p1">ID</th>
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
                              <td class="p1">
                              <?php echo $prefinfo['prefid']; ?>
                              </td>
                              <td class="p1">
                              <?php echo $prefinfo['datesubmitted']; ?>
                              </td>
                              <td class="p1">
                              <?php echo $prefinfo['assetdesc']; ?>
                              </td>
                              <td class="p1">
                              <?php echo $prefinfo['sectordesc']; ?>
                              </td>
                              <td class="p1">
                              <?php echo $prefinfo['countryname']; ?>
                              </td>
                              <td class="p1">
                              <?php echo $prefinfo['regionname']; ?>
                              </td>
                              <td class="p2">
                              <?php echo $prefinfo['prefdetails']; ?>
                              </td>
                              <td class="p3"><a href="index.php?page=opportunity&prefid=<?php echo
                                 $prefinfo['prefid']; ?>&clientname=<?php echo
                                  $client['fullname']; ?>">Find Opportunity</a></td>
                           </tr>
                        <?php
                        }
                        ?>
                     </table>
                  <?php
                  } else
                     echo "<br>Select a client!";
               }
         }
         ?>
      </div>
   </div>

</body>

</html>