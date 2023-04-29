<!doctype html>
<html lang="en">

<head>
    <title>WMC Client Main</title>
    <meta charset="utf-8">
    <style>
        /* General styles */
/* General styles */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 800px;
  margin: 0 auto;
}

.box {
  border: 1px solid #ccc;
  padding: 20px;
  margin-top: 50px;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 18px;
}

a {
  color: #0000ff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

.breadcrumb {
  list-style: none;
  margin: 0;
  padding: 0;
}

.breadcrumb li {
  display: inline-block;
  margin-right: 10px;
}

.breadcrumb li a {
  color: #666;
  text-decoration: none;
}

.breadcrumb li a:hover {
  text-decoration: underline;
}

/* Table styles */
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ccc;
}

th {
  background-color: #f2f2f2;
}

.p1 {
  width: 150px;
}


    </style>
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
                <li><a href="index.php?page=opportunity">View Investments</a></li>
            </ul>
            <h2>WMC Client Main</h2>
            <?php
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
                        <td class="p1"><a href="index.php?page=idea&prefid=<?php 
                            echo $info['prefid']; ?>">Extract Idea</a>
                            <a href="index.php?page=editpreference&prefid=<?php
                            echo $info['prefid']; ?>">Edit</a> |
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