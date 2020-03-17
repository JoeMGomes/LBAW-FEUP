<title>Sign up</title>
<?php

include_once('tpl_common.php');

drawHTMLHeader();
?>

<body class="bg-mydark text-center">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <form class="form-container p-3 rounded col-lg-4 col-7 bg-white my-auto">
            <a href="mainPage.php">
                <img src="assets/logo2.png" class="register-logo my-3 " width="100px" alt="Company Logo">
            </a>
            <h3 class="mb-3 text-mydarkgreen">Sign up</h3>
            <div class="form-group">
                <label class="float-left" for="inputEmail">e-mail</label>
                <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
            </div>
            <div class="form-group">
                <label class="float-left" for="inputUsername">name</label>
                <input type="text" id="inputUsername" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="float-left" for="pass">password</label>
                <input type="password" id="pass" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="float-left" for="confirmPass">confirm password</label>
                <input type="password" id="confirmPass" class="form-control" required>
            </div>
            <button class="mb-4 btn btn-dark" type="submit">Sign up</button>
            <div>
                <small class="justify-content-center">
                    Already have an account?
                    <a class="text-mydarkblue text-darkblueh" href="signupPage.php">Log in</a>
                </small>
            </div>
        </form>
    </div>
</body>