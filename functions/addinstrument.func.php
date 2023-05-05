<?php
function GetAdminID($username)
{
   include "db_connect.php";

   $sql = "select id
            from admins
            where username = :username";

   //prepare the query
   $query = $db->prepare($sql);

   $query->execute(array(':username' => $username));

   if (!$query)
      echo "Something went wrong. " . print_r($db->errorInfo());
   else {
      $row = $query->fetch(PDO::FETCH_ASSOC);
      $adminid = $row['id'];
   }
   return $adminid;
}

function InsertInstrument(
   $datesubmitted,
   $shortname,
   $instrumentname,
   $assetid,
   $parmcode,
   $countrycode,
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
   $staffid
) {
   include "db_connect.php";

   $sql = "insert into instruments
            values(:datesubmitted, :instrumentid, :shortname, :instrumentname, :assetid, :parmcode, 
                     :countrycode, :ticker, :isin, :issuer, :stockexchange, :currency,
                     :denomination, :closingprice, :priceclosingdate, :issuedate,
                     :maturitydate, :coupon, :riskrating, :staffid)";
   //prepare the query
   $query = $db->prepare($sql);
   //execute the query
   if ($query) {
      $instrumentid = null;
      $query->execute(
         array(
            ':datesubmitted' => $datesubmitted,
            ':instrumentid' => $instrumentid,
            ':shortname' => $shortname,
            ':instrumentname' => $instrumentname,
            ':assetid' => $assetid,
            ':parmcode' => $parmcode,
            ':countrycode' => $countrycode,
            ':ticker' => $ticker,
            ':isin' => $isin,
            ':issuer' => $issuer,
            ':stockexchange' => $stockexchange,
            ':currency' => $currency,
            ':denomination' => $denomination,
            ':closingprice' => $closingprice,
            ':priceclosingdate' => $priceclosingdate,
            ':issuedate' => $issuedate,
            ':maturitydate' => $maturitydate,
            ':coupon' => $coupon,
            ':riskrating' => $riskrating,
            ':staffid' => $staffid
         )
      );
      //var_dump($query->errorInfo());
      if (!$query)
         echo "Something went wrong. " . print_r($db->errorInfo());
      else
         return $query;
   } else {
      echo "Something went wrong." . print_r($db->errorInfo());
   }
}

function GetAssetOptions()
{
   include "db_connect.php";
   $sql = "select assetid, assetdesc from assettypes order by assetid asc";
   $query = $db->prepare($sql);
   $query->execute();
   $options = '';
   while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $options .= '<option value="' . $row['assetid'] . '">' . $row['assetid'] . " - " . $row['assetdesc'] . '</option>';
   }
   return $options;
}

function GetIndustryOptions()
{
   include "db_connect.php";
   $sql = "select parmcode, sectordesc from industrysectors order by parmcode asc";
   $query = $db->prepare($sql);
   $query->execute();
   $options = '';
   while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $options .= '<option value="' . $row['parmcode'] . '">' . $row['parmcode'] . " - " . $row['sectordesc'] . '</option>';
   }
   return $options;
}

function GetCountryOptions()
{
   include "db_connect.php";
   $sql = "select countrycode, countryname from countries order by countryname asc";
   $query = $db->prepare($sql);
   $query->execute();
   $options = '';
   while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $options .= '<option value="' . $row['countrycode'] . '">' . $row['countrycode'] . " - " . $row['countryname'] . '</option>';
   }
   return $options;
}

function GetCurrenyOptions()
{
   include "db_connect.php";
   $sql = "select ccycode, ccyname from currencies order by ccyname asc";
   $query = $db->prepare($sql);
   $query->execute();
   $options = '';
   while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $options .= '<option value="' . $row['ccycode'] . '">' . $row['ccycode'] . " - " . $row['ccyname'] . '</option>';
   }
   return $options;
}

function GetRiskOptions()
{
   include "db_connect.php";
   $sql = "select risklvlid, riskdesc from risklevels order by risklvlid asc";
   $query = $db->prepare($sql);
   $query->execute();
   $options = '';
   while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $options .= '<option value="' . $row['risklvlid'] . '">' . $row['risklvlid'] . " - " . $row['riskdesc'] . '</option>';
   }
   return $options;
}
?>