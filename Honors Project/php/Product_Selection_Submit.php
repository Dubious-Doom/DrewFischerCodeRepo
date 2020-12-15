<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connection.php';
$conn = OpenCon();
session_start();

$product = htmlspecialchars($_GET['product']);
if($product == '0'){
    CloseCon($conn);
    header('Location: ../addproduct.php');
}
$_SESSION['productID'] = $product;

$sql = "select ProductID, ProductName, ProductNotes from Product
where ProductID = $product;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc() ) {
    echo gettype($product) . '<br>' .
    $row['ProductID'] . '<br>' .
    $row['ProductName'] . '<br>' .
    $row['ProductNotes']
    ;

    $_SESSION['productName'] = $row['ProductName'];
    $_SESSION['productNotes'] = $row['ProductNotes'];
    }
}
$result->free();

CloseCon($conn);
header('Location: ../addproduct.php');
?>