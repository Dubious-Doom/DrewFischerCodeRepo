<?php 
include 'view/header.php';
include 'php/db_connection.php'; 
session_start();
error_reporting(E_ALL ^ E_NOTICE);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$dataElementID = $_SESSION['dataElementID'];
$vendorName = $_SESSION['vendorName'];
$productName = $_SESSION['productName'];
$departmentName = $_SESSION['departmentName'];
$staffFName = $_SESSION['staffFName'];
$staffLName = $_SESSION['staffLName'];
$approvalDate = $_SESSION['approvalDate'];
$expirationDate = $_SESSION['expirationDate'];
$dataType = $_SESSION['dataType'];
$formatType = $_SESSION['formatType'];
$sdbName = $_SESSION['sdbName'];
$stName = $_SESSION['stName'];
$sfName = $_SESSION['sfName'];
$description = $_SESSION['description'];
$itNotes = $_SESSION['itNotes'];
$approverNotes = $_SESSION['approverNotes'];
$departmentNotes = $_SESSION['departmentNotes'];
/*
echo '<br>' . $staffFName . ' ' . $staffLName . '<br>' .
$vendorName . '<br>' .
$productName . '<br>' .
$departmentName . '<br>' .
$approvalDate . '<br>' .
$expirationDate . '<br>' .
$dataType . '<br>' .
$formatType . '<br>' .
$sdbName . '<br>' .
$stName . '<br>' .
$sfName . '<br>' .
$description . '<br>' .
$itNotes . '<br>' .
$approverNotes . '<br>' .
$departmentNotes . '<br>';
*/
?>

