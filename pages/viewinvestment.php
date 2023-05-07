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
            <li><a href="index.php?page=clientmain">Main</a></li>
            <li><a href="index.php?page=profile">Profile</a></li>
            <li><a href="index.php?page=addpreference">Add Preference</a></li>
            <li><a href="index.php?page=viewinvestment">View Investments</a></li>
         </ul>
         <h2>WMC Client Investments</h2>

         <?php
         $clientid = GetClientID($username);
         $infos = GetInvestments($clientid);
         if (!empty($infos)) {
            ?>
            <table id="preference">
               <tr>
                  <th align="left" class="p9">Date Submitted</th>
                  <th align="left" class="p9">Investment ID</th>
                  <th align="left" class="p9">Instrument Name</th>
                  <th align="left" class="p8">Investment Details</th>
                  <th align="left" class="p9">Client</th>
                  <th align="left" class="p9"></th>
               </tr>
               <?php
               foreach ($infos as $info) {
                  ?>
                  <tr>
                     <td class="p9"><?php echo $info['investmentdate']; ?></td>
                     <td class="p9"><?php echo $info['investmentid']; ?></td>
                     <td class="p9"><?php echo $info['instrumentname']; ?></td>
                     <td class="p8"><?php echo $info['comments']; ?></td>
                     <td class="p9"><?php echo $info['fullname']; ?></td>
                     <td class="p9"><a href="index.php?page=deleteinvestment&investmentid=<?php 
                        echo $info['investmentid']; ?>"
                           onclick="return confirm('Are you sure you want to delete this investment?')">Delete</a>
                     </td>
                  </tr>
                  <?php
               }
               ?>
            </table>
            <?php
         } else
            echo "<br>No investments made yet!";
         ?>
      </div>
   </div>
</body>

</html>