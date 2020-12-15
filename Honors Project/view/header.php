<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OIT Vendor Tracking</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <header>
        <img src="images/UVUSquareWhite-0003.png" alt="uvu logo" id="uvu logo">
        <div id="headerbuttons">
            <!-- <button type="button" class="linkbtn" id="btn1" onclick="document.location='login.php'">Login</button> -->            
            <button type="button" class="linkbtn" id="btn3" onclick="document.location='mainform.php'">Main Form</button>
            <button type="button" class="linkbtn" id="btn2" onclick="document.location='reports.php'">Reports</button>            
            <div class="dropdown">
                <button type="button" class="linkbtn" id="btn4">Add Data&nbsp;<i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                <div class="dropdown-content">
                    <a href="addvendor.php">Add Vendor</a>
                    <a href="addproduct.php">Add Product</a>
                    <a href="adddepartment.php">Add Department</a>
                    <a href="addpeople.php">Add People</a>
                </div>
            </div>
        </div>
    </header>