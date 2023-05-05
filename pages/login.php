<!doctype html>
<html lang="en">

<head>
   <title>WMC Classicial User Login</title>
   <meta charset="utf-8">
</head>

<body>
   <div class="container">
      <div class="box">
         <h2>WMC Classicial User Login</h2>
         <?php
         if (isset($_POST['login'])) {

            if (!empty($_POST['username']))
               $username = $_POST['username'];
            else
               $errors[] = "Enter username!";

            if (!empty($_POST['password']))
               $password = $_POST['password'];
            else
               $errors[] = "Enter password!";

            if (!empty($errors)) {
               foreach ($errors as $error)
                  echo $error . "<br>";
            } else {
               $response = getClassicalUser($username, $password);
               if ($response) {
                  $num = $response->rowCount();
                  if ($num > 0) {
                     $row = $response->fetch(PDO::FETCH_ASSOC);
                     $classicalusertype = $row['classicalusertype'];
                     $_SESSION['username'] = $username;
                     if ($classicalusertype === "Relationship Manager")
                        $usertype = "rmmain";
                     else if ($classicalusertype === "Client")
                        $usertype = "clientmain";
                     else if ($classicalusertype === "Administrator")
                        $usertype = "adminmain";
                     else
                        echo "<p>Your account type is not recognized.</p>";
                     header('location:index.php?page=' . $usertype);
                  } else
                     echo "<p>Username or Password Incorrect!</p>";
               } else
                  echo "Unable to login!";
            }
         }
         ?>

         <form method="post" action="">
            <table width="50%">
               <tr>
                  <td> <label for="username"> Username </label></td>
                  <td><input type="text" name="username" id="username"
                        value="<?php echo isset($username) ? $username : ''; ?>"></td>
               </tr>
               <tr>
                  <td> <label for="password"> Password </label></td>
                  <td><input type="password" name="password" id="password"></td>
               </tr>
               <tr>
                  <td></td>
                  <td><input type="submit" value="Login" name="login" id="login"></td>
               </tr>
            </table>
         </form>
         <p><a href="index.php?page=register">Register Here!</a></p>
      </div>
   </div>
</body>

</html>