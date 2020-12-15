<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'db_connection.php';
$conn = OpenCon();

/*This file only checks for a StaffID being passed in from addpeople.php and then deletes that row.
If there is no StaffID, then nothing happens and the page redirects back to form.*/

$vendorID = htmlspecialchars($_POST["vendorID"]);

if($vendorID != ''){
    echo "Nice" . "<br>" . $vendorID;

    $sql = "delete from DataElement
    where ProductID in 
        (select ProductID from Product
        where VendorID = ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $vendorID);
    $stmt->execute();
    
    $sql = "delete from Product
    where VendorID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $vendorID);
    $stmt->execute();
    
    $sql = "delete from Vendor
    where VendorID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $vendorID);
    $stmt->execute();
}
else{
    echo "Cool" . "<br>" . $vendorID;
}

CloseCon($conn);

header("Location: ../addvendor.php");
?>