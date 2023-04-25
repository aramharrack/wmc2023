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
                <li><a href="index.php?page=adminmain">Main</a></li>
                <li><a href="index.php?page=addinstrument">Add Instrument</a></li>
                <li><a href="index.php?page=opportunity">Add Opportunities</a></li>
            </ul>
            <h2>WMC Add Products</h2>
            <?php
            if (isset($_POST['addproduct'])) {

                if (!empty($_POST['shortname']))
                    $shortname = $_POST['shortname'];
                else
                    $errors[] = "Enter Display Name!";

                if (!empty($_POST['instrumentname']))
                    $instrumentname = $_POST['instrumentname'];
                else
                    $errors[] = "Enter Instrument Name!";

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

                if (!empty($_POST['ticker']))
                    $ticker = $_POST['ticker'];
                else
                    $errors[] = "Enter Ticker!";

                if (!empty($_POST['isin']))
                    $isin = $_POST['isin'];
                else
                    $isin = null;

                if (!empty($_POST['issuer']))
                    $issuer = $_POST['issuer'];
                else
                    $errors[] = "Enter Issuer!";

                if (!empty($_POST['stockexchange']))
                    $stockexchange = $_POST['stockexchange'];
                else
                    $errors[] = "Enter Stock Exchange!";

                if (!empty($_POST['currency']))
                    $currency = $_POST['currency'];
                else
                    $errors[] = "Select Curreny!";

                if (!empty($_POST['denomination']))
                    $denomination = $_POST['denomination'];
                else
                    $errors[] = "Enter Denomination!";

                if (!empty($_POST['closingprice']))
                    $closingprice = $_POST['closingprice'];
                else
                    $errors[] = "Enter Closing Price!";

                if (!empty($_POST['priceclosingdate']))
                    $priceclosingdate = $_POST['priceclosingdate'];
                else
                    $errors[] = "Enter Closing Date!";

                if (!empty($_POST['issuedate']))
                    $issuedate = $_POST['issuedate'];
                else
                    $issuedate = null;

                if (!empty($_POST['maturitydate']))
                    $maturitydate = $_POST['maturitydate'];
                else
                    $maturitydate[] = null;

                if (!empty($_POST['coupon']))
                    $coupon = $_POST['coupon'];
                else
                    $coupon = null;

                if (!empty($_POST['riskrating']))
                    $riskrating = $_POST['riskrating'];
                else
                    $errors[] = "Select Risk Rating!";

                $adminid = GetAdminID($username);

                if (!empty($errors)) {
                    foreach ($errors as $error)
                        echo $error . "<br>";
                } else {
                    $response = InsertInstrument(
                        $shortname,
                        $instrumentname,
                        $assettype,
                        $industrysector,
                        $country,
                        $ticker,
                        $isin,
                        $issuer,
                        $stockexchange,
                        $currency,
                        $denomination,
                        $closingprice,
                        $priceclosingdate,
                        $issuedate,
                        $maturitydate,
                        $coupon,
                        $riskrating,
                        $adminid
                    );
                    if ($response)
                        header('location:index.php?page=adminmain');
                }
            }
            ?>

            <form method="post">
                <table id="preference">
                    <tr>
                        <th class="p3"><label for="shortname">Display Name</label></th>
                        <td class="p4"><input type="text" name="shortname" id="shortname"
                                value="<?php echo isset($shortname) ? $shortname : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="instrumentname">Instrument Name</label></th>
                        <td class="p4"><input type="text" name="instrumentname" id="instrumentname"
                                value="<?php echo isset($instrumentname) ? $instrumentname : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="assettype">Asset Type</label></th>
                        <td><select id="assettype" name="assettype">
                                <option value="">Select an Asset Type...</option>
                                <?php echo $assetoptions = GetAssetOptions(); ?>
                            </select></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="industrysector">Industry Sector</label></th>
                        <td><select id="industrysector" name="industrysector">
                                <option value="">Select an Industry Sector...</option>
                                <?php echo $industryoptions = GetIndustryOptions(); ?>
                            </select></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="country">Country</label></th>
                        <td><select id="country" name="country">
                                <option value="">Select a Country...</option>
                                <?php echo $countryoptions = GetCountryOptions(); ?>
                            </select></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="ticker">Ticker</label></th>
                        <td class="p4"><input type="text" name="ticker" id="ticker"
                                value="<?php echo isset($ticker) ? $ticker : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="isin">ISIN</label></th>
                        <td class="p4"><input type="text" name="isin" id="isin"
                                value="<?php echo isset($isin) ? $isin : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="issuer">Issuer</label></th>
                        <td class="p4"><input type="text" name="issuer" id="issuer"
                                value="<?php echo isset($issuer) ? $issuer : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="stockexchange">Stock Exchange</label></th>
                        <td class="p4"><input type="text" name="stockexchange" id="stockexchange"
                                value="<?php echo isset($stockexchange) ? $stockexchange : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="currency">Curreny</label></th>
                        <td><select id="currency" name="currency">
                                <option value="">Select Curreny...</option>
                                <?php echo $currencyoptions = GetCurrenyOptions(); ?>
                            </select></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="denomination">Denomination</label></th>
                        <td class="p4"><input type="text" name="denomination" id="denomination"
                                value="<?php echo isset($denomination) ? $denomination : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="closingprice">Closing Price</label></th>
                        <td class="p4"><input type="text" name="closingprice" id="closingprice"
                                value="<?php echo isset($closingprice) ? $closingprice : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="priceclosingdate">Closing Price Date</label></th>
                        <td class="p4"><input type="date" name="priceclosingdate" id="priceclosingdate"
                                value="<?php echo isset($priceclosingdate) ? $priceclosingdate : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="issuedate">Issue Date</label></th>
                        <td class="p4"><input type="date" name="issuedate" id="issuedate"
                                value="<?php echo isset($issuedate) ? $issuedate : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="maturitydate">Maturity Date</label></th>
                        <td class="p4"><input type="date" name="maturitydate" id="maturitydate"
                                value="<?php echo isset($maturitydate) ? $maturitydate : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="coupon">Coupon</label></th>
                        <td class="p4"><input type="text" name="coupon" id="coupon"
                                value="<?php echo isset($coupon) ? $coupon : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th class="p3"><label for="riskrating">Risk Rating</label></th>
                        <td><select id="riskrating" name="riskrating">
                                <option value="">Select Risk Level...</option>
                                <?php echo $riskoptions = GetRiskOptions(); ?>
                            </select></td>
                    </tr>

                    <tr>
                        <th class="p3"></th>
                        <td class="p4"><input type="submit" value="Add Product" name="addproduct" id="addproduct"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>