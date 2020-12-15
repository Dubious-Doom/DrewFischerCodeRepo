<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'db_connection.php';
$conn = OpenCon();

/*This file only checks for a StaffID being passed in from addpeople.php and then deletes that row.
If there is no StaffID, then nothing happens and the page redirects back to form.*/

$staffID = htmlspecialchars($_POST["staffID"]);

if($staffID != ''){
    echo "Nice" . "<br>" . $staffID;

    $sql = "delete from DataElement
    where StaffID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staffID);
    $stmt->execute();
    
    $sql = "delete from Staff
    where StaffID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staffID);
    $stmt->execute();
}
else{
    echo "Cool" . "<br>" . $staffID;
}

CloseCon($conn);

header("Location: ../addpeople.php");
?>