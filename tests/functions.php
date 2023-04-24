<?php
function insert_preferences($instrument_type, $industry_sector, $region, $country, $min_investment_amount, $max_investment_amount, $investment_currency) {
  global $db;

  $sql = "INSERT INTO Preferences (Instrument_Type_Code, Industry_Sector_Code, Region_Code, Country_Code, Minimum_Investment_Amount, Maximum_Investment_Amount, Investment_Currency) VALUES (:instrument_type, :industry_sector, :region, :country, :min_investment_amount, :max_investment_amount, :investment_currency)";

  $stmt = $db->prepare($sql);
  $stmt->bindParam(':instrument_type', $instrument_type);
  $stmt->bindParam(':industry_sector', $industry_sector);
  $stmt->bindParam(':region', $region);
  $stmt->bindParam(':country', $country);
  $stmt->bindParam(':min_investment_amount', $min_investment_amount);
  $stmt->bindParam(':max_investment_amount', $max_investment_amount);
  $stmt->bindParam(':investment_currency', $investment_currency);

  if ($stmt->execute()) {
    return true;
  } else {
    return false;
  }
}

function delete_preference($id) {
  global $db;

  $sql = "DELETE FROM Preferences WHERE id = :id";

  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);

  if ($stmt->execute()) {
    return true;
  } else {
    return false;
  }
}
?>