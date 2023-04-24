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
            <h2>WMC Edit Preferences</h2>
            <?php
            if (!empty($_GET['prefid'])) {
                $prefid = $_GET['prefid'];
                $infos = GetPreference($prefid);
            }
            ?>
            <?php
            if (isset($_POST['editpreference'])) {
                $errors = array();
                $datesubmitted = $_POST['datesubmitted'];
                $prefdetails = $_POST['prefdetails'];

                if (empty($prefdetails)) {
                    $errors[] = "Preference Details is required!";
                }

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
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                } else {
                    $response = EditPreference($prefid, $datesubmitted, $prefdetails, $clientid, $assettype, $industrysector, $country, $region);
                    if ($response) {
                        header('location:index.php?page=clientmain');
                        exit;
                    }
                }
            }
            ?>

            <?php
            foreach ($infos as $info) {
                ?>
                <form method="post" action="">
                    <table class="preference">
                        <tr>
                            <th class="p3"><label for="datesubmitted"> Date Submitted </label></th>
                            <td class="p4"><input type="text" name="datesubmitted" id="datesubmitted"
                                    value="<?php echo $info['datesubmitted']; ?>" readonly></td>
                        </tr>
                        <tr>
                            <th class="p3"><label for="prefdetails"> Preference Details</label></th>
                            <td class="p4"><textarea name="prefdetails"
                                    id="prefdetails"><?php echo $info['prefdetails']; ?></textarea></td>
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
                            <td class="p4"><input type="submit" value="Edit Preference" name="editpreference"
                                    id="editpreference"></td>
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