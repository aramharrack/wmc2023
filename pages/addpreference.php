<!doctype html>
<html lang="en">

<head>
    <title>WMC Add Preferences</title>
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
                <li><a href="index.php?page=profile">Profile</a></li>
                <li><a href="index.php?page=addpreference">Add Preference</a></li>
                <li><a href="index.php?page=opportunity">View Investments</a></li>
            </ul>
            <h2>WMC Add Preferences</h2>

            <?php
            if (isset($_POST['addpreference'])) {

                if (!empty($_POST['datesubmitted']))
                    $datesubmitted = $_POST['datesubmitted'];

                if (!empty($_POST['prefdetails']))
                    $prefdetails = $_POST['prefdetails'];
                else
                    $errors[] = "Enter Preference Details!";

                if (!empty($_POST['assettype']))
                $assettype = $_POST['assettype'];
                else
                    $errors[] = "Select Asset Type!";
            
                if (!empty($_POST['industrysector']))
                $industrysector = $_POST['industrysector'];
                else
                  $errors[] = "Select Industry Sector!";
            
                if (!empty($_POST['country']))
                $country = $_POST['country'];
                else
                    $errors[] = "Select Country!";
            
                if (!empty($_POST['region']))
                $region = $_POST['region'];
                else
                    $errors[] = "Select Region!";
            
                $clientid = getClientID($username);

                if (!empty($errors)) {
                    foreach ($errors as $error)
                        echo $error . "<br>";
                } else {
                    $response = InsertPreference($datesubmitted, $prefdetails, $clientid, $assettype, $industrysector, $country, $region);
                    if ($response)
                        header('location:index.php?page=clientmain');
                }
            }
            ?>
            <?php
            $datesubmitted = date('Y-m-d');
            ?>

            <form method="post" action="">
                <table id="preference">
                    <tr>
                        <th class="p3"><label for="datesubmitted"> Date Submitted </label></th>
                        <td class="p4"><input type="text" name="datesubmitted" id="datesubmitted"
                                value="<?php echo $datesubmitted; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="prefdetails"> Preference Details</label></th>
                        <td class="p4"><textarea name="prefdetails" id="prefdetails">
                            <?php echo isset($prefdetails) ? $prefdetails : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="assettype"> Asset Type Preference</label></th>
                        <td><select id="assettype" name="assettype">
                                <option value="">Select an Asset Type...</option>
                                <?php echo $assetoptions = GetAssetOptions(); ?>
                            </select></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="industrysector"> Industry Sector Preference</label></th>
                        <td><select id="industrysector" name="industrysector">
                                <option value="">Select an Industry Sector...</option>
                                <?php echo $industryoptions = GetIndustryOptions(); ?>
                            </select></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="country"> Country Preference</label></th>
                        <td><select id="country" name="country">
                                <option value="">Select a Country...</option>
                                <?php echo $countryoptions = GetCountryOptions(); ?>
                            </select></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="region"> Region Preference</label></th>
                        <td><select id="region" name="region">
                                <option value="">Select a Region...</option>
                                <?php echo $regionoptions = GetRegionOptions(); ?>
                            </select></td>
                    </tr>
                    <tr>
                        <th class="p3"></th>
                        <td class="p4"><input type="submit" value="Add Preferences" name="addpreference"
                                id="addpreference"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>