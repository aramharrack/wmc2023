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
         ?>
         <table id="preference">
            <tr>
               <th align="left" class="pinstr">Date Submitted</th>
               <th align="left" class="pinstr">Investment ID</th>
               <th align="left" class="pinstr">Instrument ID</th>
               <th align="left" class="pinstr">Investment Details</th>
               <th align="left" class="pinstr">Client</th>
               <th align="left" class="pinstr"></th>
            </tr>
            <?php
            foreach ($infos as $info) {
               ?>
               <tr>
                  <td class="pinstr">
                     <?php echo $info['investmentdate']; ?>
                  </td>
                  <td class="pinstr">
                     <?php echo $info['investmentid']; ?>
                  </td>
                  <td class="pinstr">
                     <?php echo $info['instrumentid']; ?>
                  </td>
                  <td class="pinstr">
                     <?php echo $info['comments']; ?>
                  </td>
                  <td class="pinstr">
                     <?php echo $info['clientid']; ?>
                  </td>
                  <td class="pinstr"><a href="index.php?page=deleteinstrument&instrumentid=<?php echo $info['instrumentid']; ?>"
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