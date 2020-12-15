<?php include 'view/header.php';
include 'php/db_connection.php'; ?>

<main>
    <section id="additems">

        <div id="addbuttons">
            <button type="button" id="vendbtn">Vendor</button>
            <button type="button" id="prodbtn">Product</button>
            <button type="button" id="deptbtn">Department</button>
            <button type="button" id="peopbtn">People</button>        
        </div>

        <section id="addvendor">
            <h1>Search / Add Vendor</h1>
            <!-- 
                Idea: Hybrid text / select field, scrollable table w/ vendors and associated product count. 
                Add vendor button beneath table. Table sized to allow all info on one non-scrolling page.
                FA magnifying glass icon in text field.  
            -->
            <label for="select_vend"></label>
            <select name="select_vend" id="select_vend">
                <option selected="selected">Select vendor...</option>
                <!-- PHP here to loop through vendor name list and populate with options -->
                <?php
                // error_reporting(E_ALL);
                // ini_set('display_errors', 1); 
                // $conn = OpenCon();
                // $sql = "select * from Vendor;";
                // $result = $conn->query($sql);
                // if ($result->num_rows > 0) {
                //     while($row = $result->fetch_assoc() ) {
                //     echo '<option value=' . $row['VendorName'] . '>' . $row['VendorName']. '</option>';
                //     }
                // }
                // $result->free();
                // CloseCon($conn);
                ?>
            </select>
            <!-- Action will be Vendor_Insert.php -->
            <form action="php/Vendor_Insert.php" method="POST">
                <ul>
                    <li>
                        <label for="addVendName">Vendor Name</label>
                        <input type="text" name="vendorName" id="addVendName">
                    </li>
                    <li>
                        <label for="addVendNotes">Vendor Notes</label>
                        <textarea name="vendorNotes" id="addVendNotes" cols="30" rows="10"></textarea>
                    </li>
                </ul>
                <button type="submit">SAVE CHANGES</button>
            </form>
        </section>

        <section id="addproduct">
            <h1>Search / Add Product</h1>
            <!-- Same idea as vendor; hybrid text / search? -->
            <label for="select_prod"></label>
            <select name="select_prod" id="select_prod">
                <option selected="selected">Select product...</option>
                <!-- PHP here to loop through product name list and populate with options -->
                <?php
                    // error_reporting(E_ALL);
                    // ini_set('display_errors', 1); 
                    // $conn = OpenCon();
                    // $sql = "select * from Vendor;";
                    // $result = $conn->query($sql);
                    // if ($result->num_rows > 0) {
                    //     while($row = $result->fetch_assoc() ) {
                    //     echo '<option value=' . $row['VendorName'] . '>' . $row['VendorName']. '</option>';
                    //     }
                    // }
                    // $result->free();
                    // CloseCon($conn);                    
                ?>
            </select>
            <!-- Need php page for product insert -->
            <form action="php/Product_Insert.php" method="POST">
                <ul>
                    <li>
                        <label for="addProdName">Product Name</label>
                        <input type="text" name="productName" id="addProdName">
                    </li>
                    <li>
                        <label for="addProdNotes">Product Notes</label>
                        <textarea name="productNotes" id="addProdNotes" cols="30" rows="10"></textarea>
                    </li>
                </ul>
                <button type="submit">SAVE CHANGES</button>
            </form>
        </section>

        <section id="adddept">
            <h1>Search / Add Department</h1>
            <!-- Same idea as vendor; hybrid text / search? -->
            <label for="select_dept"></label>
            <select name="select_dept" id="select_dept">
                <option selected="selected">Select department...</option>
                <!-- PHP here to loop through department name list and populate with options -->
                <?php
                    // error_reporting(E_ALL);
                    // ini_set('display_errors', 1); 
                    // $conn = OpenCon();
                    // $sql = "select * from Vendor;";
                    // $result = $conn->query($sql);
                    // if ($result->num_rows > 0) {
                    //     while($row = $result->fetch_assoc() ) {
                    //     echo '<option value=' . $row['VendorName'] . '>' . $row['VendorName']. '</option>';
                    //     }
                    // }
                    // $result->free();
                    // CloseCon($conn);                    
                ?>

            </select>
            <!-- Need php page for action to dept insert -->
            <form action="php/Department_Insert.php" method="POST">
                <ul>
                    <li>
                        <label for="addDeptName">Department Name</label>
                        <input type="text" name="departmentName" id="addDeptName">
                    </li>
                    <li>
                        <label for="addDeptNotes">Department Notes</label>
                        <textarea name="departmentNotes" id="addDeptNotes" cols="30" rows="10"></textarea>
                    </li>
                </ul>
                <button type="submit">SAVE CHANGES</button>
            </form>
        </section>

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
            <label for="select_peop"></label>
            <select name="select_peop" id="select_peop">
                <option selected="selected">Select person...</option>
                <!-- PHP here to loop through people name list and populate with options -->
                <?php
                    // error_reporting(E_ALL);
                    // ini_set('display_errors', 1); 
                    // $conn = OpenCon();
                    // $sql = "select * from Vendor;";
                    // $result = $conn->query($sql);
                    // if ($result->num_rows > 0) {
                    //     while($row = $result->fetch_assoc() ) {
                    //     echo '<option value=' . $row['VendorName'] . '>' . $row['VendorName']. '</option>';
                    //     }
                    // }
                    // $result->free();
                    // CloseCon($conn);                    
                ?>
            </select>
            <!-- Need php page for action to people insert -->
            <form action="php/Staff_Insert.php" method="POST">
                <ul>
                    <li>
                        <label for="addFirstName">First Name</label>
                        <input type="text" name="firstName" id="addFirstName">
                    </li>
                    <li>
                        <label for="addLastName">Last Name</label>
                        <input type="text" name="lastName" id="addLastName">
                    </li>
                    <li>
                        <label for="addUVID">UVID</label>
                        <input type="text" name="uvid" id="addUVID">
                    </li>
                    <li>
                        <label for="addEmail">Email</label>
                        <input type="text" name="email" id="addEmail">
                    </li>
                    <li>
                        <label for="addBuilding">Building</label>
                        <input type="text" name="building" id="addBuilding">
                    </li>
                    <li>
                        <label for="addOffice">Office</label>
                        <input type="text" name="office" id="addOffice">
                    </li>
                    <li>
                        <label for="addDepartment">Department</label>
                        <input type="text" name="department" id="addDepartment">
                    </li>
                    <li>
                        <label for="addPhoneExt">Phone Ext.</label>
                        <input type="text" name="phoneExt" id="addPhoneExt">
                    </li>
                </ul>
                <button type="submit">SAVE CHANGES</button>
            </form>
        </section>

    </section>    
</main>

<?php include 'view/footer.php'; ?>