<?php
function UpdateInstrument(
    $datesubmitted,
    $instrumentid,
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
    $staffid) 
{
    include "db_connect.php";

    $sql = "update instruments
            set datesubmitted = :datesubmitted
                shortname = :shortname
                instrumentname = :instrumentname
                assetid = :assetid
                parmcode = :parmcode
                countrycode = :countrycode
                ticker = :ticker
                isin = :isin
                issuer = :issuer
                stockexchange = :stockexchange
                currency = :currency
                denomination = :denomination
                closingprice = :closingprice
                priceclosingdate = :priceclosingdate
                issuedate = :issuedate
                maturitydate = :maturitydate
                coupon = :coupon
                riskrating = :riskrating
                staffid = :staffid
            where instrumentid = :instrumentid";
    //prepare the query
    $query = $db->prepare($sql);
    //execute the query
    if ($query) {
        $query->execute(
            array(
                ':datesubmitted' => $datesubmitted,
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
                ':staffid' => $staffid,
                ':instrumentid' => $instrumentid
            )
        );
        if (!$query)
            echo "Something went wrong. " . print_r($db->errorInfo());
        else
            return $query;
    } else
        echo "Something went wrong." . print_r($db->errorInfo());
}

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
        $clientid = $row['id'];
    }
    return $clientid;
}

function GetInstrument($instrumentid)
{
    include "db_connect.php";

    $instrumentinfos = array();

    $sql = "select *
            from instruments
            where instrumentid = :instrumentid";

    $query = $db->prepare($sql);
    $query->execute(array(':instrumentid' => $instrumentid));

    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $instrumentinfos[] = $row;
    }
    return $instrumentinfos;
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

function GetRegionOptions()
{
    include "db_connect.php";
    $sql = "select regionid, regionname from regions";
    $query = $db->prepare($sql);
    $query->execute();
    $options = '';
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['regionid'] . '">' . $row['regionname'] . '</option>';
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