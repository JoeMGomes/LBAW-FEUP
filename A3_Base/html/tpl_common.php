<?php 

function drawHTMlHeader(){ ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/customStyles.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:600&display=swap" rel="stylesheet">
    <script src="js/bootstrap.min.js" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>GROW</title>
</head>

<?php }

?>

<?php

function drawSearchBarMain($value)
{
?>

    <form action="searchPage.php" class="form input-group my-md-0 py-3">

        <input id="search" value="" class="form-control w-50 rounded-pill border-dark border-3 ml-2" type="text" placeholder="How do I do my taxes">
        <div class="input-group-append">
            <button class="btn" type="submit">
                <i class="fa fa-search fa-lg"></i>
            </button>
        </div>

    </form>
<?php } 

function drawNavBarTop($value) { 
    if (!isset($value)) {
        $value = "";   
    }
?>

        <div class="ml-md-auto col-md-10 text-left mr-lg-0">
            <?php drawSearchBarMain($value) ?>
        </div>
<?php }



function drawNavBar($logged){
    
    ?>

<nav class="position-fixed col-md-2 col-lg-2 d-none d-md-flex flex-column  justify-content-between  bg-dark sidebar h-100">
        <div class="sidebar-header text-center text-white mt-5">
            <img src="assets/logo.png" class="register-logo" alt="" onclick="document.location='mainPage.php'">
            <ul class="mt-5 list-unstyled sidebar-sticky">
                <li class="my-3"><a class="text-white w-100" href="questionForm.php">Post a Question</a></li>
                <li class="my-3"><a class="text-white w-100" href="">Categories</a></li>
                <li class="my-3"><a class="text-white w-100" href="">About</a></li>
            </ul>
        </div>

<?php 
    if ($logged) { ?>
            <div class="d-flex flex-column mb-5 align-items-center">
                <img src="assets/david.jpg" class="rounded-img " alt="">
                <h5 class="pt-2 text-white">David Dinis</h5>
                <span class="text-white">2309 points</span>
                <ul class="list-unstyled d-flex flex-column align-items-center my-5">
                    <li><a class="text-white" href="activityPage.php">View Activity</a></li>
                    <li><a class="text-white" href="">Notifications</a></li>
                    <li><a class="text-white" href="settingsPage.php">Settings</a></li>
                </ul>
                <button class="btn btn-secondary" onclick="document.location='mainPage.php'">Sign out</button>
            </div>
        </nav>

<?php
    } else { ?>
        <div class="mb-5 nav flex-column">
            <button onclick="document.location='signupPage.php'" class="btn btn-light mb-2">Sign up</button>
            <button onclick="document.location='loginPage.php'" class="btn btn-secondary">Log in</button>
        </div>
    </nav>

<?php } } ?>