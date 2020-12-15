<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connection.php';
$conn = OpenCon();


/* 
The following names need to be passed into the POST:
departmentName
departmentNotes
*/

//$departmentName = filter_input(INPUT_POST, $_POST["departmentName"]);
//$departmentNotes = filter_input(INPUT_POST, $_POST["departmentNotes"]);

$departmentID = htmlspecialchars($_POST["departmentID"]);
$departmentName = htmlspecialchars($_POST["departmentName"]);
$departmentNotes = htmlspecialchars($_POST["departmentNotes"]);

if($departmentID != ''){
    //echo "Nice" . "<br>" . $dataElementID;
    
    $sql = "update Department set
    DepartmentName = ?,
    DepartmentNotes = ?
    where DepartmentID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $departmentName, $departmentNotes, $departmentID);
    $stmt->execute();
    
}
else {
$sql = "call InsertDepartment(?, ?);";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $departmentName, $departmentNotes);
$stmt->execute();
}

CloseCon($conn);

header("Location: ../adddepartment.php");
?>