<?php include 'view/header.php'; ?>

<main>
    <section id="mainform">
        <div id="formwrapper">
        <h1>Data Element Form</h1>
        <p>Choose an element to edit/update, or fill in the form to add a new element.</p>
        <select name="dataElement" id="dataElement">
            <option value="select">Select element...</option>
        </select>
            <form action="php/Mainform_Submit.php" method="POST" id="fullform">                
                <!-- Going to look into making first four hybrid input text / search
                with a built in autocomplete.  It will be the cleanest way to make 
                this page work, and reduce overall page count on the site. -->
                <ul>
                    <li>
                        <label for="">Vendor</label>
                        <input type="text" name="vendorName" id="vendorName" placeholder="Hyland">
                    </li>
                    <li>
                        <label for="">Product</label>
                        <input type="text" name="productName" id="productName" placeholder="Brainware">
                    </li>
                    <li>
                        <label for="">Department</label>
                        <input type="text" name="departmentName" id="departmentName" placeholder="Transfer Credit">
                    </li>
                    <li>
                        <label for="">Approval First Name</label>
                        <input type="text" name="staffFName" id="staffFName" placeholder="Eric">
                    </li>
                    <li>
                        <label for="">Approval Last Name</label>
                        <input type="text" name="staffLName" id="staffLName" placeholder="Humphrey">
                    </li>
                    <li>
                        <label for="">Date Approved</label>
                        <input type="date" name="dateApproved" id="dateApproved" placeholder="11/19/2019">
                    </li>
                    <li>
                        <label for="">Expiration Date</label>
                        <input type="date" name="dateExpired" id="dateExpired" placeholder="11/19/2021">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="">Data Type</label>
                        <input type="text" name="dataType" id="dataType" placeholder="SSN">
                    </li>
                    <li>
                        <label for="">Data Format</label>
                        <input type="text" name="dataFormat" id="dataFormat" placeholder="####">
                    </li>
                    <li>
                        <!--<label for="">Location of Source Data</label>
                        <input type="text" name="" id="" placeholder="Banner / XXYY / SSN"> -->
                        <label for="">Location of Source Database</label>
                        <input type="text" name="sourceDB" id="sourceDB" placeholder="Banner">
                    </li>
                    <li>
                        <label for="">Location of Source Table</label>
                        <input type="text" name="sourceTable" id="sourceTable" placeholder="XXYY">
                    </li>
                    <li>
                        <label for="">Location of Source Field</label>
                        <input type="text" name="sourceField" id="sourceField" placeholder="SSN/DOB/etc">
                    </li>    
                    <li>
                        <label for="">Data Description</label>
                        <textarea name="dataDescription" id="dataDescription" cols="30" rows="3" placeholder="e.g. Last four digist of Social Security number"></textarea>
                    </li>                           
                </ul>
                <h3>Notes</h3>
                <div id="notesbtn">
                    <button type="button" class="notebtnactive" id="oitnotes">OIT</button>
                    <button type="button" class="" id="approvenotes">Approver</button>
                    <button type="button" class="" id="deptnotes">Department</button>
                </div>
                <div id="mainNotes">
                    <div id="it-notes"><textarea name="itNotes" id="itNotes" cols="30" rows="4"></textarea></div>
                    <div id="approve-notes"><textarea name="approveNotes" id="approveNotes" cols="30" rows="4"></textarea></div>
                    <div id="dept-notes"><textarea name="deptNotes" id="deptNotes" cols="30" rows="4"></textarea></div> 
                </div>
                <button type="submit">SAVE CHANGES</button>
            </form>                
        </div>
    </section>
</main>

<?php include 'view/footer.php'; ?>