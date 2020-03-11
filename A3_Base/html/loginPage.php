<?php

include_once('tpl_common.php');

drawHTMlHeader();
?>

<body class="bg-dark text-center">
    
    <img class="mb-4 register-logo pt-5" src="assets/logo.png" alt="">
    <section class="container-fluid">
        <section class="row justify-content-center">
            <form class="form-container">
                <h3 class="mb-3 font-weight-bold text-myblue">Log in</h3>
                <div class="form-group">
                    <label class="float-left" for="inputEmail">e-mail</label>
                    <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label class="float-left" for="inputPassword ">password</label>
                    <input type="password" id="inputPassword" class="form-control" required="">
                </div>
                <button class="mb-4 btn btn-primary border-0 bg-myblue" type="submit">Log in</button>
                <div>
                    <small class="justify-content-center">
                        Don't have an account?
                        <button class="btn btn-primary btn-sm border-0 bg-myred" type="submit">Sign up</button>
                    </small>
                </div>
            </form>
        </section>
    </section>

</body>