<?php
if (isset($_GET['prefid'])) {
    $prefid = $_GET['prefid'];
    if (DeletePreference($prefid)) {
        header("location:index.php?page=clientmain");
        exit();
    } else {
        echo "Failed to delete preference.";
    }
}
?>