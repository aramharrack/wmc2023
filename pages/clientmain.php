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
                <li><a href="index.php?page=addpreference">Add Preference</a></li>
                <li><a href="index.php?page=opportunity">View Opportunity</a></li>
            </ul>
            <h2>WMC Client Main</h2>
            <?php
            
            $clientinfos = GetUserInfo($username);
            foreach ($clientinfos as $clientinfo) {
                echo "<br>";
                echo "<strong>Client Profile</strong><br>";
                echo "ID: " . $clientinfo['id'] . "<br>";
                echo "Name: " . $clientinfo['fullname'] . "<br>";
                echo "Email: " . $clientinfo['emailaddress'] . "<br>";
                echo "<br>";
            }
            
            $infos = GetPreferences($username);
            ?>
            <h2>Client Preferences</h2>
            <table id="preference">
                <tr>
                    <!-- <th align="left" class="p1">Preference ID</th> -->
                    <th align="left" class="p1">Date Submitted</th>
                    <th align="left" class="p1">Preference Details</th>
                    <th align="left" class="p1">Asset Type</th>
                    <th align="left" class="p1">Industry Sector</th>
                    <th align="left" class="p1">Country</th>
                    <th align="left" class="p1">Region</th>
                </tr>
                <?php
                foreach ($infos as $info) {
                    ?>
                    <tr>
                        <!-- <td class="p1"><?php echo $info['prefid']; ?></td> -->
                        <td class="p1">
                            <?php echo $info['datesubmitted']; ?>
                        </td>
                        <td class="p1">
                            <?php echo $info['prefdetails']; ?>
                        </td>
                        <td class="p1">
                            <?php echo $info['assetdesc']; ?>
                        </td>
                        <td class="p1">
                            <?php echo $info['sectordesc']; ?>
                        </td>
                        <td class="p1">
                            <?php echo $info['countryname']; ?>
                        </td>
                        <td class="p1">
                            <?php echo $info['regionname']; ?>
                        </td>
                        <td class="p1"><a href="index.php?page=editpreference&prefid=<?php
                        echo $info['prefid']; ?>">Extract Idea</a> |
                            <a href="index.php?page=editpreference&prefid=<?php
                            echo $info['prefid']; ?>">Edit</a> |
                            <a href="index.php?page=deletepreference&prefid=<?php
                            echo $info['prefid']; ?>">Delete</a>
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