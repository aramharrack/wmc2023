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
            <p>&nbsp;</p>
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
                <input type="text" name="txtoption" id="txtoption" placeholder="Enter search criteria"
                    value="<?php echo isset($clientname) ? $clientname : ''; ?>">
                <input type="submit" name="btnoption" id="btnoption" value="Enter Query">
            </form>

            <?php
            if (!empty($_POST['lstoption'])) {
                $option = $_POST['lstoption'];

                if (!empty($_POST['txtoption'])) {
                    $txtoption = trim($_POST['txtoption']);

                    if ($option === 'clients') {
                        $clientname = $_POST['txtoption'];
                        $clientinfos = GetClientInfo($clientname);

                        foreach ($clientinfos as $clientinfo) {
                            echo "<br>";
                            echo "Client ID: " . $clientinfo['id'] . "<br>";
                            echo "Client's  Name: " . $clientinfo['fullname'] . "<br>";
                            echo "Client's Email: " . $clientinfo['emailaddress'] . "<br>";
                            echo "<br>";

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
                        }
                    } else if ($option === 'ideas') {
                        $oppinfos = SearchOpportunities($txtoption);

                        if (!empty($oppinfos)) {
                            ?>
                                <p>&nbsp;</p>
                                <table id="opportunities">
                                    <tr>
                                        <th align="left" class="p1">Opportunity ID</th>
                                        <th align="left" class="p1">Opportunity Type</th>
                                        <th align="left" class="p1">Instrument Name</th>
                                        <th align="left" class="p1">Issuer Name</th>
                                        <th align="left" class="p1"></th>
                                    </tr>
                                    <?php
                                    foreach ($oppinfos as $oppinfo) {
                                        ?>
                                        <tr>
                                            <td class="p1">
                                            <?php echo $oppinfo['oppid']; ?>
                                            </td>
                                            <td class="p1">
                                            <?php echo $oppinfo['oppname']; ?>
                                            </td>
                                            <td class="p1">
                                            <?php echo $oppinfo['instrumentname']; ?>
                                            </td>
                                            <td class="p1">
                                            <?php echo $oppinfo['issuer']; ?>
                                            </td>
                                            <td class="p1"><a href="index.php?page=opportunity&oppid=<?php echo
                                                $oppinfo['oppid']; ?>">View Details</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            <?php
                        } else {
                            echo "<br>No investment opportunities found!";
                        }
                    }
                } else {
                    echo "Enter search criteria!";
                }
            } else {
                echo "Select an option!";
            }
            ?>

        </div>
    </div>
</body>

</html>