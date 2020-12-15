<?php include 'view/header.php';
include 'php/db_connection.php';
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$staffID = $_SESSION['staffID'];
$staffFName = $_SESSION['staffFName'];
$staffLName = $_SESSION['staffLName']; 
$uvid = $_SESSION['uvid'];
$staffEmail = $_SESSION['staffEmail']; 
$staffLName = $_SESSION['staffLName']; 
$staffBuilding = $_SESSION['staffBuilding']; 
$staffOffice = $_SESSION['staffOffice']; 
$staffDepartment = $_SESSION['staffDepartment'];
$staffPhoneExt = $_SESSION['staffPhoneExt'];  
?>

<main>
    <section id="additems">

        <!-- <div id="addbuttons">
            <button type="button" id="vendbtn">Vendor</button>
            <button type="button" id="prodbtn">Product</button>
            <button type="button" id="deptbtn">Department</button>
            <button type="button" id="peopbtn">People</button>
        </div> -->
        
        <section id="addpeople">
            <!-- 
                I think we'll want to add a bit to the backend for adding people.  Perhaps we'll want
                to change the PK from UVID to an auto increment number in the database, make UVID its
                own field, then add things like building, office, phone extension, email, and department.
                This will let them more quickly get in touch with someone using just our system, instead 
                of having to look them up elsewhere after having found their name.
            -->
            <h1>Search / Add People</h1>
            <!-- Same idea as vendor; hybrid text / search? -->
            <form action="php/Staff_Selection_Submit.php" method="GET">
            <!-- <select name="staff" id="staff" onmousedown="if(this.options.length>8){this.size=8;}" 
                            onchange='this.size=0;' onblur="this.size=0;"> -->
            <select name="staff" id="staff">
                <option value="0">Select person...</option>
                <!-- PHP here to loop through people name list and populate with options -->
                <?php
                            error_reporting(E_ALL ^ E_NOTICE);
                            ini_set('display_errors', 1);
                            $conn = OpenCon();
                            $sql = "select * from Staff;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc() ) {
                                echo '<option value=' . $row['StaffID'] . '>' . $row['StaffFName'] . ' ' . $row['StaffLName'] . '</option>';
                                }
                            }
                            $result->free();
                            CloseCon($conn); 
                        ?>
            </select>
            <button type="submit">EDIT</button>
            </form>
            <!-- Need php page for action to people insert -->
            <form action="php/Staff_Insert.php" method="POST" id="staffform">
                <ul>
                    <li>
                        <label for="addFirstName">* First Name</label>
                        <input type="text" name="firstName" id="addFirstName" required value="<?=$staffFName?>">
                    </li>
                    <li>
                        <label for="addLastName">* Last Name</label>
                        <input type="text" name="lastName" id="addLastName" required value="<?=$staffLName?>">
                    </li>
                    <li>
                        <label for="addUVID">UVID</label>
                        <input type="text" name="uvid" id="addUVID" value="<?=$uvid?>">
                    </li>
                    <li>
                        <label for="addEmail">Email</label>
                        <input type="email" name="email" id="addEmail" value="<?=$staffEmail?>">
                    </li>
                    <li>
                        <label for="addBuilding">Building</label>
                        <input type="text" name="building" id="addBuilding" value="<?=$staffBuilding?>">
                    </li>
                    <li>
                        <label for="addOffice">Office</label>
                        <input type="text" name="office" id="addOffice" value="<?=$staffOffice?>">
                    </li>
                    <li>
                        <label for="addDepartment">Department</label>
                        <input type="text" name="department" id="addDepartment" value="<?=$staffDepartment?>">
                    </li>
                    <li>
                        <label for="addPhoneExt">Phone Ext.</label>
                        <input type="text" name="phoneExt" id="addPhoneExt" value="<?=$staffPhoneExt?>">
                    </li>
                </ul>
                <input type="hidden" name="staffID" value=<?=$staffID?>>
                <button type="submit">SAVE</button>
                <button type="button" class="deletebtn" id="staffdelbtn">DELETE</button>
            </form>
        </section>

    </section>
</main>

<script>
    $(function(){
        initMask("#staffform");
    });
</script>
<?php include 'view/footer.php';
session_destroy(); ?>