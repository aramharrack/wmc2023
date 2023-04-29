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
			
			<?php
			if(!empty($_POST['lstoption']))
				$clientname = $_POST['lstoption'];
			?>
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
			if(isset($_POST['btnoption'])){
				if(!empty($_POST['btnoption'])){
					if(!empty($_POST['txtoption'])){
						if($_POST['lstoption'] === 'clients'){
							$clientname = $_POST['txtoption'];
							$clientinfos = GetClientInfo($clientname);
						}
					}else
						echo "Enter search criteria!";
				}else
					echo "Select an option!";
			}
			
			
			
			?>
            

        </div>
    </div>
</body>

</html>