<?php
function GetOpportunities($prefid) {
    include "db_connect.php";
  
    $sql = "select instruments.instrumentid, instruments.shortname, instruments.issuer, 
                    instruments.currency, instruments.closingprice, 
                    instruments.priceclosingdate, preferenceopportunities.status
            from preferenceopportunities
            join opportunities on preferenceopportunities.oppid = opportunities.oppid
            join instruments on opportunities.instrumentid = instruments.instrumentid
            where preferenceopportunities.prefid = :prefid";
    
    $query = $db->prepare($sql);
    $query->execute(array(':prefid' => $prefid));
    
    if (!$query)
        echo "Something went wrong. " . print_r($db->errorInfo());
    else {
        $opportunities = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    return $opportunities;
  }
?>

