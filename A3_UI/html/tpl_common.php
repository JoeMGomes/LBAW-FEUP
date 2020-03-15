<?php

function drawHTMlHeader()
{ ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/customStyles.css">
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:600,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet"> 
        <link rel="shortcut icon" type="image/x-icon" href="assets/logo2.png" />
        <title>GROW</title>

        <!-- Javascript -->
        <script src="js/bootstrap.min.js" defer></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/scripts.js"></script>


    <?php }

    ?>

    <?php

    function drawSearchBarMain($value)
    {
    ?>

        <form action="searchPage.php" class="form input-group my-md-0 py-3">

            <input id="search" value="" class="form-control w-50 rounded border-dark border-3 ml-2" type="text" placeholder="How do I do my taxes">
            <div class="input-group-append">
                <button class="btn" type="submit">
                    <i class="fa fa-search fa-lg"></i>
                </button>
            </div>

        </form>
    <?php }

    function drawNavBarTop($value)
    {
        if (!isset($value)) {
            $value = "";
        }
    ?>

        <div class="ml-md-auto col-md-10 text-left mr-lg-0">
            <?php drawSearchBarMain($value) ?>
        </div>
    <?php }



    function drawNavBar($logged)
    {

    ?>
        <a class="btn btn-primary btn-customized bg-dark open-menu d-lg-none" href="#" role="button">
            <i class="fa fa-align-left"></i> <span>Menu</span>
        </a>

        <nav class="sidebar-lg d-none d-lg-block col-lg-2 ">
            <div class=" h-100 text-center text-white mt-5 d-flex flex-column align-items-center justify-content-between">
                <div>
                    <img src="assets/logo.png" class="register-logo" width="100px" alt="" onclick="document.location='mainPage.php'">
                    <ul class="mt-5 list-unstyled " style="line-height: 6px;">
                        <li><a class="text-white w-100" href="#">About</a></li>
                        <li><a class="text-white w-100" href="questionForm.php">Post a Question</a></li>
                        <li>
                            <a href="#otherSections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections">
                                Categories
                            </a>
                            <ul class="collapse list-unstyled" id="otherSections">
                                <li><a class="scroll-link" href="">Laundry</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php
                if ($logged) { ?>
                    <div class="d-flex flex-column mb-5 align-items-center w-100">
                        <img src="assets/david.jpg" class="rounded-img " alt="">
                        <h5 class="pt-2 text-white">David Dinis</h5>
                        <span class="text-white">2309 points</span>
                        <ul class="list-unstyled d-flex flex-column align-items-center my-5">
                            <li><a class="text-white" href="activityPage.php">View Activity</a></li>
                            <li><a class="text-white" href="">Notifications</a></li>
                            <li><a class="text-white" href="settingsPage.php">Settings</a></li>
                        </ul>
                        <button class="btn btn-secondary mb-5 w-100" onclick="document.location='mainPage.php'">Sign out</button>
                    </div>
            </div>
        </nav>
    <?php
                } else { ?>
        <div class="pb-5 nav flex-column w-100">
            <button onclick="document.location='signupPage.php'" class="btn btn-light mb-2">Sign up</button>
            <button onclick="document.location='loginPage.php'" class="btn btn-secondary mb-5">Log in</button>
        </div>

        </div>
        </nav>
        <div class="overlay d-lg-none"></div>
    <?php } ?>

    <nav class="sidebar d-lg-none">

        <div class="dismiss">
            <i class="fa fa-arrow-left"></i>
        </div>

        <div class="sidebar-header text-center text-white mt-5">
            <div>
                <img src="assets/logo.png" class="register-logo" width="100px" alt="">
                <ul class="mt-5 list-unstyled sidebar-sticky " style="line-height: 6px;">
                    <li><a class="text-white w-100" href="#">About</a></li>
                    <li><a class="text-white w-100" href="questionForm.php">Post a Question</a></li>
                    <li>
                        <a href="#otherSections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections">
                            Categories
                        </a>
                        <ul class="collapse list-unstyled" id="otherSections">
                            <li>
                                <a class="scroll-link" href="#section-3">Our projects</a>
                            </li>
                            <li>
                                <a class="scroll-link" href="#section-4">We think that...</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="to-top">
            <a class="btn btn-primary btn-customized-3" href="#" role="button">
                <i class="fa fa-arrow-up"></i> Top
            </a>
        </div>

    </nav>
    <!-- End sidebar -->

<?php } ?>