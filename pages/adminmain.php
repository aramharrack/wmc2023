<!doctype html>
<html lang="en">

<head>
    <title>WMC Admin Main</title>
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
                <li><a href="index.php?page=opportunity">Add Opportunities</a></li>
            </ul>
            <h2>WMC Administrator</h2>
            <h3>Main Menu</h3>

            <?php
            $infos = GetInstruments();
            ?>
            <table id="preference">
                <tr>
                    <th align="left" class="pinstr">Instrument ID</th>
                    <th align="left" class="pinstr">Instrument Name</th>
                    <th align="left" class="pinstr">ticker</th>
                    <th align="left" class="pinstr">issuer</th>
                    <th align="left" class="pinstr">stock exchange</th>
                    <th align="left" class="pinstr">currency</th>
                    <th align="left" class="pinstr">denomination</th>
                    <th align="left" class="pinstr">closing price</th>
                    <th align="left" class="pinstr">price closing date</th>
                    <th align="left" class="pinstr">risk rating</th>
                    <th align="left" class="pinstr">Admin ID</th>
                </tr>
                <?php
                foreach ($infos as $info) {
                    ?>
                    <tr>
                        <td class="pinstr">
                            <?php echo $info['instrumentid']; ?>
                        </td>
                        <td class="pinstr">
                            <?php echo $info['shortname']; ?>
                        </td>
                        <td class="pinstr">
                            <?php echo $info['ticker']; ?>
                        </td>
                        <td class="pinstr">
                            <?php echo $info['issuer']; ?>
                        </td>
                        <td class="pinstr">
                            <?php echo $info['stockexchange']; ?>
                        </td>
                        <td class="pinstr">
                            <?php echo $info['currency']; ?>
                        </td>
                        <td class="pinstr">
                            <?php echo $info['denomination']; ?>
                        </td>
                        <td class="pinstr">
                            <?php echo $info['closingprice']; ?>
                        </td>
                        <td class="pinstr">
                            <?php echo $info['priceclosingdate']; ?>
                        </td>
                        <td class="pinstr">
                            <?php echo $info['riskrating']; ?>
                        </td>
                        <td class="pinstr">
                            <?php echo $info['staffid']; ?>
                        </td>
                        <!--<td class="p1"><a href="index.php?page=editpreference&prefid=<?php //echo $info['prefid'];?>">Edit</a> |
                    <a href="index.php?page=deletepreference&prefid=<?php //echo $info['prefid'];?>">Delete</a></td>-->
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>