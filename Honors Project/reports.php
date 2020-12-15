<?php 
include 'view/header.php';
include 'php/db_connection.php'; 
session_start();
error_reporting(0);

$order = htmlspecialchars($_GET['order']);
$product = htmlspecialchars($_GET['product']);
$staff = htmlspecialchars($_GET['staff']);
$department = htmlspecialchars($_GET['department']);
$ascdesc = htmlspecialchars($_GET['ascdesc']);
?>

<main>
    <section id="reports">
        <h1>Report Table</h1>
        <form action="reports.php" method="GET">
            <h3>Filter:</h3>
            <!-- <select name="product" id="product" onmousedown="if(this.options.length>8){this.size=8;}" 
            onchange='this.size=0;' onblur="this.size=0;"> -->
            <select name="product" id="product">
                <option selected="selected" value="%">Any product...</option>                    
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
            <!-- <select name="staff" id="staff" onmousedown="if(this.options.length>8){this.size=8;}" 
            onchange='this.size=0;' onblur="this.size=0;"> -->
            <select name="staff" id="staff">
                <option selected="selected" value="%">Any person...</option>                        
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
            <!-- <select name="department" id="department" onmousedown="if(this.options.length>8){this.size=8;}" 
            onchange='this.size=0;' onblur="this.size=0;"> -->
            <select name="department" id="department">
                <option selected="selected" value="%">Any department...</option>                        
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
            <h3>Sort by:</h3>
            <!-- <select name="order" id="order" onmousedown="if(this.options.length>8){this.size=8;}" 
            onchange='this.size=0;' onblur="this.size=0;"> -->
            <select name="order" id="order">
                <option selected="selected" value="ID">ID</option>
                <option value="StaffName">Staff</option>
                <option value="ProductName">Product</option>
                <option value="DepartmentName">Department</option>
                <option value="Source">Source</option>
                <option value="ApprovalDate">Approval Date</option>
                <option value="ExpirationDate">Expiration Date</option>
            </select>                      
            <label for="asc">Ascending</label>
            <input type="radio" id="asc" name="ascdesc" value="asc" checked>
            <label for="desc">Descending</label>
            <input type="radio" id="desc" name="ascdesc" value="desc"><br>
            <button type="submit">GO</button>
        </form>

        <div id="tablewrapper">            
            <table id="reporttable">
                <tr>
                    <th class="autowide">ID</th>
                    <th class="autowide">DEName</th>
                    <th class="autowide">Staff</th>
                    <th class="autowide">Product</th>
                    <th class="autowide">Department</th>
                    <th class="autowide">Format</th>
                    <th class="autowide">Source</th>
                    <th class="autowide">Description</th>
                    <th class="autowide">Approval Date</th>
                    <th class="autowide">Expiration Date</th>
                    <th class="autowide">IT Notes</th>
                    <th class="autowide">Approver Notes</th>
                    <th class="autowide">Department Notes</th>
                </tr>
                <?php
                    error_reporting(0);
                    ini_set('display_errors', 1); 
                    $conn = OpenCon();
                    $sql = "select 
                    de.DEID as ID,
                    de.DEName as DEName,
                    concat(s.StaffFName, ' ', s.StaffLName) as StaffName, 
                    p.ProductName as ProductName, 
                    d.DepartmentName as DepartmentName,
                    f.FormatType as Format,
                    concat(sf.SFName, '/', st.STName, '/', sdb.SDBName) as Source,
                    de.DEDescription as Description,
                    de.DEApprovalDate as ApprovalDate, 
                    de.DEExpirationDate as ExpirationDate,
                    de.DEITNotes as ITNotes,
                    de.DEApproverNotes as ApproverNotes,
                    de.DEDepartmentNotes as DepartmentNotes
                    from DataElement de 
                    join Product p on de.ProductID = p.ProductID
                    join Staff s on de.StaffID = s.StaffID
                    join Department d on de.DepartmentID = d.DepartmentID
                    join Format f on de.FormatID = f.FormatID
                    join SourceField sf on de.SFID = sf.SFID
                    join SourceTable st on de.STID = st.STID
                    join SourceDB sdb on de.SDBID = sdb.SDBID
                    where p.ProductID like '$product'
                    and s.StaffID like '$staff'
                    and d.DepartmentID like '$department'
                    order by $order $ascdesc;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc() ) {
                        echo '<tr>' .
                        '<td class="autowide">' . $row['ID'] . '</td>' . 
                        '<td class="autowide">' . $row['DEName'] . '</td>' .
                        '<td class="autowide">' . $row['StaffName'] . '</td>' .
                        '<td class="autowide">' . $row['ProductName'] . '</td>' .
                        '<td class="autowide">' . $row['DepartmentName'] . '</td>' .
                        '<td class="autowide">' . $row['Format'] . '</td>' .
                        '<td class="autowide">' . $row['Source'] . '</td>' .
                        '<td class="autowide">' . $row['Description'] . '</td>' .
                        '<td class="autowide">' . $row['ApprovalDate'] . '</td>' .
                        '<td class="autowide">' . $row['ExpirationDate'] . '</td>' .
                        '<td class="autowide">' . $row['ITNotes'] . '</td>' .
                        '<td class="autowide">' . $row['ApproverNotes'] . '</td>' .
                        '<td class="autowide">' . $row['DepartmentNotes'] . '</td>' .
                        '</tr>';
                        }
                    }
                    $result->free();
                    CloseCon($conn);
                ?>
            </table>
        </div>
    </section>
</main>

<?php include 'view/footer.php'; ?>