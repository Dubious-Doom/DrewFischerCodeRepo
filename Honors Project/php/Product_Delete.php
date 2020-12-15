<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'db_connection.php';
$conn = OpenCon();


/*This file only checks for a ProductID being passed in from addproduct.php and then deletes that row.
If there is no ProductID, then nothing happens and the page redirects back to form.*/

$productID = htmlspecialchars($_POST["productID"]);

if($productID != ''){
    echo "Nice" . "<br>" . $productID;
    
    $sql = "delete from DataElement
    where ProductID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    
    $sql = "delete from Product
    where ProductID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productID);
    $stmt->execute();
}
else{
    echo "Cool" . "<br>" . $productID;
}
CloseCon($conn);

header("Location: ../addproduct.php");
?>