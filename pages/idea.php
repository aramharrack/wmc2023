<!doctype html>
<html lang="en">

<head>
    <title>WMC Client Main</title>
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
            <?php
            $prefid = $_GET['prefid'];
            $opportunities = GetOpportunities($prefid);
            ?>
            <h2>Recommended Opportunities</h2>
            <table id="preference">
                <tr>
                    <th align="left" class="p1">Instrument ID</th>
                    <th align="left" class="p1">Short Name</th>
                    <th align="left" class="p1">Issuer</th>
                    <th align="left" class="p1">Currency</th>
                    <th align="left" class="p1">Closing Price</th>
                    <th align="left" class="p1">Price Closing Date</th>
                    <th align="left" class="p1">Status</th>
                    <th align="left" class="p1"></th>
                </tr>
                <?php
                foreach ($opportunities as $opportunity) {
                    ?>
                    <tr>
                        <td class="p1"><?php echo $opportunity['instrumentid']; ?></td>
                        <td class="p1"><?php echo $opportunity['shortname']; ?></td>
                        <td class="p1"><?php echo $opportunity['issuer']; ?></td>
                        <td class="p1"><?php echo $opportunity['currency']; ?></td>
                        <td class="p1"><?php echo $opportunity['closingprice']; ?></td>
                        <td class="p1"><?php echo $opportunity['priceclosingdate']; ?></td>
                        <td class="p1"><?php echo $opportunity['status']; ?></td>
                        <td class="p1"><a href="#">Invest</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>