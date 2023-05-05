<!doctype html>
<html lang="en">

<head>
   <title>WMC Admin Main</title>
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
            <li><a href="index.php?page=adminmain">Main</a></li>
            <li><a href="index.php?page=profile">Profile</a></li>
            <li><a href="index.php?page=addinstrument">Add Instrument</a></li>
            <li><a href="index.php?page=addopportunity">Add Opportunity</a></li>
            <li><a href="index.php?page=viewopportunity">View Opportunities</a></li>
         </ul>
         <h2>WMC Administrator</h2>
         <h3>Main Menu</h3>

         <?php
         $infos = GetInstruments();
         ?>
         <table id="preference">
            <tr>
               <th align="left" class="pinstr">Date Submitted</th>
               <th align="left" class="pinstr">Instrument Name</th>
               <th align="left" class="pinstr">Issuer</th>
               <th align="left" class="pinstr">Stock Exchange</th>
               <th align="left" class="pinstr">Currency</th>
               <th align="left" class="pinstr">Denomination</th>
               <th align="left" class="pinstr">Closing Price</th>
               <th align="left" class="pinstr">Price Closing Date</th>
               <th align="left" class="pinstr">Risk Rating</th>
               <th align="left" class="pinstr">Admin</th>
               <th align="left" class="pinstr"></th>
            </tr>
            <?php
            foreach ($infos as $info) {
               ?>
               <tr>
                  <td class="pinstr"><?php echo $info['datesubmitted']; ?></td>
                  <td class="pinstr"><?php echo $info['shortname']; ?></td>
                  <td class="pinstr"><?php echo $info['issuer']; ?></td>
                  <td class="pinstr"><?php echo $info['stockexchange']; ?></td>
                  <td class="pinstr"><?php echo $info['currency']; ?></td>
                  <td class="pinstr"><?php echo $info['denomination']; ?></td>
                  <td class="pinstr"><?php echo $info['closingprice']; ?></td>
                  <td class="pinstr"><?php echo $info['priceclosingdate']; ?></td>
                  <td class="pinstr"><?php echo $info['riskrating']; ?></td>
                  <td class="pinstr"><?php echo $info['fullname']; ?></td>
                  <td class="pinstr"><a href="index.php?page=editinstrument&instrumentid=<?php
                  echo $info['instrumentid']; ?>">Edit</a>|
                     <a href="index.php?page=deleteinstrument&instrumentid=<?php echo $info['instrumentid']; ?>"
                        onclick="return confirm('Are you sure you want to delete this instrument?')">Delete</a>
                  </td>
               </tr>
               <?php
            }
            ?>
         </table>
      </div>
   </div>
</body>

</html>