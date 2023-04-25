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
                <li><a href="index.php?page=addproduct">Add Products</a></li>
                <li><a href="index.php?page=opportunity">Add Opportunities</a></li>
            </ul>
            <h2>WMC Administrator</h2>
            <h3>Main Menu</h3>
            
            <?php

            $infos = GetOpportunities($username);
            ?>
            <table id="preference">
                <tr>
                    <th align="left" class="p1">Opportunity Name</th>
                    <th align="left" class="p1">Available Date</th>
                    <th align="left" class="p1">Closing Date</th>
                    <th align="left" class="p1">Opportunity Details</th>
                    <th align="left" class="p1">Staff ID</th>
                </tr>
                <?php
                foreach ($infos as $info) {
                    ?>
                    <tr>
                        <td class="p1">
                            <?php echo $info['oppname']; ?>
                        </td>
                        <td class="p1">
                            <?php echo $info['availabledate']; ?>
                        </td>
                        <td class="p1">
                            <?php echo $info['closingdate']; ?>
                        </td>
                        <td class="p1">
                            <?php echo $info['oppdetails']; ?>
                        </td>
                        <td class="p1">
                            <?php echo $info['staffid']; ?>
                        </td>
                        <!--<td class="p1"><a href="index.php?page=editpreference&prefid=<?php //echo $info['prefid'];?>">Edit</a> |
                    <a href="index.php?page=deletepreference&prefid=<?php //echo $info['prefid'];?>">Delete</a></td>-->
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>