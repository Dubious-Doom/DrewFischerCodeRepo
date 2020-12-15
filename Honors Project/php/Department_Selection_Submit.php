<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connection.php';
$conn = OpenCon();
session_start();

$department = htmlspecialchars($_GET['department']);
if($department == '0'){
    CloseCon($conn);
    header('Location: ../adddepartment.php');
}
$_SESSION['departmentID'] = $department;

$sql = "select DepartmentID, DepartmentName, DepartmentNotes from Department
where DepartmentID = $department;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc() ) {
    echo gettype($department) . '<br>' .
    $row['DepartmentID'] . '<br>' .
    $row['DepartmentName'] . '<br>' .
    $row['DepartmentNotes']
    ;

    $_SESSION['departmentName'] = $row['DepartmentName'];
    $_SESSION['departmentNotes'] = $row['DepartmentNotes'];
    }
}
$result->free();

CloseCon($conn);
header('Location: ../adddepartment.php');
?>