<?php

include ('connect.php');

if (isset($_GET['id'])) {
    // sql to delete a record
    $id = $_GET['id'];
    $sql = "DELETE FROM services WHERE id=$id";

    if ($connect->exec($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        //echo "Error deleting record: " . $connect->error;
    }
    header("Location: ../services.php");
} else {
    # code...
}