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
         $infos = GetOpportunities();
         ?>
         <table id="preference">
            <tr>
               <th align="left" class="p6">Date Submitted</th>
               <th align="left" class="p6">Opportunity Name</th>
               <th align="left" class="p6">Instrument Name</th>
               <th align="left" class="p6">Available Date</th>
               <th align="left" class="p6">Closing Date</th>
               <th align="left" class="p7">Opportunity Details</th>
               <th align="left" class="p6">Admin</th>
               <th align="left" class="p6"></th>
            </tr>
            <?php
            foreach ($infos as $info) {
               ?>
               <tr>
                  <td class="p6">
                     <?php echo $info['datesubmitted']; ?>
                  </td>
                  <td class="p6">
                     <?php echo $info['oppname']; ?>
                  </td>
                  <td class="p6">
                     <?php echo $info['instrumentname']; ?>
                  </td>
                  <td class="p6">
                     <?php echo $info['availabledate']; ?>
                  </td>
                  <td class="p6">
                     <?php echo $info['closingdate']; ?>
                  </td>
                  <td class="p7">
                     <?php echo $info['oppdetails']; ?>
                  </td>
                  <td class="p6">
                     <?php echo $info['fullname']; ?>
                  </td>
                  <td class="p6"><a href="index.php?page=editopportunity&oppid=<?php
                  echo $info['oppid']; ?>">Edit</a> |
                     <a href="index.php?page=deleteopportunity&oppid=<?php echo $info['oppid']; ?>"
                        onclick="return confirm('Are you sure you want to delete this opportunity?')">Delete</a>
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