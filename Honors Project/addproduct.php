<?php include 'view/header.php';
include 'php/db_connection.php';
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);

$productID = $_SESSION['productID'];
$productName = $_SESSION['productName'];
$productNotes = $_SESSION['productNotes'];?>

<main>
    <section id="additems">

        <!-- <div id="addbuttons">
            <button type="button" id="vendbtn">Vendor</button>
            <button type="button" id="prodbtn">Product</button>
            <button type="button" id="deptbtn">Department</button>
            <button type="button" id="peopbtn">People</button>        
        </div> -->

        <section id="addproduct">
            <h1>Search / Add Product</h1>
            <!-- Same idea as vendor; hybrid text / search? -->
            <form action="php/Product_Selection_Submit.php" method="GET">
            <label for="product"></label>
            <!-- <select name="product" id="product" onmousedown="if(this.options.length>8){this.size=8;}" 
                            onchange='this.size=0;' onblur="this.size=0;"> -->
                <select name="product" id="product">
                <option value="0">Select product...</option>
                <!-- PHP here to loop through product name list and populate with options -->
                <?php
                            error_reporting(E_ALL ^ E_NOTICE);
                            ini_set('display_errors', 1);
                            $conn = OpenCon();
                            $sql = "select * from Product;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc() ) {
                                echo '<option value=' . $row['ProductID'] . '>' . $row['ProductName'] . '</option>';
                                }
                            }
                            $result->free();
                            CloseCon($conn); 
                        ?>
            </select>
            <button type="submit">EDIT</button>
            </form>
            <!-- Need php page for product insert -->
            <form action="php/Product_Insert.php" method="POST" id="productform">
                <ul>
                    <li>
                        <!-- <select name="vendorName" id="vendorName" onmousedown="if(this.options.length>8){this.size=8;}" 
                            onchange='this.size=0;' onblur="this.size=0;"> -->
                        <select name="vendorName" id="vendorName" <?php if($productID != '' and $productID != '0'){echo "disabled";}?>>
                        <?php
                            error_reporting(E_ALL ^ E_NOTICE);
                            ini_set('display_errors', 1);
                            $conn = OpenCon();
                            $sql = "select * from Vendor;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc() ) {
                                echo '<option value=' . $row['VendorName'] . '>' . $row['VendorName'] . '</option>';
                                }
                            }
                            $result->free();
                            CloseCon($conn); 
                        ?>
                    </select>
                    </li>
                    <li>
                        <label for="addProdName">* Product Name</label>
                        <input type="text" name="productName" id="addProdName" required value="<?=$productName?>">
                    </li>
                    <li>
                        <label for="addProdNotes">Product Notes</label>
                        <textarea name="productNotes" id="addProdNotes" cols="30" rows="10" value="<?=$productNotes?>"><?=$productNotes?></textarea>
                    </li>
                </ul>
                <input type="hidden" name="productID" value=<?=$productID?>>
                <button type="submit">SAVE</button>
                <button type="button" class="deletebtn" id="proddelbtn">DELETE</button>
            </form>
        </section>

    </section>
</main>

<?php include 'view/footer.php';
session_destroy(); ?>