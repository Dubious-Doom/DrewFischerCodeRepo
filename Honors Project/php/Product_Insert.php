<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connection.php';
$conn = OpenCon();


/* 
The following names need to be passed into the POST:
productName
productNotes
*/

//$productName = filter_input(INPUT_POST, $_POST["productName"]);
//$productNotes = filter_input(INPUT_POST, $_POST["productNotes"]);

$productID = htmlspecialchars($_POST["productID"]);
$vendorName = htmlspecialchars($_POST["vendorName"]);
$productName = htmlspecialchars($_POST["productName"]);
$productNotes = htmlspecialchars($_POST["productNotes"]);

echo $vendorName . ' ' . $productName . ' ' . $productNotes;
if($productID != ''){
    echo "Nice" . "<br>" . $productID;
    
    $sql = "update Product set
    ProductName = ?,
    ProductNotes = ?
    where ProductID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $productName, $productNotes, $productID);
    $stmt->execute();
}
else{
    echo "Cool" . "<br>" . $productID;

    $sql = "call InsertProduct(?, ?, (select VendorID from Vendor where VendorName = ?));";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $productName, $productNotes, $vendorName);
    $stmt->execute();
}
CloseCon($conn);

header("Location: ../addproduct.php");
?>