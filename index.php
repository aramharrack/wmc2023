<?php
session_start();
include "functions/db_connect.php";

//once a page is clicked, it is assigned to $page
$page = htmlentities($_GET["page"]);
include "functions/" . $page . ".func.php"; //rmmain.func.php
$pages = scandir("pages"); //scan directory called pages and load

if (!empty($page) && in_array($page . ".php", $pages)) //Check for specific page
  $content = "pages/" . $page . ".php"; // eg. pages/rmmain.php
else
  header("location:index.php?page=login");
?>

<!doctype html>
<html lang="en">

<head>
  <title>Wealth Management Company</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/fancystyle.css">
</head>

<body>
  <?php
  include $content;
  ?>
</body>

</html>