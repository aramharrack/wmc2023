<!doctype html>
<html lang="en">

<head>
    <title>WMC Delete Preferences</title>
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
            <h2>WMC Delete Preferences</h2>
            <?php
            if (!empty($_GET['prefid'])) {
                $prefid = $_GET['prefid'];
                $infos = GetPreference($prefid);
            }
            ?>
            <?php
            if (isset($_POST['delpreference'])) {
                $errors = array();
                $datesubmitted = $_POST['datesubmitted'];
                $prefdetails = $_POST['prefdetails'];

                if (empty($prefdetails)) {
                    $errors[] = "Preference Details is required!";
                }

                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                } else {
                    $response = DeletePreference($prefid);
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
                            <th class="p3"></th>
                            <td class="p4"><input type="submit" value="Delete Preference" name="delpreference"
                                    id="delpreference"></td>
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