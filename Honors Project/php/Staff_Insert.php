<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'db_connection.php';
$conn = OpenCon();


/* 
The following Names need to be passed into the POST:
//firstname
//lastname
//uvid
//email
//building
//office
//department
//phoneExt
*/

//$firstname = filter_input(INPUT_POST, $_POST["staffFName"]);
//$lastname = filter_input(INPUT_POST, $_POST["staffLName"]);
//$uvid = filter_input(INPUT_POST, $_POST["uvid"]);
//$email = filter_input(INPUT_POST, $_POST["email"]);
//$building = filter_input(INPUT_POST, $_POST["building"]);
//$office = filter_input(INPUT_POST, $_POST["office"]);
//$department = filter_input(INPUT_POST, $_POST["department"]);
//$phoneExt = filter_input(INPUT_POST, $_POST["phoneExt"]);

$staffID = htmlspecialchars($_POST["staffID"]);
$firstName = htmlspecialchars($_POST["firstName"]);
$lastName = htmlspecialchars($_POST["lastName"]);
$uvid = htmlspecialchars($_POST["uvid"]);
$email = htmlspecialchars($_POST["email"]);
$building = htmlspecialchars($_POST["building"]);
$office = htmlspecialchars($_POST["office"]);
$department = htmlspecialchars($_POST["department"]);
$phoneExt = htmlspecialchars($_POST["phoneExt"]);

if($staffID != ''){
    echo "Nice" . "<br>" . $staffID;

    $sql = "update Staff set
    StaffFName = ?,
    StaffLName = ?,
    UVID = ?,
    StaffEmail = ?,
    StaffBuilding = ?,
    StaffOffice = ?,
    StaffDepartment = ?,
    StaffPhoneExt = ?
    where StaffID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $firstName, $lastName, $uvid, $email, $building, $office, $department, $phoneExt, $staffID);
    $stmt->execute();
}
else{
    echo "Cool" . "<br>" . $staffID;

    $sql = "call InsertStaff(?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $firstName, $lastName, $uvid, $email, $building, $office, $department, $phoneExt);
    $stmt->execute();
}

CloseCon($conn);

header("Location: ../addpeople.php");
?>