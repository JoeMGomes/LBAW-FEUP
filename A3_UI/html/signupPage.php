<title>Sign up</title>
<?php

include_once('tpl_common.php');

drawHTMlHeader();
?>

<body class="bg-mydark text-center m-0 p-0">
    
    <section class="container-fluid mb-5">
        <section class="row justify-content-center">
            <form class="mt-5 form-container">
                <img class="mb-4 pt-3 register-logo" src="assets/logo2.png" alt="" onclick="document.location='mainPage.php'">
                <h3 class="mb-3  text-myred">Sign up</h3>
                <div class="form-group">
                    <label class="float-left" for="inputEmail">e-mail</label>
                    <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label class="float-left" for="inputEmail">name</label>
                    <input type="text" id="inputUsername" class="form-control" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label class="float-left" for="inputPassword ">password</label>
                    <input type="password" id="inputPassword" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label class="float-left" for="inputPassword ">confirm password</label>
                    <input type="password" id="inputPassword" class="form-control" required="">
                </div>
                <button class="mb-4 btn btn-primary border-0 bg-myred  text-black" type="submit">Sign up</button>
                <div>
                    <small class="justify-content-center">
                        Already have an account?
                        <button class="btn btn-primary btn-sm border-0 bg-myblue text-black" type="button" onclick="document.location='loginPage.php'">Log in</button>
                    </small>
                </div>
            </form>
        </section>
    </section>

</body>