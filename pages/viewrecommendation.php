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
            } else {
               header('location:index.php?page=login');
               exit();
            }
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
         <h3>Recommended Opportunities for Clients</h3>
         <form method="post">
            <select id="client" name="client">
               <option value="">Select a Client...</option>
               <?php echo $clientlist = GetClientPreferences(); ?>
            </select>
            <input type="submit" name="recommendations" id="recommendations" value="Find Recommendations">
         </form>

         <?php
         if (isset($_POST['recommendations'])) {
            $selected = explode(':', $_POST['client']);
            $clientid = $selected[0];
            $prefid = $selected[1];
            $matches = GetRecommendedOpportunities($clientid, $prefid);
            if(!empty($matches)){
            ?>
               <h3>Matched Opportunities</h3>
               <table id="matches">
                  <thead>
                     <tr>
                        <th>Client Name</th>
                        <th>Pref ID</th>
                        <th>Pref Details</th>
                        <th>Opportunity Name</th>
                        <th>Instrument Name</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach ($matches as $match) {
                        ?>
                        <tr>
                           <td><?php echo $match['fullname']; ?></td>
                           <td><?php echo $match['prefid']; ?></td>
                           <td><?php echo $match['prefdetails']; ?></td>
                           <td><?php echo $match['oppname']; ?></td>
                           <td><?php echo $match['instrumentname']; ?></td>
                           <td><?php echo $match['status']; ?></td>
                        </tr>
                        <?php
                     }
                     ?>
                  </tbody>
               </table>
               <?php
            }else echo "<br>No recommended preferences!";
         }
         ?>
      </div>
   </div>
</body>

</html>