<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'db_connection.php';
$conn = OpenCon();

/*This constitutes every field on the main form. 
If the rows exist in their respective table, they are used as normal in the InsertMainFormDE proc.
If a row does not exist, it is inserted into its appropriate table before the InsertMainFormDE proc is run.*/
$dataElementID = htmlspecialchars($_POST["dataElementID"]);
$staffFName = htmlspecialchars($_POST["staffFName"]);
$staffLName = htmlspecialchars($_POST["staffLName"]);
$vendorName = htmlspecialchars($_POST["vendorName"]);
$productName = htmlspecialchars($_POST["productName"]);
$departmentName = htmlspecialchars($_POST["departmentName"]);
$dateApproved = htmlspecialchars($_POST["dateApproved"]);
$dateExpired = htmlspecialchars($_POST["dateExpired"]);
$dataType = htmlspecialchars($_POST["dataType"]);
$dataFormat = htmlspecialchars($_POST["dataFormat"]);
$sourceDB = htmlspecialchars($_POST["sourceDB"]);
$sourceTable = htmlspecialchars($_POST["sourceTable"]);
$sourceField = htmlspecialchars($_POST["sourceField"]);
$dataDescription = htmlspecialchars($_POST["dataDescription"]);
$itNotes = htmlspecialchars($_POST["itNotes"]);
$approveNotes = htmlspecialchars($_POST["approveNotes"]);
$deptNotes = htmlspecialchars($_POST["deptNotes"]);

//This variable acts as an indicator for whether a row exists in a table. It is set to false by default.
$exists = false;

if($dataElementID != ''){
    echo "Nice" . "<br>" . $dataElementID;
    
    $sql = "update DataElement set
    DEName = ?,
    DEDescription = ?,
    DEApprovalDate = ?,
    DEExpirationDate = ?,
    DEITNotes = ?,
    DEApproverNotes = ?,
    DEDepartmentNotes = ?
    where DEID = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $dataType, $dataDescription, $dateApproved, $dateExpired, $itNotes, $approveNotes, $deptNotes, $dataElementID);
    $stmt->execute();
    
}
else {
//These segments check the passed in variables against existing rows in the database.
echo "Cool";
$sql = "select * from Vendor;";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc() ) {
            if($vendorName == $row['VendorName']){
                $exists = true;
            }
        }
    }
$result->free();
    
    if($exists == false){
        $sql = "call InsertVendor(?, '');";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $vendorName);
        $stmt->execute();
        echo "Vendor: Inserted"."<br>";
    }
    else {
        $exists = false;
        echo "Vendor: Exists"."<br>";
    }

//Product
$sql = "select * from Product;";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc() ) {
            if($productName == $row['ProductName']){
                $exists = true;
            }
        }
    }
$result->free();
    
    if($exists == false){
        $sql = "call InsertProduct(?, '', (select VendorID from Vendor where VendorName = ?));";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $productName, $vendorName);
        $stmt->execute();
        echo "Product: Inserted"."<br>";
    }
    else {
        $exists = false;
        echo "Product: Exists"."<br>";
    }

//Department
$sql = "select * from Department;";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc() ) {
            if($departmentName == $row['DepartmentName']){
                $exists = true;
            }
        }
    }
$result->free();
    
    if($exists == false){
        $sql = "call InsertDepartment(?, '');";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $departmentName);
        $stmt->execute();
        echo "Department: Inserted"."<br>";
    }
    else {
        $exists = false;
        echo "Department: Exists"."<br>";
    }

//Staff
$sql = "select * from Staff;";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc() ) {
            if($staffFName == $row['StaffFName'] and $staffLName == $row['StaffLName']){
                $exists = true;
            }
        }
    }
$result->free();
    
    if($exists == false){
        $sql = "call InsertStaff(?, ?, '', '', '', '', '', '');";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $staffFName, $staffLName);
        $stmt->execute();
        echo "Staff: Inserted"."<br>";
    }
    else {
        $exists = false;
        echo "Staff: Exists"."<br>";
    }

//Format
$sql = "select * from Format;";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc() ) {
            if($dataFormat == $row['FormatType']){
                $exists = true;
            }
        }
    }
$result->free();
    
    if($exists == false){
        $sql = "call InsertFormat(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $dataFormat);
        $stmt->execute();
        echo "Format: Inserted"."<br>";
    }
    else {
        $exists = false;
        echo "Format: Exists"."<br>";
    }

//Source database
$sql = "select * from SourceDB;";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc() ) {
            if($sourceDB == $row['SDBName']){
                $exists = true;
            }
        }
    }
$result->free();
    
    if($exists == false){
        $sql = "call InsertSourceDB(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $sourceDB);
        $stmt->execute();
        echo "SourceDB: Inserted"."<br>";
    }
    else {
        $exists = false;
        echo "SourceDB: Exists"."<br>";
    }

//Source table
$sql = "select * from SourceTable;";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc() ) {
            if($sourceTable == $row['STName']){
                $exists = true;
            }
        }
    }
$result->free();
    
    if($exists == false){
        $sql = "call InsertSourceTable(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $sourceTable);
        $stmt->execute();
        echo "SourceTable: Inserted"."<br>";
    }
    else {
        $exists = false;
        echo "SourceTable: Exists"."<br>";
    }

//Source field
$sql = "select * from SourceField;";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc() ) {
            if($sourceField == $row['SFName']){
                $exists = true;
            }
        }
    }
$result->free();
    
    if($exists == false){
        $sql = "call InsertSourceField(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $sourceField);
        $stmt->execute();
        echo "SourceField: Inserted"."<br>";
    }
    else {
        $exists = false;
        echo "SourceField: Exists"."<br>";
    }

//This is the actual data element insert.

$sql = 'call InsertMainFormDE 
(?,
?,
?,  
?, 
?, 
?, 
?, 
?, 
?,
?, 
?, 
?, 
?, 
?, 
?);';
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssssssssssssss",
    $dataType,
    $staffFName,
    $staffLName,
    $productName,
    $departmentName,
    $dataFormat,
    $sourceField,
    $sourceTable,
    $sourceDB,
    $dataDescription,
    $dateApproved,
    $dateExpired,
    $itNotes,
    $approveNotes,
    $deptNotes
);
$stmt->execute();


echo '<br>' . $staffFName . ' ' . $staffLName . '<br>' .
$vendorName . '<br>' .
$productName . '<br>' .
$departmentName . '<br>' .
$dateApproved . '<br>' .
$dateExpired . '<br>' .
$dataType . '<br>' .
$dataFormat . '<br>' .
$sourceDB . '<br>' .
$sourceTable . '<br>' .
$sourceField . '<br>' .
$dataDescription . '<br>' .
$itNotes . '<br>' .
$approveNotes . '<br>' .
$deptNotes . '<br>';
}

CloseCon($conn);
header("Location: ../mainform.php");

?>