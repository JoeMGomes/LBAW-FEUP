<?php
include_once('pop-ups.php');
function drawHTMLHeader()
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scripts.js" defer></script>


    <?php }

    function drawMenuBtn()
    {
    ?>

    <a class="btn btn-primary btn-customized text-nowrap bg-dark open-menu d-lg-none" href="#" role="button">
        <i class="fa fa-align-left" alt="Menu"></i> <span class="d-none d-md-inline">Menu</span>
    </a>

    <?php

    } 
    
    function drawMenuBtnMainPage()
    {
    ?>
    <div class="d-lg-none" style="position:fixed; z-index: 900; top: 1.5rem; left: 1.5rem">
        <?php drawMenuBtn() ?>
    </div>
    <?php }

    function drawSearchBarMain($value)
    {
    ?>

    <form action="searchPage.php" class="form input-group mb-0">

        <input id="search" value="" class="form-control rounded border-dark border-3 ml-3" type="text"
            placeholder="How do I do my taxes">
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

    <div class=" ml-lg-auto col-lg-10 py-3 text-left d-lg-block d-flex">
        <?php
            drawMenuBtn();
            drawSearchBarMain($value) ?>
    </div>
    <?php }



    function drawNavBar($logged)
    {

    ?>


    <nav class="sidebar-lg d-none d-lg-block col-lg-2 ">
        <div
            class="h-100 mh-100 text-center text-white d-flex flex-column align-items-center justify-content-between flex-shrink-0">
            <div class="mh-50">
                <a href="mainPage.php">
                    <img src="assets/logo.png" class="register-logo mb-5" width="100px" alt="Company Logo">
                </a>
                <a class="w-100 bg-myyellow bg-myyellowh btn rounded large mb-3 text-nowrap px-1"
                    style="font-weight: 700; font-size: 1.2em;" href="questionForm.php">Post a Question</a>
                <div class="bg-dark w-100 rounded py-2 overflow-hidden mb-3">
                    <a href="#categories" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle m-5 text-white bg-transparent">Categories</a>
                    <ul class="collapse list-unstyled bg-transparent " id="categories">
                        <hr class="my-1 m-0 " style="height: 2px; background-color: #2c2c2c">
                        <li><a class="scroll-link text-white" class="" href="">Laundry</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Cooking</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Health</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Sexuality</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Finances</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Work</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Relationships</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Household</a></li>
                    </ul>
                </div>
            </div>
            <?php
                if ($logged) { // beginning of logged in
                ?>
            <div class="d-flex flex-column pb-3 align-items-center w-100">
                <img src="assets/david.jpg" class="rounded-img " alt="">
                <!-- <h5 class="pt-2 text-white">ADMINISTRATOR</h5> -->
                 <h5 class="pt-2 text-white">David Dinis</h5>
                <span class="text-white">2309 points</span>
                <ul class="list-unstyled d-flex flex-column align-items-center mt-5 mb-3">
                    <li><a class="text-white" href="activityPage.php">View Activity</a></li>
                    <li><a class="notifications-buttom btn"
                            onclick="open_notifications()">Notifications</a><?php drawNotificationPopUp();?>
                    </li>
                    <!-- <li><a class="text-white" href="adminCatMan.php">New Category</a></li> -->
                    <!-- <li><a class="text-white" href="adminRepMan.php">Manage Reports</a></li> -->
                    <li><a class="text-white" href="settingsPage.php">Settings</a></li>
                </ul>
                <button class="btn btn-secondary mb-3 w-100" onclick="document.location='mainPage.php'">Sign
                    out</button>
                <a class="small text-white" href="">About</a>
            </div>

            <?php } // end of logged in 
                else { // beginning of sign up and log in
                ?>
            <div class=" pb-3 nav flex-column w-100">
                <a class="w-100  btn btn-light mb-2" href="signupPage.php">Sign up</a>
                <a class="btn btn-secondary mb-5" href="loginPage.php">Log in</a>
                <a class="small text-white" href="aboutPage.php">About</a>
            </div>


            <?php } // end of login and sign up
                ?>
        </div>
    </nav>



    <!-----------------
           MOBILE VERSION 
        ------------------->


    <div class="overlay d-lg-none"></div>

    <nav class="sidebar d-lg-none d-flex flex-column justify-content-between align-items-center">
        <div class="fixed-box d-flex flex-column align-items-center justify-content-center">
            <a class="fixed-btn dismiss d-flex flex-column justify-content-center align-items-center p-0" href="#">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-light text-dark btn-customized-3 fixed-btn d-flex flex-column justify-content-center align-items-center p-0"
                href="#" role="button" style="position:relative;top:10px">
                <i class="fa fa-arrow-up "></i>
            </a>
        </div>
        <div class="sidebar-header text-center text-white ">
            <div>
                <a href="mainPage.php">
                    <img src="assets/logo.png" class="register-logo mb-4" width="100px" alt="Company Logo">
                </a>

                <a class="w-100 bg-myyellow btn rounded large mb-3 text-nowrap px-1"
                    style="font-weight: 700; font-size: 1.2em;" href="questionForm.php">Post a Question</a>
                <div class="bg-dark rounded py-2 overflow-auto mb-3" style="max-height: 150px">
                    <a href="#categories" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle my-5 text-white bg-transparent">Categories</a>
                    <ul class="collapse list-unstyled bg-transparent m-0 " id="categories">
                        <hr class="my-1 m-0 " style="height: 2px; background-color: #2c2c2c">
                        <li><a class="scroll-link text-white" class="" href="">Laundry</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Cooking</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Health</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Sexuality</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Finances</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Work</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Relationships</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Household</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
                if ($logged) { // beginning of logged in
                ?>
        <div class="w-100 text-center d-flex flex-column align-items-center">
            <div class="d-flex flex-column align-items-center w-100">
                <img src="assets/david.jpg" class="rounded-img " alt="">
                <h5 class="pt-2 text-white">David Dinis</h5>
                <span class="text-white">2309 points</span>
                <ul class="list-unstyled d-flex flex-column align-items-center mt-3 mb-3">
                    <li><a class="text-white" href="activityPage.php">View Activity</a></li>
                    <li><a class="notifications-buttom"
                            onclick="open_notifications()">Notifications</a><?php drawNotificationPopUpMobile();?>
                    </li>
                    <li><a class="text-white" href="settingsPage.php">Settings</a></li>
                </ul>
                <button class="btn btn-secondary mb-2 w-100" onclick="document.location='mainPage.php'">Sign
                    out</button>
            </div>

            <?php } // end of logged in 
                else { // beginning of sign up and log in
                ?>
            <div class="w-100 text-center d-flex flex-column align-items-center">
                <div class="nav flex-column w-100">
                    <a class="w-100  btn btn-light mb-2" href="signupPage.php">Sign up</a>
                    <a class="btn btn-secondary mb-2" href="loginPage.php">Log in</a>
                </div>


                <?php } // end of login and sign up
                ?>

                <!-- <div class="position-absolute mx-auto d-flex flex-column align-items-middle" style="bottom: 0; "> -->

                <a class="small text-white text-center " href="">About</a>
            </div>


    </nav>

    <!-- End sidebar -->

    <?php } ?>