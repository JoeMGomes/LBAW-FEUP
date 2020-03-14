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
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <title>GROW</title>

        <!-- Javascript -->
        <script src="js/bootstrap.min.js" defer></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/scripts.js"></script>
    </head>

<?php }

?>

<?php

function drawSearchBarMain()
{
?>

    <form action="" class="form input-group my-md-0 py-3">

        <input id="search" class="form-control w-50 rounded border-dark border-3 ml-2" type="text" placeholder="How do I do my taxes">
        <div class="input-group-append">
            <button class="btn" type="button">
                <i class="fa fa-search fa-lg"></i>
            </button>
        </div>

    </form>
<?php }

function drawNavBarTop()
{ ?>


    <div class="ml-md-auto col-md-10 text-left mr-lg-0">
        <?php drawSearchBarMain() ?>
    </div>
<?php }



function drawNavBar()
{

?>
    <a class="btn btn-primary btn-customized bg-dark open-menu d-lg-none" href="#" role="button">
        <i class="fa fa-align-left"></i> <span>Menu</span>
    </a>
    <!-- <nav class="position-fixed col-md-2 col-lg-2 d-none d-md-flex flex-column  justify-content-between  bg-dark sidebar h-100">
        <div class="sidebar-header text-center text-white mt-5">
            <img src="assets/logo.png" class="register-logo" alt="">
            <ul class="mt-5 list-unstyled sidebar-sticky">
                <li class="my-3"><a class="text-white w-100" style="line-height: 0px;" href="">Post a Question</a></li>
                <li class="my-3"><a class="text-white w-100" href="">Categories</a></li>
                <li class="my-3"><a class="text-white w-100" href="">About</a></li>
            </ul>
        </div>
         <div class="d-flex flex-column mb-5 align-items-center">
            <img src="assets/david.jpg" class="rounded-img " alt="">
            <h5 class="pt-2 text-white">David Dinis</h5>
            <span class="text-white">2309 points</span>
            <ul class="list-unstyled d-flex flex-column align-items-center my-5">
                <li><a class="text-white" href="">View Activity</a></li>
                <li><a class="text-white" href="">Notifications</a></li>
                <li><a class="text-white" href="">Settings</a></li>
            </ul>
            <button class="btn btn-secondary">Sign out</button>
        </div>
        
    </nav> -->

    <nav class="sidebar-lg d-none d-lg-block col-lg-2 ">
        <div class=" text-center text-white mt-5 d-flex flex-column align-items-center justify-content-lg-between">
            <img src="assets/logo.png" class="register-logo" width="100px" alt="">
            <ul class="mt-5 list-unstyled " style="line-height: 6px;">
                <li><a class="text-white w-100" href="">About</a></li>
                <li><a class="text-white w-100" href="">Post a Question</a></li>
                <li>
                    <a href="#otherSections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections">
                        Categories
                    </a>
                    <ul class="collapse list-unstyled" id="otherSections">
                        <li><a class="scroll-link" href="">Laundry</a></li>
                    </ul>
                </li>
<!-- 
                <img src="assets/david.jpg" class="rounded-img " alt="">
                <h5 class="pt-2 text-white">David Dinis</h5>
                <span class="text-white">2309 points</span>

                <li><a class="text-white w-100" href="">View Activity</a></li>
                <li><a class="text-white w-100" href="">Notifications</a></li>
                <li><a class="text-white w-100" href="">Settings</a></li>

                <button class="btn btn-secondary">Sign out</button> -->

                <div class="nav flex-column ">
                    <button class="btn btn-light mb-2">Sign up</button>
                    <button class="btn btn-secondary">Log in</button>
                </div>
            </ul>
        </div>
    </nav>

    <nav class="sidebar d-lg-none">

        <div class="dismiss">
            <i class="fa fa-arrow-left"></i>
        </div>

        <div class="sidebar-header text-center text-white mt-5">
            <img src="assets/logo.png" class="register-logo" width="100px" alt="">
            <ul class="mt-5 list-unstyled sidebar-sticky " style="line-height: 6px;">
                <li><a class="text-white w-100" href="">About</a></li>
                <li><a class="text-white w-100" href="">Post a Question</a></li>
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

        <div class="to-top">
            <a class="btn btn-primary btn-customized-3" href="#" role="button">
                <i class="fa fa-arrow-up"></i> Top
            </a>
        </div>

    </nav>
    <!-- End sidebar -->

<?php } ?>