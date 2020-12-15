<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connection.php';
$conn = OpenCon();
session_start();

$dataElement = htmlspecialchars($_GET['dataElement']);

if($dataElement == '0'){
    CloseCon($conn);
    header('Location: ../mainform.php');
}

$_SESSION['dataElementID'] = $dataElement;

$sql = "select 
v.VendorName as VendorName,
p.ProductName as ProductName,
d.DepartmentName as DepartmentName,
s.StaffFName as StaffFName,
s.StaffLName as StaffLName,
de.DEApprovalDate as DEApprovalDate,
de.DEExpirationDate as DEExpirationDate,
de.DEName as DEName,
f.FormatType as FormatType,
sdb.SDBName as SDBName,
st.STName as STName,
sf.SFName as SFName,
de.DEDescription as DEDescription,
de.DEITNotes as DEITNotes,
de.DEApproverNotes as DEApproverNotes,
de.DEDepartmentNotes as DEDepartmentNotes
from DataElement de
join Staff s on de.StaffID = s.StaffID
join Product p on de.ProductID = p.ProductID
join Vendor v on p.VendorID = v.VendorID
join Department d on de.DepartmentID = d.DepartmentID
join Format f on de.FormatID = f.FormatID
join SourceField sf on de.SFID = sf.SFID
join SourceTable st on de.STID = st.STID
join SourceDB sdb on de.SDBID = sdb.SDBID
where de.DEID = $dataElement;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc() ) {
    echo gettype($dataElement) . '<br>' .
    $row['VendorName'] . '<br>' .
    $row['ProductName'] . '<br>' .
    $row['DepartmentName'] . '<br>' .
    $row['StaffFName'] . '<br>' .
    $row['StaffLName'] . '<br>' .
    $row['DEApprovalDate'] . '<br>' .
    $row['DEExpirationDate'] . '<br>' .
    $row['DEName'] . '<br>' .
    $row['FormatType'] . '<br>' .
    $row['SDBName'] . '<br>' .
    $row['STName'] . '<br>' .
    $row['SFName'] . '<br>' .
    $row['DEDescription'] . '<br>' .
    $row['DEITNotes'] . '<br>' .
    $row['DEApproverNotes'] . '<br>' .
    $row['DEDepartmentNotes'] . '<br>';

    $_SESSION['vendorName'] = $row['VendorName'];
    $_SESSION['productName'] = $row['ProductName'];
    $_SESSION['departmentName'] = $row['DepartmentName'];
    $_SESSION['staffFName'] = $row['StaffFName'];
    $_SESSION['staffLName'] = $row['StaffLName'];
    $_SESSION['approvalDate'] = $row['DEApprovalDate'];
    $_SESSION['expirationDate'] = $row['DEExpirationDate'];
    $_SESSION['formatType'] = $row['FormatType'];
    $_SESSION['dataType'] = $row['DEName'];
    $_SESSION['sdbName'] = $row['SDBName'];
    $_SESSION['stName'] = $row['STName'];
    $_SESSION['sfName'] = $row['SFName'];
    $_SESSION['description'] = $row['DEDescription'];
    $_SESSION['itNotes'] = $row['DEITNotes'];
    $_SESSION['approverNotes'] = $row['DEApproverNotes'];
    $_SESSION['departmentNotes'] = $row['DEDepartmentNotes'];
    }
}
$result->free();

CloseCon($conn);
header('Location: ../mainform.php');
?>