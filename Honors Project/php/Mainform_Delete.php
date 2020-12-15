<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connection.php';
$conn = OpenCon();

/*This file only checks for a DEID being passed in from mainform.php and then deletes that row.
If there is no DEID, then nothing happens and the page redirects back to the main form.*/
$dataElementID = htmlspecialchars($_POST["dataElementID"]);

if($dataElementID != ''){
    //echo "Nice" . "<br>" . $dataElementID;
    
    $sql = "delete from DataElement 
    where DEID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $dataElementID);
    $stmt->execute();
    
}
else {

    //echo "Cool";

}

CloseCon($conn);
header("Location: ../mainform.php");

?>