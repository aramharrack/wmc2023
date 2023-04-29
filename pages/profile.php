<!doctype html>
<html lang="en">

<head>
    <title>WMC User Profile</title>
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

            <h2>WMC User Profile</h2>
            <?php
            $userinfos = GetUserInfo($username);
            foreach ($userinfos as $userinfo) {
                echo "<strong>UserID: " . $userinfo['id'] . "</strong><br>";
                echo "<strong>User Type: " . $userinfo['classicalusertype'] . "</strong><br>";
            }
            $userID = $userinfo['id'];
            $classicalusertype = $userinfo['classicalusertype'];
            if ($classicalusertype === "Relationship Manager")
                $page = "rmmain";
            else if ($classicalusertype === "Client")
                $page = "clientmain";
            else if ($classicalusertype === "Administrator")
                $page = "adminmain";
            //echo"<a href="index.php?page=clientmain">Main</a>";
            ?>
            <br>
            <button type="button" onclick="window.location.href='index.php?page=<?php
            echo $page ?>'">Return to Main</button>

            <?php
            // Handle form submission
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $errors = [];
                if (isset($_POST['password'])) {
                    if (!empty($_POST['password'])) {
                        $password = $_POST['password'];
                    } else {
                        $errors[] = "Enter a new password!";
                    }
                }
                if (isset($_POST['confirmpassword'])) {
                    if (!empty($_POST['confirmpassword'])) {
                        $password = $_POST['confirmpassword'];
                    } else {
                        $errors[] = "Enter confirm new password!";
                    }
                }
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                } else {
                    // Get updated form data
                    $updatedData = [
                        'fullname' => $_POST['fullname'],
                        'emailaddress' => $_POST['emailaddress'],
                        'password' => $password,
                    ];

                    $passwordErrors = CheckPassword($password, $_POST['confirmpassword']);
                    if (!empty($passwordErrors)) {
                        foreach ($passwordErrors as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        // Update the user's profile in the database
                        $response = UpdateUser(
                            $userID,
                            $updatedData['fullname'],
                            $updatedData['emailaddress'],
                            $username,
                            $updatedData['password'],
                            $classicalusertype
                        );

                        // Redirect the user to their updated profile page
                        if ($response) {
                            header('location:index.php?page=profile');
                        }
                    }
                }
            }

            // Display the form with current user data filled in as default values
            ?>
            <h3>WMC Update User Profile</h3>
            <form method="post" action="">
                <table>
                    <tr>
                        <td><label for="fullname">Full Name:</label></td>
                        <td><input type="text" id="fullname" name="fullname" value="<?= $userinfo['fullname'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="emailaddress">Email:</label></td>
                        <td><input type="email" id="emailaddress" name="emailaddress"
                                value="<?= $userinfo['emailaddress'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" id="password" name="password" value=""></td>
                    </tr>
                    <tr>
                        <td><label for="confirmpassword">Confirm Password:</label></td>
                        <td><input type="password" id="confirmpassword" name="confirmpassword" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Update Profile" name="updateprofile" id="updateprofile"></td>
                    </tr>
                </table>
            </form>

        </div>
    </div>
</body>

</html>