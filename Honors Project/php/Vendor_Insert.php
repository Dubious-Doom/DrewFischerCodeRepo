<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connection.php';
$conn = OpenCon();


/* 
The following names need to be passed into the POST:
vendorName
vendorNotes
*/

//$vendorName = filter_input(INPUT_POST, $_POST["vendorName"]);
//$vendorNotes = filter_input(INPUT_POST, $_POST["vendorNotes"]);

$vendorID = htmlspecialchars($_POST["vendorID"]);
$vendorName = htmlspecialchars($_POST["vendorName"]);
$vendorNotes = htmlspecialchars($_POST["vendorNotes"]);
$vendorActive = htmlspecialchars($_POST["vendorActive"]);

if($vendorID != ''){
    echo "Nice" . "<br>" . $vendorID;

    $sql = "update Vendor set
    VendorName = ?,
    VendorNotes = ?,
    VendorActive = ?
    where VendorID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssbi", $vendorName, $vendorNotes, $vendorActive, $vendorID);
    $stmt->execute();
}
else{
    echo "Cool" . "<br>" . $vendorID;

    $sql = "call InsertVendor(?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $vendorName, $vendorNotes);
    $stmt->execute();
}

CloseCon($conn);

header("Location: ../addvendor.php");
?>