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
                } else
                    header('location:index.php?page=login');
                ?>
                <a href="index.php?page=logout">Logout</a>
            </div>
            <h2>WMC Relationship Manager</h2>
            <h3>Main Menu</h3>

            <?php
            if (!empty($_POST['lstoption']))
                $clientname = $_POST['txtoption'];
            ?>

            <form method="post" action="">
                <select name="lstoption" id="lstoption">
                    <option selected disabled>Select an option</option>
                    <option value="clients">Clients</option>
                    <option value="ideas">Investment Opportunities</option>
                </select>
                <input type="text" name="txtoption" id="txtoption" placeholder="Enter Search Criteria"
                    value="<?php echo isset($clientname) ? $clientname : '' ?>">
                <input type="submit" name="btnoption" id="btnoption" value="Enter Query">
            </form>

            <?php
            if (isset($_POST['btnoption'])) {
                if (!empty($_POST['lstoption'])) {
                    if (!empty($_POST['txtoption'])) {
                        if ($_POST['lstoption'] === 'clients') {
                            $clientname = $_POST['txtoption'];
                            $clientinfos = GetClientInfo($clientname);
                            foreach ($clientinfos as $clientinfo) {
                                echo "<br>";
                                echo "<strong>Client Profile</strong><br>";
                                echo "ID: " . $clientinfo['id'] . "<br>";
                                echo "Name: " . $clientinfo['fullname'] . "<br>";
                                echo "Email: " . $clientinfo['emailaddress'] . "<br>";
                                echo "<br>";
                            }
                            ?>
                            <?php

                            $infos = GetPreferences($clientinfo['id']);
                            ?>
                            <form method="post" action="index.php?page=opportunity">
                            <table id="preference">
                                <tr>
                                    <th align="left" class="p1">Preference ID</th>
                                    <th align="left" class="p1">Date Submitted</th>
                                    <th align="left" class="p1">Preference Details</th>
                                    <th align="left" class="p1">   
                                        <!--<select name="lstopp" id="lstopp">
                                            <option selected disabled>Match Preference</option>
                                            <?php 
                                            //$oppinfos = GetIdeas();
                                            //foreach($oppinfos as $oppinfo){
                                            ?>
                                            <option><?php //echo $oppinfo['oppname'];?></option>
                                            <?php 
                                            //}
                                            ?>
                                        </select> -->
                                    </th>
                                </tr>
                                <?php
                                foreach ($infos as $info) {
                                    ?>
                                    <tr>
                                        <td class="p1"><?php echo $info['prefid']; ?></td>
                                        <td class="p1"><?php echo $info['datesubmitted']; ?></td>
                                        <td class="p1"><?php echo $info['prefdetails']; ?></td>
                                        <td class="p1"><a href="index.php?page=opportunity&prefid=<?php 
                                        echo $info['prefid'];?>&clientname=<?php 
                                        echo $clientinfo['fullname'];?>">Investment Option</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            </form>
                            <?php
                        }
                    } else if($_POST['lstoption'] === 'ideas'){
                        echo "<br>Investment ideas selected!";
                    }else
                        echo "<br>Enter a search criteria!";
                } else
                    echo "<br>Select an option!";
            }
            ?>
        </div>
    </div>
</body>

</html>