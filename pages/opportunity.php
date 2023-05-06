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
               echo "ID: ".$prefinfo['prefid']."<br>";
               echo "Date Submitted: ".$prefinfo['datesubmitted']."<br>";
               echo "Asset Type: ".$prefinfo['assetdesc']."<br>";
               echo "Industry Sector: ".$prefinfo['sectordesc']."<br>";
               echo "Country: ".$prefinfo['countryname']."<br>";
               echo "Region: ".$prefinfo['regionname']."<br>";
               echo "Preference Details: ".$prefinfo['prefdetails']."<br>";
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
         }
         ?>
      </div>
   </div>

</body>

</html>