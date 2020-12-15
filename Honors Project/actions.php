<?php include 'view/header.php'; ?>

<main>
    <section id="actions">
        <form action="" method="GET" id="selectform">
            <label for="siteactions">Actions</label>
            <select name="siteactions" id="siteactions">
                <option selected="selected">Select an action...</option>
                <option value="addvendor">Vendor Search / Add Vendor</option>
                <option value="removevendor">Remove Vendor</option>
                <option value="addprod">Add Product</option>
                <option value="updateprod">Update Product Details</option>
                <option value="removeprod">Remove Product</option>
                <option value="reports">Run Reports</option>
            </select><br>
            <button type="submit">GO</button>
        </form>
    </section>
</main>

<?php include 'view/footer.php'; ?>