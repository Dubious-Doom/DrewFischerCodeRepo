<?php include 'view/header.php';
include 'php/db_connection.php'; 
session_start();
error_reporting(E_ALL ^ E_NOTICE);

$departmentID = $_SESSION['departmentID'];
$departmentName = $_SESSION['departmentName'];
$departmentNotes = $_SESSION['departmentNotes'];
?>

<main>
    <section id="additems">

        <!-- <div id="addbuttons">
            <button type="button" id="vendbtn">Vendor</button>
            <button type="button" id="prodbtn">Product</button>
            <button type="button" id="deptbtn">Department</button>
            <button type="button" id="peopbtn">People</button>        
        </div> -->
        
        <section id="adddept">
            <h1>Search / Add Department</h1>
            <!-- Same idea as vendor; hybrid text / search? -->
            <form action="php/Department_Selection_Submit.php" method="GET">
                <!-- <select name="department" id="department" onmousedown="if(this.options.length>8){this.size=8;}" 
                            onchange='this.size=0;' onblur="this.size=0;"> -->
                        <select name="department" id="department">
                        <option value="0">Select department...</option>
                        <?php
                            error_reporting(E_ALL ^ E_NOTICE);
                            ini_set('display_errors', 1);
                            $conn = OpenCon();
                            $sql = "select * from Department;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc() ) {
                                echo '<option value=' . $row['DepartmentID'] . '>' . $row['DepartmentName'] . '</option>';
                                }
                            }
                            $result->free();
                            CloseCon($conn); 
                        ?>
                </select>
            <button type="submit">EDIT</button>
            </form>
            <!-- Need php page for action to dept insert -->
            <form action="php/Department_Insert.php" method="POST" id="departmentform">
                <ul>
                    <li>
                        <label for="addDeptName">* Department Name</label>
                        <input type="text" name="departmentName" id="addDeptName" required value="<?=$departmentName?>">
                    </li>
                    <li>
                        <label for="addDeptNotes">Department Notes</label>
                        <textarea name="departmentNotes" id="addDeptNotes" cols="30" rows="10" value="<?=$departmentNotes?>"><?=$departmentNotes?></textarea>
                    </li>
                </ul>
                <input type="hidden" name="departmentID" value=<?=$departmentID?>>
                <button type="submit">SAVE</button>
                <button type="button" class="deletebtn" id="deptdelbtn">DELETE</button>
            </form>
        </section>

    </section>
</main>

<?php include 'view/footer.php';
session_destroy(); ?>