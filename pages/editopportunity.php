<!doctype html>
<html lang="en">

<head>
    <title>WMC Edit Preferences</title>
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
            <h2>WMC Edit Preferences</h2>
            <?php
            if (!empty($_GET['oppid'])) {
                $oppid = $_GET['oppid'];
                $infos = GetOpportunity($oppid);
            }
            ?>
            <?php
            if (isset($_POST['editopportunity'])) {
                $errors = array();
                $datesubmitted = $_POST['datesubmitted'];

                if (!empty($_POST['oppname']))
                  $oppname = $_POST['oppname'];
               else
                  $errors[] = "Enter Opportunity Type!";

               if (!empty($_POST['availabledate']))
                  $availabledate = $_POST['availabledate'];
               else
                  $errors[] = "Enter Available Date!";

               if (!empty($_POST['closingdate']))
                  $closingdate = $_POST['closingdate'];
               else
                  $errors[] = "Enter Closing Date!";

               if (!empty($_POST['oppdetails']))
                  $oppdetails = $_POST['oppdetails'];
               else
                  $errors[] = "Enter Opportunity Details!";

                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                } else {
                    $response = EditOpportunity($oppid, $oppname, $availabledate, $closingdate, $oppdetails);
                    if ($response) {
                        header('location:index.php?page=adminmain');
                        exit;
                    }
                }
            }
            ?>

            <?php
            foreach ($infos as $info) {
                ?>
                <form method="post" action="">
                    <table id="preference">
                        <tr>
                            <th class="p4"><label for="datesubmitted"> Date Submitted </label></th>
                            <td class="p4"><input type="text" name="datesubmitted" id="datesubmitted"
                                    value="<?php echo $info['datesubmitted']; ?>" readonly></td>
                        </tr>
                        <tr>
                            <th class="p4"><label for="oppname">Opportunity Type</label></th>
                            <td class="p4"><input type="text" name="oppname" id="oppname"
                                    value="<?php echo $info['oppname']; ?>"></td>
                        </tr>
                        <tr>
                            <th class="p4"><label for="availabledate">Available Date</label></th>
                            <td class="p4"><input type="date" name="availabledate" id="availabledate"
                                    value="<?php echo $info['availabledate']; ?>"></td>
                        </tr>
                        <tr>
                            <th class="p4"><label for="closingdate">Closing Date</label></th>
                            <td class="p4"><input type="date" name="closingdate" id="closingdate"
                                    value="<?php echo $info['closingdate']; ?>"></td>
                        </tr>
                        <tr>
                            <th class="p4"><label for="oppdetails">Opportunity Details</label></th>
                            <td class="p4"><textarea name="oppdetails"
                                    id="oppdetails"><?php echo $info['oppdetails']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th class="p4"></th>
                            <td class="p4"><input type="submit" value="Edit Opportunity" name="editopportunity"
                                    id="editopportunity">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
            }
            ?>

        </div>
    </div>
</body>

</html>