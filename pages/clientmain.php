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
         <h2>WMC Client Main</h2>
         <?php
         $infos = GetPreferences($username);
         ?>
         <h2>Client Preferences</h2>
         <table id="preference">
            <tr>
               <th align="left" class="p1">Date Submitted</th>
               <th align="left" class="p1">Asset Type</th>
               <th align="left" class="p1">Industry Sector</th>
               <th align="left" class="p1">Country</th>
               <th align="left" class="p1">Region</th>
               <th align="left" class="p2">Preference Details</th>
               <th align="left" class="p3"></th>
            </tr>
            <?php
            foreach ($infos as $info) {
            ?>
               <tr>
                  <td class="p1"><?php echo $info['datesubmitted']; ?></td>
                  <td class="p1"><?php echo $info['assetdesc']; ?></td>
                  <td class="p1"><?php echo $info['sectordesc']; ?></td>
                  <td class="p1"><?php echo $info['countryname']; ?></td>
                  <td class="p1"><?php echo $info['regionname']; ?></td>
                  <td class="p2"><?php echo $info['prefdetails']; ?></td>
                  <td class="p3">
                     <a href="index.php?page=idea&prefid=<?php echo $info['prefid']; ?>">Extract Idea</a> |
                     <a href="index.php?page=editpreference&prefid=<?php echo $info['prefid']; ?>">Edit</a> |
                     <a href="index.php?page=deletepreference&prefid=<?php echo $info['prefid']; ?>"
                        onclick="return confirm('Are you sure you want to delete this preference?')">Delete</a>
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