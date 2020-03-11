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
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <script src="js/bootstrap.min.js" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>GROW</title>
</head>

<?php }

?>

<?php

function drawSearchBarMain()
{
?>

    <form action="" class="form input-group my-md-0 py-3">

        <input id="search" class="form-control w-50 rounded-pill border-dark border-3 ml-2" type="text" placeholder="How do I do my taxes">
        <div class="input-group-append">
            <button class="btn" type="button">
                <i class="fa fa-search fa-lg"></i>
            </button>
        </div>

    </form>
<?php } 

function drawNavBarTop() { ?>

        <div class="ml-md-auto col-md-10 text-left mr-lg-0">
            <?php drawSearchBarMain() ?>
        </div>
<?php }



function drawNavBar(){
    
    ?>

<nav class="position-fixed col-md-2 col-lg-2 d-none d-md-flex flex-column  justify-content-between  bg-dark sidebar h-100">
        <div class="sidebar-header text-center text-white mt-5">
            <img src="assets/logo.png" class="register-logo" alt="">
            <ul class="mt-5 list-unstyled sidebar-sticky">
                <li class="my-3"><a class="text-white w-100" style="line-height: 0px;" href="">Post a Question</a></li>
                <li class="my-3"><a class="text-white w-100" href="">Categories</a></li>
                <li class="my-3"><a class="text-white w-100" href="">About</a></li>
            </ul>
        </div>
        <!-- <div class="d-flex flex-column mb-5 align-items-center">
            <img src="assets/david.jpg" class="rounded-img " alt="">
            <h5 class="pt-2 text-white">David Dinis</h5>
            <span class="text-white">2309 points</span>
            <ul class="list-unstyled d-flex flex-column align-items-center my-5">
                <li><a class="text-white" href="">View Activity</a></li>
                <li><a class="text-white" href="">Notifications</a></li>
                <li><a class="text-white" href="">Settings</a></li>
            </ul>
            <button class="btn btn-secondary">Sign out</button>
        </div> -->
        <div class="mb-5 nav flex-column">
            <button class="btn btn-light mb-2">Sign up</button>
            <button class="btn btn-secondary">Log in</button>
        </div>
    </nav>

<?php } ?>