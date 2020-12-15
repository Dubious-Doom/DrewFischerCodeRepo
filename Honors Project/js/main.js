// ######## additems button functionality ######## \\
$("#vendbtn").click(function(){
    let $vend = $("#addvendor");
    let $prod = $("#addproduct");
    let $dept = $("#adddept");
    let $peop = $("#addpeople");

    if($vend.css("display") == "none"){
        if($prod.css("display") == "block"){
            $prod.fadeOut(155);
        }else if ($dept.css("display") == "block"){
            $dept.fadeOut(155);
        }else if ($peop.css("display") == "block"){
            $peop.fadeOut(155);
        }
        $vend.delay(155).fadeIn(155);
    }
})

$("#prodbtn").click(function(){
    let $vend = $("#addvendor");
    let $prod = $("#addproduct");
    let $dept = $("#adddept");
    let $peop = $("#addpeople");

    if($prod.css("display") == "none"){
        if($vend.css("display") == "block"){
            $vend.fadeOut(155);
        }else if ($dept.css("display") == "block"){
            $dept.fadeOut(155);
        }else if ($peop.css("display") == "block"){
            $peop.fadeOut(155);
        }
        $prod.delay(155).fadeIn(155);
    }
})

$("#deptbtn").click(function(){
    let $vend = $("#addvendor");
    let $prod = $("#addproduct");
    let $dept = $("#adddept");
    let $peop = $("#addpeople");

    if($dept.css("display") == "none"){
        if($vend.css("display") == "block"){
            $vend.fadeOut(155);
        }else if ($prod.css("display") == "block"){
            $prod.fadeOut(155);
        }else if ($peop.css("display") == "block"){
            $peop.fadeOut(155);
        }
        $dept.delay(155).fadeIn(155);
    }
})

$("#peopbtn").click(function(){
    let $vend = $("#addvendor");
    let $prod = $("#addproduct");
    let $dept = $("#adddept");
    let $peop = $("#addpeople");

    if($peop.css("display") == "none"){
        if($vend.css("display") == "block"){
            $vend.fadeOut(155);
        }else if ($prod.css("display") == "block"){
            $prod.fadeOut(155);
        }else if ($dept.css("display") == "block"){
            $dept.fadeOut(155);
        }
        $peop.delay(155).fadeIn(155);
    }
})

$("#venddelbtn").click(function(){
    let del = confirm("Action will permanently delete this entry.  Are you sure?");
    if (del == true){
        $("#vendorform").attr('action', 'php/Vendor_Delete.php');
        $("#vendorform").submit();
    }
})

$("#proddelbtn").click(function(){
    let del = confirm("Action will permanently delete this entry.  Are you sure?");
    if (del == true){
        $("#productform").attr('action', 'php/Product_Delete.php');
        $("#productform").submit();
    }
})

$("#deptdelbtn").click(function(){
    let del = confirm("Action will permanently delete this entry.  Are you sure?");
    if (del == true){
        $("#departmentform").attr('action', 'php/Department_Delete.php');
        $("#departmentform").submit();
    }
})

$("#staffdelbtn").click(function(){
    let del = confirm("Action will permanently delete this entry.  Are you sure?");
    if (del == true){
        $("#staffform").attr('action', 'php/Staff_Delete.php');
        $("#staffform").submit();
    }
})
// ############################################### \\

// ##### mainform note button functionality ##### \\
$("#oitnotes").click(function(){
    let $it = $("#it-notes");
    let $app = $("#approve-notes");
    let $dep = $("#dept-notes");

    if($it.css("display") == "none"){
        if($app.css("display") == "block"){
            // $app.fadeOut(150);
            $app.toggle();
            $("#approvenotes").toggleClass("notebtnactive");
        }else if($dep.css("display") == "block"){
            // $dep.fadeOut(150);
            $dep.toggle();
            $("#deptnotes").toggleClass("notebtnactive");
        }
        // $it.delay(150).fadeIn(150);
        $it.toggle();
        $("#oitnotes").toggleClass("notebtnactive");
    }
})

$("#approvenotes").click(function(){
    let $it = $("#it-notes");
    let $app = $("#approve-notes");
    let $dep = $("#dept-notes");

    if($app.css("display") == "none"){
        if($it.css("display") == "block"){
            // $it.fadeOut(150);
            $it.toggle();
            $("#oitnotes").toggleClass("notebtnactive");
        }else if($dep.css("display") == "block"){
            // $dep.fadeOut(150);
            $dep.toggle();
            $("#deptnotes").toggleClass("notebtnactive");
        }
        // $app.delay(150).fadeIn(150);
        $app.toggle();
        $("#approvenotes").toggleClass("notebtnactive");
    }
})

$("#deptnotes").click(function(){
    let $it = $("#it-notes");
    let $app = $("#approve-notes");
    let $dep = $("#dept-notes");

    if($dep.css("display") == "none"){
        if($it.css("display") == "block"){
            // $it.fadeOut(150);
            $it.toggle();
            $("#oitnotes").toggleClass("notebtnactive");
        }else if($app.css("display") == "block"){
            // $app.fadeOut(150);
            $app.toggle();
            $("#approvenotes").toggleClass("notebtnactive");
        }
        // $dep.delay(150).fadeIn(150);
        $dep.toggle();
        $("#deptnotes").toggleClass("notebtnactive");
    }
})

$("#mainformdel").click(function(){
    let del = confirm("Action will permanently delete this entry.  Are you sure?");
    if (del == true){
        $("#fullform").attr('action', 'php/Mainform_Delete.php');
        $("#fullform").submit();
    }
})
// ############################################## \\

function initMask(form){
    $("#addUVID").mask('00000000');
    $("#addPhoneExt").mask('0000');
}