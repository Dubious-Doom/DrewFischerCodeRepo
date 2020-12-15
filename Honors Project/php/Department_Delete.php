<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'db_connection.php';
$conn = OpenCon();

/*This file only checks for a DepartmentID being passed in from adddepartment.php and then deletes that row.
If there is no DepartmentID, then nothing happens and the page redirects back to the form.*/


$departmentID = htmlspecialchars($_POST["departmentID"]);

if($departmentID != ''){
    echo "Nice" . "<br>" . $departmentID;
    
    $sql = "delete from DataElement
    where DepartmentID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $departmentID);
    $stmt->execute();
    
    $sql = "delete from Department
    where DepartmentID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $departmentID);
    $stmt->execute();
    
}
else {
    echo "Cool";
}

CloseCon($conn);

header("Location: ../adddepartment.php");
?>