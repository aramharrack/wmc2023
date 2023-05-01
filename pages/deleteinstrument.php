<?php
if (isset($_GET['instrumentid'])) {
    $instrumentid = $_GET['instrumentid'];
    if (DeleteInstrument($instrumentid)) {
        header("location:index.php?page=adminmain");
        exit();
    } else {
        echo "Failed to delete instrument.";
    }
}
?>