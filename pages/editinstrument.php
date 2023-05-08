<!doctype html>
<html lang="en">

<head>
   <title>WMC Edit Instrument</title>
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
            <li><a href="index.php?page=profile">Profile</a></li>
            <li><a href="index.php?page=addinstrument">Add Instrument</a></li>
            <li><a href="index.php?page=addopportunity">Add Opportunity</a></li>
            <li><a href="index.php?page=viewopportunity">View Opportunities</a></li>
         </ul>
         <h2>WMC Edit Instrument</h2>
         <?php
         if (!empty($_GET['instrumentid'])) {
            $instrumentid = $_GET['instrumentid'];
            $infos = GetInstrument($instrumentid);
         }
         ?>
         <?php
         if (isset($_POST['editinstrument'])) {
            $datesubmitted = $_POST['datesubmitted'];
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
               $maturitydate = null;

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
               foreach ($errors as $error) {
                  echo $error . "<br>";
               }
            } else {
               $response = UpdateInstrument(
                  $datesubmitted,
                  $instrumentid,
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
               if ($response) {
                  header('location:index.php?page=adminmain');
                  exit;
               }
            }
         }
         ?>

         <?php
         foreach ($infos as $info) {
            ?>
            <form method="post">
               <table id="preference">
                  <tr>
                     <th class="p4"><label for="datesubmitted"> Date Submitted </label></th>
                     <td class="p4"><input type="text" name="datesubmitted" id="datesubmitted"
                           value="<?php echo $info['datesubmitted']; ?>" readonly></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="shortname">Display Name</label></th>
                     <td class="p4"><input type="text" name="shortname" id="shortname"
                           value="<?php echo $info['shortname']; ?>"></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="instrumentname">Instrument Name</label></th>
                     <td class="p4"><input type="text" name="instrumentname" id="instrumentname"
                           value="<?php echo $info['instrumentname']; ?>"></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="assettype">Asset Type</label></th>
                     <td><select id="assettype" name="assettype">
                           <option value="">Select an Asset Type...</option>
                           <?php echo $assetoptions = GetAssetOptions(); ?>
                        </select></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="industrysector">Industry Sector</label></th>
                     <td><select id="industrysector" name="industrysector">
                           <option value="">Select an Industry Sector...</option>
                           <?php echo $industryoptions = GetIndustryOptions(); ?>
                        </select></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="country">Country</label></th>
                     <td><select id="country" name="country">
                           <option value="">Select a Country...</option>
                           <?php echo $countryoptions = GetCountryOptions(); ?>
                        </select></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="ticker">Ticker</label></th>
                     <td class="p4"><input type="text" name="ticker" id="ticker" value="<?php echo $info['ticker']; ?>">
                     </td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="isin">ISIN</label></th>
                     <td class="p4"><input type="text" name="isin" id="isin" value="<?php echo $info['isin']; ?>">
                     </td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="issuer">Issuer</label></th>
                     <td class="p4"><input type="text" name="issuer" id="issuer" value="<?php echo $info['issuer']; ?>">
                     </td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="stockexchange">Stock Exchange</label></th>
                     <td class="p4"><input type="text" name="stockexchange" id="stockexchange"
                           value="<?php echo $info['stockexchange']; ?>"></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="currency">Curreny</label></th>
                     <td><select id="currency" name="currency">
                           <option value="">Select Curreny...</option>
                           <?php echo $currencyoptions = GetCurrenyOptions(); ?>
                        </select></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="denomination">Denomination</label></th>
                     <td class="p4"><input type="number" name="denomination" id="denomination"
                           value="<?php echo $info['denomination']; ?>"></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="closingprice">Closing Price</label></th>
                     <td class="p4"><input type="text" name="closingprice" id="closingprice"
                           value="<?php echo $info['closingprice']; ?>"></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="priceclosingdate">Closing Price Date</label></th>
                     <td class="p4"><input type="date" name="priceclosingdate" id="priceclosingdate"
                           value="<?php echo $info['priceclosingdate']; ?>"></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="issuedate">Issue Date</label></th>
                     <td class="p4"><input type="date" name="issuedate" id="issuedate"
                           value="<?php echo $info['issuedate']; ?>"></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="maturitydate">Maturity Date</label></th>
                     <td class="p4"><input type="date" name="maturitydate" id="maturitydate"
                           value="<?php echo $info['maturitydate']; ?>"></td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="coupon">Coupon</label></th>
                     <td class="p4"><input type="number" name="coupon" id="coupon" value="<?php echo $info['coupon']; ?>">
                     </td>
                  </tr>
                  <tr>
                     <th class="p4"><label for="riskrating">Risk Rating</label></th>
                     <td><select id="riskrating" name="riskrating">
                           <option value="">Select Risk Level...</option>
                           <?php echo $riskoptions = GetRiskOptions(); ?>
                        </select></td>
                  </tr>
                  <tr>
                     <th class="p4"></th>
                     <td class="p4"><input type="submit" value="Edit Instrument" name="editinstrument" id="editinstrument">
                     </td>
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