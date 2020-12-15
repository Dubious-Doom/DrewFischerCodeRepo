<?php include 'view/header.php';
include 'php/db_connection.php'; 
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);

$vendorID = $_SESSION['vendorID'];
$vendorName = $_SESSION['vendorName'];
$vendorNotes = $_SESSION['vendorNotes'];
$vendorActive = $_SESSION['vendorActive'];
?>

<main>
    <section id="additems">

        <!-- <div id="addbuttons">
            <button type="button" id="vendbtn">Vendor</button>
            <button type="button" id="prodbtn">Product</button>
            <button type="button" id="deptbtn">Department</button>
            <button type="button" id="peopbtn">People</button>        
        </div> -->

        <section id="addvendor">
            <h1>Search / Add Vendor</h1>
            <!-- 
                Idea: Hybrid text / select field, scrollable table w/ vendors and associated product count. 
                Add vendor button beneath table. Table sized to allow all info on one non-scrolling page.
                FA magnifying glass icon in text field.  
            -->
            <label for="select_vend"></label>
            <form action="php/Vendor_Selection_Submit.php" method="GET">
            <!-- <select name="vendor" id="vendor" onmousedown="if(this.options.length>8){this.size=8;}" 
                            onchange='this.size=0;' onblur="this.size=0;"> -->
                <select name="vendor" id="vendor">
                <option value="0">Select vendor...</option>
                <!-- PHP here to loop through vendor name list and populate with options -->
                <?php
                            error_reporting(E_ALL ^ E_NOTICE);
                            ini_set('display_errors', 1);
                            $conn = OpenCon();
                            $sql = "select * from Vendor;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc() ) {
                                echo '<option value=' . $row['VendorID'] . '>' . $row['VendorName'] . '</option>';
                                }
                            }
                            $result->free();
                            CloseCon($conn); 
                        ?>
            </select>
            <button type="submit">EDIT</button>
            </form>
            <!-- Action will be Vendor_Insert.php -->
            <form action="php/Vendor_Insert.php" method="POST" id="vendorform">
                <ul>
                    <li>
                        <label for="addVendName">* Vendor Name</label>
                        <input type="text" name="vendorName" id="addVendName" required value="<?=$vendorName?>">
                    </li>
                    <li>
                        <label for="addVendNotes">Vendor Notes</label>
                        <textarea name="vendorNotes" id="addVendNotes" style="margin-bottom: 20px;" cols="30" rows="10" value="<?=$vendorNotes?>"><?=$vendorNotes?></textarea>
                    </li>
                    <li>
                        <input type="radio" id="active" name="vendorActive" value="1" <?php if($vendorActive == 1){echo "checked";} ?>>
                        <label for="active" style="display: inline-block;">Active</label><br>
                        <input type="radio" id="inactive" name="vendorActive" value="0" <?php if($vendorActive == 0){echo "checked";} ?>>
                        <label for="inactive" style="display: inline-block;">Inactive</label><br>                    
                    </li>
                </ul>
                <input type="hidden" name="vendorID" value=<?=$vendorID?>>
                <button type="submit">SAVE</button>
                <button type="button" class="deletebtn" id="venddelbtn">DELETE</button>
            </form>
        </section>

    </section>
</main>

<?php include 'view/footer.php';
session_destroy(); ?>