<!doctype html>
<html lang="en">

<head>
   <title>WMC Classical User Registration</title>
   <meta charset="utf-8">
</head>

<body>
   <div class="container">
      <div class="box">
         <h2>WMC Classical User Registration</h2>
         <?php
         if (isset($_POST['register'])) {

            if (!empty($_POST['fullname']))
               $fullname = $_POST['fullname'];
            else
               $errors[] = "Enter Full Name!";

            if (!empty($_POST['emailaddress']))
               $emailaddress = $_POST['emailaddress'];
            else
               $errors[] = "Enter an Email Address!";

            if (!empty($_POST['username']))
               $username = $_POST['username'];
            else
               $errors[] = "Enter username!";

            if (!empty($_POST['password']))
               $password = $_POST['password'];
            else
               $errors[] = "Enter password!";

            if (!empty($_POST['confirm-password']))
               $confirmPassword = $_POST['confirm-password'];
            else
               $errors[] = "Enter confirm password!";

            if (!empty($_POST['classicalusertype']))
               $classicalusertype = $_POST['classicalusertype'];
            else
               $errors[] = "Select User Type!";

            if (!empty($errors)) {
               foreach ($errors as $error)
                  echo $error . "<br>";
            } else {
               //check if username exists
               if (CheckUsernameExists($username))
                  $errors[] = "Username already exists. Please choose a different username.";

               $passwordErrors = CheckPassword($password, $confirmPassword);
               if (!empty($passwordErrors))
                  foreach ($passwordErrors as $error)
                     echo $error . '<br>';
               else {
                  // password is valid
                  $response = InsertRegistration($fullname, $emailaddress, $username, $password, $classicalusertype);
                  if ($response)
                     header('location:index.php?page=login');
               }
            }
         }
         ?>

         <form method="post" action="">
            <table>
               <tr>
                  <td><label for="fullname"> Full Name </label></td>
                  <td><input type="text" name="fullname" id="fullname"
                        value="<?php echo isset($fullname) ? $fullname : ''; ?>"></td>
               </tr>
               <tr>
                  <td><label for="emailaddress"> Email Address</label></td>
                  <td><input type="email" name="emailaddress" id="emailaddress"
                        value="<?php echo isset($emailaddress) ? $emailaddress : ''; ?>"></td>
               </tr>
               <tr>
                  <td><label for="username"> Username </label></td>
                  <td><input type="text" name="username" id="username"
                        value="<?php echo isset($username) ? $username : ''; ?>"></td>
               </tr>
               <tr>
                  <td><label for="password"> Password </label></td>
                  <td><input type="password" name="password" id="password"></td>
               </tr>
               <tr>
                  <td><label for="confirm-password">Confirm Password</label></td>
                  <td><input type="password" name="confirm-password" id="confirm-password"></td>
               </tr>
               <tr>
                  <td><label for="classicalusertype"> Classical User Type</label></td>
                  <td>
                     <select name="classicalusertype" id="classicalusertype">
                        <option selected disabled>Select Classical User Type</option>
                        <option value="managers">Relationship Manager</option>
                        <option value="clients">Client</option>
                        <option value="admins">Admin</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td><input type="submit" value="Register" name="register" id="register"></td>
               </tr>
            </table>
         </form>
         <p><a href="index.php?page=login">Login Here!</a></p>
      </div>
   </div>
</body>

</html>