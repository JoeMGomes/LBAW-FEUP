<title>Settings</title>
<?php

include_once('tpl_common.php');

drawHTMlHeader();
?>


<body class="container-fluid vh-100 m-0 p-0">
    <?php
    drawNavBar(true);
    drawNavBarTop("");
    ?>
    <main id="main" class="ml-lg-auto col-lg-10 align-right ">
        <h1 class=" py-2 px-4"> Settings</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <form class="px-5">
                        <h5 class="">Change password </h5>
                        <div class="form-group">
                            <label class="" for="inputEmail">current password</label>
                            <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label class="float-left" for="inputPassword ">new password</label>
                            <input type="password" id="inputPassword" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="float-left" for="inputPassword ">confirm new password</label>
                            <input type="password" id="inputPassword" class="form-control" required="">
                        </div>
                        <button class="mb-4 btn btn-primary border-0 tag-green float-right" type="submit">Confirm
                            Changes</button>
                    </form>
                </div>
                <div class="col-md-5">
                    <form class="px-5">
                        <h5 class="">Change username</h5>
                        <div class="form-group">
                            <label class="" for="inputEmail">current username</label>
                            <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label class="float-left" for="inputPassword ">new username</label>
                            <input type="password" id="inputPassword" class="form-control" required="">
                        </div>
                        <button class="mb-4 btn btn-primary border-0 tag-green float-right" type="submit">Confirm
                            Changes</button>
                    </form>
                </div>

            </div>
            <div class="row">
                <div class="col-md-5">
                    <form class="px-5">
                        <h5 class="">Change e-mail </h5>
                        <div class="form-group">
                            <label class="" for="inputEmail">current username</label>
                            <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label class="float-left" for="inputPassword ">new username</label>
                            <input type="password" id="inputPassword" class="form-control" required="">
                        </div>
                        <button class="mb-4 btn btn-primary border-0 tag-green float-right" type="submit">Confirm
                            Changes</button>
                    </form>
                </div>
                <div class="col-md-5">
                    <h5> Change picture </h5>
                    <form class="md-form ">
                        <div class="file-field ">
                            <div class="mb-4 d-md-flex">
                                <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="rounded-circle z-depth-1-half avatar-pic " width=80px height="80px" alt="example placeholder avatar">
                                <div class="mt-2 ml-2 d-md-flex flex-column">
                                    <span>Add photo</span>
                                    <input class="mb-5" type="file">
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>