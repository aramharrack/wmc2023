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
         <table id="instrument">
            <tr>
               <th align="left" class="p5">Date Submitted</th>
               <th align="left" class="p5">Instrument Name</th>
               <th align="left" class="p6">Issuer</th>
               <th align="left" class="p5">Stock Exchange</th>
               <th align="left" class="p5">Currency</th>
               <th align="left" class="p5">Denomination</th>
               <th align="left" class="p5">Closing Price</th>
               <th align="left" class="p5">Price Closing Date</th>
               <th align="left" class="p5">Risk Rating</th>
               <th align="left" class="p5">Admin</th>
               <th align="left" class="p5"></th>
            </tr>
            <?php
            foreach ($infos as $info) {
               ?>
               <tr>
                  <td class="p5"><?php echo $info['datesubmitted']; ?></td>
                  <td class="p5"><?php echo $info['shortname']; ?></td>
                  <td class="p6"><?php echo $info['issuer']; ?></td>
                  <td class="p5"><?php echo $info['stockexchange']; ?></td>
                  <td class="p5"><?php echo $info['currency']; ?></td>
                  <td class="p5"><?php echo $info['denomination']; ?></td>
                  <td class="p5"><?php echo $info['closingprice']; ?></td>
                  <td class="p5"><?php echo $info['priceclosingdate']; ?></td>
                  <td class="p5"><?php echo $info['riskrating']; ?></td>
                  <td class="p5"><?php echo $info['fullname']; ?></td>
                  <td class="p5"><a href="index.php?page=editinstrument&instrumentid=<?php
                  echo $info['instrumentid']; ?>">Edit</a> |
                     <a href="index.php?page=deleteinstrument&instrumentid=<?php echo $info['instrumentid']; ?>"
                        onclick="return confirm('Are you sure you want to delete this instrument?')"> Delete</a>
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