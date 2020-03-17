<title>Log in</title>
<?php

include_once('tpl_common.php');

drawHTMLHeader();

?>

<body class="bg-mydark text-center">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <form class="form-container p-3 rounded bg-white my-auto col-lg-4 col-7">
                <a href="mainPage.php">
                    <img src="assets/logo2.png" class="register-logo my-3 " tabindex="1" width="100px" alt="Company Logo">
                </a>
                <h3 class="mb-3 text-mydarkblue">Log in</h3>
                <div class="form-group">
                    <label class="float-left" for="inputEmail">e-mail</label>
                    <input type="email" id="inputEmail" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label class="float-left" for="inputPassword">password</label>
                    <input type="password" id="inputPassword" class="form-control" required="">
                </div>
                <button class="mb-4 btn btn-dark" type="submit">Log in</button>
                <div>
                    <small class="justify-content-center">
                        Don't have an account?
                        <a class="text-mydarkgreen text-darkgreenh" href="signupPage.php">Sign up</a>
                    </small>
                </div>
            </form>
        </div>
</body>