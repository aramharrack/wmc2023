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
               <th align="left" class="pinstr">Date Submitted</th>
               <th align="left" class="pinstr">Opportunity ID</th>
               <th align="left" class="pinstr">Opportunity Name</th>
               <th align="left" class="pinstr">Instrument Name</th>
               <th align="left" class="pinstr">Available Date</th>
               <th align="left" class="pinstr">Closing Date</th>
               <th align="left" class="pinstr">Opportunity Details</th>
               <th align="left" class="pinstr">Admin</th>
               <th align="left" class="pinstr"></th>
            </tr>
            <?php
            foreach ($infos as $info) {
               ?>
               <tr>
                  <td class="pinstr">
                     <?php echo $info['datesubmitted']; ?>
                  </td>
                  <td class="pinstr">
                     <?php echo $info['oppid']; ?>
                  </td>
                  <td class="pinstr">
                     <?php echo $info['oppname']; ?>
                  </td>
                  <td class="pinstr">
                     <?php echo $info['instrumentname']; ?>
                  </td>
                  <td class="pinstr">
                     <?php echo $info['availabledate']; ?>
                  </td>
                  <td class="pinstr">
                     <?php echo $info['closingdate']; ?>
                  </td>
                  <td class="pinstr">
                     <?php echo $info['oppdetails']; ?>
                  </td>
                  <td class="pinstr">
                     <?php echo $info['fullname']; ?>
                  </td>
                  <td class="pinstr"><a href="index.php?page=editinstrument&instrumentid=<?php
                  echo $info['instrumentid']; ?>">Edit</a> |
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