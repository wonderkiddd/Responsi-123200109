<?php
include 'connection.php';

$kode_barang = $_GET['id'];

$cek = mysqli_query($conn, "SELECT * FROM `inventory` WHERE `item_id` = '$kode_barang'") or die(mysqli_error($conn));

if (mysqli_num_rows($cek) > 0) {
    $query = "DELETE FROM `inventory` WHERE `item_id` = '$kode_barang'";
    $delete = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if ($delete) {
        echo '<script>alert("Success Delete Data."); document.location="123200105-Data_Inventaris.php";</script>';
    } else {
        echo '<script>alert("Failed Delete Data."); document.location="123200105-Data_Inventaris.php";</script>';
    }
} else {
    echo '<script>alert("ID didnt exist."); document.location="123200105-Data_Inventaris.php";</script>';
}
?>