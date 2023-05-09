<!doctype html>
<html lang="en">

<head>
   <title>Investment Form</title>
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
         $oppid = $_GET['oppid'];
         $prefid = $_GET['prefid'];
         $oppinfo = GetOpportunity($oppid);
         foreach ($oppinfo as $info) {
            echo "<h2>Opportunity Details</h2>";
            echo "<strong>Opportunity ID: </strong>" . $info['oppid'] . "<br>";
            echo "<strong>Opportunity Name: </strong>" . $info['oppname'] . "<br>";
            echo "<strong>Instrument Name: </strong>" . $info['shortname'] . "<br>";
            echo "<strong>Instrument Issuer: </strong>" . $info['issuer'] . "<br>";
            
            echo "<strong>Instrument Asset Type: </strong>" . $info['assetdesc'] . "<br>";
            echo "<strong>Instrument Industry Sector: </strong>" . $info['sectordesc'] . "<br>";
            echo "<strong>Instrument Country: </strong>" . $info['countryname'] . "<br>";
            echo "<strong>Instrument Region: </strong>" . $info['regionname'] . "<br>";

            echo "<strong>Instrument Currency: </strong>" . $info['currency'] . "<br>";
            echo "<strong>Instrument Closing Price: </strong>" . $info['closingprice'] . "<br>";
            echo "<strong>Instrument Price closing Date: </strong>" . $info['priceclosingdate'] . "<br>";
            echo "<br>";
         }
         ?>
         <a href="#" onclick="window.history.back()">Return to Recommended Opportunities</a>
         <br>
         <h2>WMC Client Investment</h2>

         <?php
         if (isset($_POST['invest'])) {

            if (!empty($_POST['datesubmitted']))
               $datesubmitted = $_POST['datesubmitted'];

            if (!empty($_POST['comments']))
               $comments = $_POST['comments'];
            else
               $errors[] = "Enter a comment about the investment!";

            $clientid = getClientID($username);

            if (!empty($errors)) {
               foreach ($errors as $error)
                  echo $error . "<br>";
            } else {
               $response = InsertInvestment($datesubmitted, $info['instrumentid'], $clientid, $comments, $oppid, $prefid);
               if ($response) {
                  header('location:index.php?page=clientmain');
               } else {
                  // Investment already exists
                  echo "Investment already made!";
               }
            }
         }
         $datesubmitted = date('Y-m-d');
         ?>
         <form method="post" action="">
            <table id="preference">
               <tr>
                  <th class="p4"><label for="datesubmitted"> Date Submitted </label></th>
                  <td class="p4"><input type="text" name="datesubmitted" id="datesubmitted"
                        value="<?php echo $datesubmitted; ?>"></td>
               </tr>
               <tr>
                  <th class="p4"><label for="comments"> Investment Details</label></th>
                  <td class="p4"><textarea name="comments" id="comments"><?php
                  echo isset($comments) ? $comments : ''; ?></textarea>
                  </td>
               </tr>
               <tr>
                  <th class="p4"></th>
                  <td class="p4"><input type="submit" value="Invest" name="invest" id="invest"></td>
               </tr>
            </table>
         </form>
      </div>
   </div>
</body>

</html>