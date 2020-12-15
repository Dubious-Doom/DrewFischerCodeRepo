<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connection.php';
$conn = OpenCon();
session_start();

$vendor = htmlspecialchars($_GET['vendor']);
if($vendor == '0'){
    CloseCon($conn);
    header('Location: ../addvendor.php');
}
$_SESSION['vendorID'] = $vendor;

$sql = "select VendorID, VendorName, VendorNotes, VendorActive from Vendor
where VendorID = $vendor;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc() ) {
    echo gettype($vendor) . '<br>' .
    $row['VendorID'] . '<br>' .
    $row['VendorName'] . '<br>' .
    $row['VendorNotes'] . '<br>' .
    $row['VendorActive']
    ;

    $_SESSION['vendorName'] = $row['VendorName'];
    $_SESSION['vendorNotes'] = $row['VendorNotes'];
    $_SESSION['vendorActive'] = $row['VendorActive'];
    }
}
$result->free();

CloseCon($conn);
header('Location: ../addvendor.php');
?>