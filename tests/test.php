<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Preferences</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <?php
    // Replace 'localhost', 'username', 'password', and 'database_name' with your MySQL server details
    $mysqli = new mysqli('localhost', 'root', '', 'wmc2023db');

    // Check for connection errors
    if ($mysqli->connect_error) {
      echo "Failed to connect to MySQL: " . $mysqli->connect_error;
      exit();
    }

    // Replace 'user_id' with the user's ID
    $user_id = 4;

    // Retrieve the user's preferences from the 'preferences' table
    $result = $mysqli->query("SELECT assettypes.assetdesc, industrysectors.sectordesc, countries.countryname, regions.regionname 
                              FROM preferences
							  LEFT JOIN assettypes ON preferences.assetid = assettypes.assetid
                              LEFT JOIN industrysectors ON preferences.parmcode = industrysectors.parmcode
                              LEFT JOIN countries ON preferences.countrycode = countries.countrycode
                              LEFT JOIN regions ON preferences.regionid = regions.regionid
                              WHERE preferences.clientid = $user_id");

    // Check for query errors
    if (!$result) {
      echo "Failed to retrieve user preferences: " . $mysqli->error;
      exit();
    }
    ?>

    <div class="container">
      <h1 class="mt-5 mb-4">My Preferences</h1>

	  <h2>Asset Types:</h2>
      <ul class="list-group mb-4">
        <?php while ($row = $result->fetch_assoc()): ?>
          <li class="list-group-item">
            <?php echo $row['assetdesc']; ?>
          </li>
        <?php endwhile; ?>
      </ul>
	  
      <h2>Industry Sectors:</h2>
      <ul class="list-group mb-4">
	    <?php $result->data_seek(0); ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <li class="list-group-item">
            <?php echo $row['sectordesc']; ?>
          </li>
        <?php endwhile; ?>
      </ul>

      <h2>Countries:</h2>
      <ul class="list-group mb-4">
        <?php $result->data_seek(0); ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <li class="list-group-item">
            <?php echo $row['countryname']; ?>
          </li>
        <?php endwhile; ?>
      </ul>

      <h2>Regions:</h2>
      <ul class="list-group mb-4">
        <?php $result->data_seek(0); ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <li class="list-group-item">
            <?php echo $row['regionname']; ?>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>

    <?php
    // Close the database connection
    $mysqli->close();
    ?>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>