<main>
    <section id="mainform">
        <div id="formwrapper">
            <h1>Data Element Form</h1>
            <p>Choose an element to edit/update, or fill in the form to add a new element.</p>

            <form action="php/Main_Selection_Submit.php" method="GET">
                <!-- <select name="dataElement" id="dataElement" onmousedown="if(this.options.length>8){this.size=8;}" 
                            onchange='this.size=0;' onblur="this.size=0;"> -->
                            <select name="dataElement" id="dataElement">
                    <option value="0">Select element...</option>
                    <?php
                        error_reporting(E_ALL ^ E_NOTICE);
                        ini_set('display_errors', 1);
                        $conn = OpenCon();
                        $sql = "select * from DataElement de
                        join Product p on de.ProductID = p.ProductID
                        join Vendor v on p.VendorID = v.VendorID;";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc() ) {
                            echo '<option value=' . $row['DEID'] . '>' . $row['VendorName'] . '/' . $row['ProductName'] . '/'. $row['DEID'] .  '</option>';
                            }
                        }
                        $result->free();
                        CloseCon($conn); 
                    ?>
                </select>
                <button type="submit">EDIT</button>
            </form>

            <form action="php/Mainform_Submit.php" method="POST" id="fullform">                
                <!-- Going to look into making first four hybrid input text / search
                with a built in autocomplete.  It will be the cleanest way to make 
                this page work, and reduce overall page count on the site. -->
                <ul>
                    <li>
                        <label for="">* Vendor</label>
                        <input type="text" name="vendorName" id="vendorName" required placeholder="Hyland" value="<?=$vendorName?>" <?php if($dataElementID != '' and $dataElementID != '0'){echo "disabled";}?>>
                    </li>
                    <li>
                        <label for="">* Product</label>
                        <input type="text" name="productName" id="productName" required placeholder="Brainware" value="<?=$productName?>" <?php if($dataElementID != '' and $dataElementID != '0'){echo "disabled";}?>>
                    </li>
                    <li>
                        <label for="">* Department</label>
                        <input type="text" name="departmentName" id="departmentName" required placeholder="Transfer Credit" value="<?=$departmentName?>" <?php if($dataElementID != '' and $dataElementID != '0'){echo "disabled";}?>>
                    </li>
                    <li>
                        <label for="">* Approved By (First)</label>
                        <input type="text" name="staffFName" id="staffFName" required placeholder="Eric" value="<?=$staffFName?>" <?php if($dataElementID != '' and $dataElementID != '0'){echo "disabled";}?>>
                    </li>
                    <li>
                        <label for="">* Approved By (Last)</label>
                        <input type="text" name="staffLName" id="staffLName" required placeholder="Humphrey"value="<?=$staffLName?>" <?php if($dataElementID != '' and $dataElementID != '0'){echo "disabled";}?>>
                    </li>
                    <li>
                        <label for="">* Date Approved</label>
                        <input type="date" name="dateApproved" id="dateApproved" required placeholder="11/19/2019" value="<?=$approvalDate?>" <?php if($dataElementID != '' and $dataElementID != '0'){echo "disabled";}?>>
                    </li>
                    <li>
                        <label for="">Expiration Date</label>
                        <input type="date" name="dateExpired" id="dateExpired" placeholder="11/19/2021" value="<?=$expirationDate?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="">* Data Type</label>
                        <input type="text" name="dataType" id="dataType" required placeholder="SSN" value="<?=$dataType?>">
                    </li>
                    <li>
                        <label for="">* Data Format</label>
                        <input type="text" name="dataFormat" id="dataFormat" required placeholder="####" value="<?=$formatType?>" <?php if($dataElementID != '' and $dataElementID != '0'){echo "disabled";}?>>
                    </li>
                    <li>
                        <!--<label for="">Location of Source Data</label>
                        <input type="text" name="" id="" placeholder="Banner / XXYY / SSN"> -->
                        <label for="">* Location of Source Database</label>
                        <input type="text" name="sourceDB" id="sourceDB" required placeholder="Banner" value=<?=$sdbName?> <?php if($dataElementID != '' and $dataElementID != '0'){echo "disabled";}?>>
                    </li>
                    <li>
                        <label for="">* Location of Source Table</label>
                        <input type="text" name="sourceTable" id="sourceTable" required placeholder="XXYY" value=<?=$stName?> <?php if($dataElementID != '' and $dataElementID != '0'){echo "disabled";}?>>
                    </li>
                    <li>
                        <label for="">* Location of Source Field</label>
                        <input type="text" name="sourceField" id="sourceField" required placeholder="SSN/DOB/etc" value=<?=$sfName?> <?php if($dataElementID != '' and $dataElementID != '0'){echo "disabled";}?>>
                    </li>    
                    <li>
                        <label for="">Data Description</label>
                        <textarea name="dataDescription" id="dataDescription" cols="30" rows="4" placeholder="e.g. Last four digist of Social Security number" value=<?=$description?>><?=$description?></textarea>
                    </li>                           
                </ul>
                <h3>Notes</h3>
                <div id="notesbtn">
                    <button type="button" class="notebtnactive" id="oitnotes">OIT</button>
                    <button type="button" class="" id="approvenotes">Approver</button>
                    <button type="button" class="" id="deptnotes">Department</button>
                </div>
                <div id="mainNotes">
                    <div id="it-notes"><textarea name="itNotes" id="itNotes" cols="30" rows="4" value=<?=$itNotes?>><?=$itNotes?></textarea></div>
                    <div id="approve-notes"><textarea name="approveNotes" id="approveNotes" cols="30" rows="4" value=<?=$approverNotes?>><?=$approverNotes?></textarea></div>
                    <div id="dept-notes"><textarea name="deptNotes" id="deptNotes" cols="30" rows="4" value=<?=$departmentNotes?>><?=$departmentNotes?></textarea></div> 
                </div>
                <input type="hidden" name="dataElementID" value=<?=$dataElementID?>>
                <div style="grid-column:1 / span 2;">
                    <button type="submit">SAVE</button>
                    <button type="button" class="deletebtn" id="mainformdel">DELETE</button>
                </div>
                <!-- <button type="submit">SAVE</button><button type="submit" formaction="">DELETE</button> -->
            </form>                
        </div>
    </section>
</main>

<?php include 'view/footer.php'; 
session_destroy();?>