<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connection.php';
$conn = OpenCon();
session_start();

$staff = htmlspecialchars($_GET['staff']);
if($staff == '0'){
    CloseCon($conn);
    header('Location: ../addpeople.php');
}
$_SESSION['staffID'] = $staff;

$sql = "select StaffID, 
StaffFName, 
StaffLName,
UVID,
StaffEmail,
StaffBuilding,
StaffOffice,
StaffDepartment,
StaffPhoneExt 
from Staff
where StaffID = $staff;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc() ) {
    echo gettype($staff) . '<br>' .
    $row['StaffID'] . '<br>' .
    $row['StaffFName'] . '<br>' .
    $row['StaffLName'] . '<br>' .
    $row['UVID'] . '<br>' .
    $row['StaffEmail'] . '<br>' .
    $row['StaffBuilding'] . '<br>' .
    $row['StaffOffice'] . '<br>' .
    $row['StaffDepartment'] . '<br>' .
    $row['StaffPhoneExt']
    ;

    $_SESSION['staffFName'] = $row['StaffFName'];
    $_SESSION['staffLName'] = $row['StaffLName'];
    $_SESSION['uvid'] = $row['UVID'];
    $_SESSION['staffEmail'] = $row['StaffEmail'];
    $_SESSION['staffBuilding'] = $row['StaffBuilding'];
    $_SESSION['staffOffice'] = $row['StaffOffice'];
    $_SESSION['staffDepartment'] = $row['StaffDepartment'];
    $_SESSION['staffPhoneExt'] = $row['StaffPhoneExt'];
    }
}
$result->free();

CloseCon($conn);
header('Location: ../addpeople.php');
?>