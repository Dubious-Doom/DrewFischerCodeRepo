<?php include 'view/header.php'; ?>

<main>
    <section id="login">
        <form action="" method="POST" id="loginform">
            <ul>
                <li>
                    <label for="uvidlogin">UVID</label>
                    <input type="text" name="uvidlogin" id="uvidlogin">
                </li>
                <li>
                    <label for="uvpass">Password</label>
                    <input type="password" name="uvpass" id="uvpass">
                </li>
                <li>
                    <button type="submit">LOG IN</button>
                </li>
            </ul>
        </form>   
    </section>
</main>

<?php include 'view/footer.php'; ?>