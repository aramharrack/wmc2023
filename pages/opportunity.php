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
            <!--<br>
            <ul class="breadcrumb">
                <li><a href="index.php?page=adminmain">Main</a></li>
                <li><a href="index.php?page=addproduct">Add Products</a></li>
                <li><a href="index.php?page=opportunity">Add Opportunities</a></li>
            </ul>-->
            <h2>WMC Relationship Manager</h2>

            <?php
            if (!empty($_GET['prefid']) && !empty($_GET['clientname'])) {
                $prefid = $_GET['prefid'];
                $clientname = $_GET['clientname'];
                $clientinfos = GetClientInfo($clientname);
                foreach ($clientinfos as $clientinfo) {
                    echo "<br>";
                    echo "<strong>Client Profile</strong><br>";
                    echo "ID: " . $clientinfo['id'] . "<br>";
                    echo "Name: " . $clientinfo['fullname'] . "<br>";
                    echo "Email: " . $clientinfo['emailaddress'] . "<br>";
                    echo "<br>";
                }

                $infos = GetPreferences($clientinfo['id']);

                if (isset($_POST['btnidea'])) {
                    $lstopp = $_POST['lstopp']; // this gives me the oppname. needs oppid to insert to prefopp table
                    //echo "<br> Oppid: " . $lstopp . "<br>"; 
                    if (!empty($lstopp)) {
                        $result = AssignOpportunity($prefid, $lstopp); //therefore oppname is passed here
                        if ($response)
                        header('location:index.php?page=rmmain');
                    } else {
                        echo "Select an opportunity!";
                    }
                }
                ?>
                <table id="preference">
                    <tr>
                        <th align="left" class="p1">Preference ID</th>
                        <th align="left" class="p1">Date Submitted</th>
                        <th align="left" class="p1">Preference Details</th>
                        <th align="left" class="p1">
                            <form action="" method="post">
                                <select name="lstopp" id="lstopp">
                                    <option selected disabled>Match Preference</option>
                                    <?php 
                                    $oppinfos = GetIdeas();
                                    foreach($oppinfos as $oppinfo){
                                    ?>
                                    <option><?php echo $oppinfo['oppname'];?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                                <input type="submit" id="btnidea" name="btnidea" value="Assign Idea">
                            </form>
                        </th>
                    </tr>
                    <?php
                    foreach ($infos as $info) {
                        ?>
                        <tr>
                            <td class="p1"><?php echo $info['prefid']; ?></td>
                            <td class="p1"><?php echo $info['datesubmitted']; ?></td>
                            <td class="p1"><?php echo $info['prefdetails']; ?></td>
                            <td class="p1"><a href="index.php?page=rmmain&prefid=<?php echo $info['prefid']; ?>">Investment Option</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
            ?>

        </div>
    </div>
</body>

</html>