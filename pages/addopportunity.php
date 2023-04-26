<!doctype html>
<html lang="en">

<head>
    <title>WMC Add Opportunity</title>
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
                <li><a href="index.php?page=addinstrument">Add Instrument</a></li>
                <li><a href="index.php?page=addopportunity">Add Opportunity</a></li>
            </ul>
            <h2>WMC Add Opportunity</h2>

            <form method="post" action="">
                <select name="lstoption" id="lstoption">
                    <option selected disabled>Select an Instrument</option>
                    <?php echo $instrumentoptions = GetInstrumentOptions(); ?>
                </select>
                <input type="submit" name="btnoption" id="btnoption" value="Select Instrument">
            </form>

            <?php

            if (isset($_POST['btnoption'])) {
                if (!empty($_POST['lstoption'])) {
                    $instrumentid = $_POST['lstoption'];
                    $instrumentinfos = GetInstrument($instrumentid);
                    foreach ($instrumentinfos as $instrumentinfo) {
                        echo "<br>";
                        echo "<strong>Instrument Profile</strong><br>";
                        echo "ID: " . $instrumentinfo['instrumentid'] . "<br>";
                        echo "Instrument Name: " . $instrumentinfo['instrumentname'] . "<br>";
                        echo "Ticker: " . $instrumentinfo['ticker'] . "<br>";
                        echo "Issuer: " . $instrumentinfo['issuer'] . "<br>";
                        echo "Stock Exchange: " . $instrumentinfo['stockexchange'] . "<br>";
                        echo "<br>";
                    }
                    if (isset($_POST['addopportunity'])) {
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

                        $adminid = GetAdminID($username);
                        echo "adminid: " . $adminid;
                        if (!empty($errors)) {
                            foreach ($errors as $error)
                                echo $error . "<br>";
                        } else {
                            $response = InsertOpportunity($instrumentid, $availabledate, $closingdate, $oppdetails, $adminid);
                            if ($response)
                                echo "Entered";
                            //header('location:index.php?page=adminmain');
                        }
                    }
                    ?>
                    <form method="post" action="">
                        <table id="preference">
                            <tr>
                                <th class="p3"><label for="availabledate">Available Date</label></th>
                                <td class="p4"><input type="date" name="availabledate" id="availabledate"
                                        value="<?php echo isset($availabledate) ? $availabledate : ''; ?>"></td>
                            </tr>
                            <tr>
                                <th class="p3"><label for="closingdate">Closing Date</label></th>
                                <td class="p4"><input type="date" name="closingdate" id="closingdate"
                                        value="<?php echo isset($closingdate) ? $closingdate : ''; ?>"></td>
                            </tr>
                            <tr>
                                <th class="p3"><label for="oppdetails">Opportunity Details</label></th>
                                <td class="p4"><textarea name="oppdetails" id="oppdetails"><?php
                                echo isset($oppdetails) ? $oppdetails : ''; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th class="p3"></th>
                                <td class="p4"><input type="submit" value="Add Opportunity" name="addopportunity"
                                        id="addopportunity"></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                } else {
                    echo "Please select an instrument!";
                }
            }

            ?>
        </div>
    </div>
</body>

</html>