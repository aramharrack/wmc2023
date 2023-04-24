<?php

require_once('db_connect.php');
require_once('functions.php');

// Get the options for the asset type dropdown
            $sql = "select assetid, assetdesc from assettypes";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $asset_type_options = '';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $asset_type_options .= '<option value="' . $row['assetid'] . '">' . $row['assetdesc'] . '</option>';
            }

            // Get the options for the industry sector dropdown
            $sql = "select parmcode, sectordesc from industrysectors";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $industry_sector_options = '';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $industry_sector_options .= '<option value="' . $row['parmcode'] . '">' . $row['sectordesc'] . '</option>';
            }

            // Get the options for the region dropdown
            $sql = "select regionid, regionname from regions";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $region_options = '';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $region_options .= '<option value="' . $row['regionid'] . '">' . $row['regionname'] . '</option>';
            }

            // Get the options for the country dropdown
            $sql = "select countrycode, countryname from countries";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $country_options = '';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $country_options .= '<option value="' . $row['countrycode'] . '">' . $row['countryname'] . '</option>';
            }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $instrument_type = $_POST["instrument_type"];
  $industry_sector = $_POST["industry_sector"];
  $region = $_POST["region"];
  $country = $_POST["country"];

  $result = insert_preferences($instrument_type, $industry_sector, $region, $country, $min_investment_amount, $max_investment_amount, $investment_currency);

  if ($result) {
    echo "Preferences submitted successfully!";
  } else {
    echo "Error!";
}

}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete"])) {

$id = $_GET["delete"];

if (delete_preference($id)) {
echo "Preference deleted successfully!";
} else {
echo "Error: Preference not deleted.";
}

}

?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="instrument_type">Instrument Type:</label>
  <select id="instrument_type" name="instrument_type">
    <?php echo $instrument_type_options; ?>
  </select><br><br>

<label for="industry_sector">Industry Sector:</label>
<select id="industry_sector" name="industry_sector">
<?php echo $industry_sector_options; ?>
</select><br><br>

<label for="region">Region:</label>
<select id="region" name="region">
<?php echo $region_options; ?>
</select><br><br>

<label for="country">Country:</label>
<select id="country" name="country">
<?php echo $country_options; ?>
</select><br><br>

  <input type="submit" value="Submit">
</form>
<table>
  <tr>
    <th>Instrument Type</th>
    <th>Industry Sector</th>
    <th>Region</th>
    <th>Country</th>
    <th></th>
  </tr>
  <?php

  $sql = "SELECT * FROM Preferences";
  $stmt = $db->prepare($sql);
  $stmt->execute();

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['Instrument_Type_Code'] . "</td>";
    echo "<td>" . $row['Industry_Sector_Code'] . "</td>";
    echo "<td>" . $row['Region_Code'] . "</td>";
    echo "<td>" . $row['Country_Code'] . "</td>";
    echo '<td><button onclick="confirmDelete(' . $row['id'] . ')">Delete</button></td>';
    echo "</tr>";
  }

  ?>
</table>
<div id="confirmModal" class="modal">
  <div class="modal-content">
    <p>Are you sure you want to delete this preference?</p>
    <div class="button-container">
      <button id="confirmYes">Yes</button>  <button id="confirmNo">No</button>
</div>
</div>
</div>

<script>
function confirmDelete(id) {
  var modal = document.getElementById("confirmModal");
  var confirmYes = document.getElementById("confirmYes");
  var confirmNo = document.getElementById("confirmNo");

  modal.style.display = "block";

  confirmYes.onclick = function() {
    window.location.href = "index.php?delete=" + id;
  }

  confirmNo.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}
</script>