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
            </ul>
            <h2>WMC Relationship Manager</h2>
            <h3>Main Menu</h3>
            <form method="post" action="">
                <select name="lstoption" id="lstoption">
                    <option selected disabled>Select an option</option>
                    <option value="clients">Clients</option>
                    <option value="ideas">Investment Opportunities</option>
                </select>
                <input type="text" name="txtoption" id="txtoption" placeholder="Enter search criteria">
                <input type="submit" name="btnoption" id="btnoption" value="Enter Query">
            </form>

            <?php
            // Get client name from form input
            $clientname = '';
            if (isset($_POST['lstoption']) && !empty($_POST['txtoption'])) {
                $option = $_POST['lstoption'];
                $clientname = $_POST['txtoption'];

                if ($option === 'clients') {
                    // Get client info from database
                    $clientinfos = GetClientInfo($clientname);

                    if (!empty($clientinfos)) {
                        foreach ($clientinfos as $clientinfo) {
                            echo "<br>";
                            echo "<strong>Client Profile</strong><br>";
                            echo "ID: " . $clientinfo['id'] . "<br>";
                            echo "Name: " . $clientinfo['fullname'] . "<br>";
                            echo "Email: " . $clientinfo['emailaddress'] . "<br>";
                            echo "<br>";
                        }

                        // Get client preferences from database
                        $infos = GetPreferences($clientinfo['id']);
                        ?>
                        <form method="post" action="index.php?page=opportunity">
                            <table id="preference">
                                <tr>
                                    <th align="left" class="p1">Preference ID</th>
                                    <th align="left" class="p1">Date Submitted</th>
                                    <th align="left" class="p1">Preference Details</th>
                                    <th align="left" class="p1"></th>
                                </tr>
                                <?php
                                foreach ($infos as $info) {
                                    ?>
                                    <tr>
                                        <td class="p1">
                                            <?php echo $info['prefid']; ?>
                                        </td>
                                        <td class="p1">
                                            <?php echo $info['datesubmitted']; ?>
                                        </td>
                                        <td class="p1">
                                            <?php echo $info['prefdetails']; ?>
                                        </td>
                                        <td class="p1"><a href="index.php?page=opportunity&prefid=<?php echo
                                            $info['prefid']; ?>&clientname=<?php echo
                                             $clientinfo['fullname']; ?>">Find Opportunity</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </form>
                        <?php
                    } else {
                        echo "No client found!";
                    }
                } else if ($option === 'ideas') {
                    echo "<br>Investment ideas selected!";
                } else {
                    echo "<br>Invalid option selected!";
                }
            }
            ?>

        </div>
    </div>
</body>

</html>