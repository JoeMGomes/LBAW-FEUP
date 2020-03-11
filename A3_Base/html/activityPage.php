<?php

include_once('tpl_common.php');

drawHTMlHeader()

?>

<body style="margin:0px; padding: 0px; font-family: 'Raleway', sans-serif; " class="container-fluid vh-100">
    <nav class="position-fixed col-md-2 col-lg-2 d-none d-md-flex flex-column  justify-content-between  bg-dark sidebar h-100">
        <?php 
            drawNavBar();
        ?>
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
    </nav>

    <div class="col-md-10 ml-sm-auto col-lg-10 px-4 text-left align-middle">
        <form action="#" class="form input-group my-lg-0 py-3">
                
            <input id="search" class="form-control w-50 rounded-pill border-dark border-3 ml-2" type="text" placeholder="How do I do my taxes">
            <div class="input-group-append" >
                <button class="btn" type="button">
                    <i class="fa fa-search fa-lg" ></i>
                </button>
            </div>
            
        </form>
    </div>
    <main id="main" class="ml-auto col-md-10 h-100 ">
        <h2 class="font-weight-bold p-4">Activity Page</h2>
        <div class="container-fluid py-0 my-0 pr-lg-5 text-left bg-white ">
            <p class="font-weight-bold h6"> <i class="fa fa-calendar fa-1x"> </i> 21/03/2020</p>
            <div class="blockquote py-2 d-flex p-3 bg-grey rounded">
                <div class="d-flex m-0 ">
                    <div class="row px-3 py-1">
                        <div class="d-flex w-100">
                            <span class="">You asked a question!</span>
                            <i class="fa fa-pencil px-2"></i>
                            <a href="#">Edit question</a>
                        </div>

                        <div class="">

                            <h5 class="font-weight-bolder pt-2">
                                Do I need to keep all my receipts from the past year?
                            </h5>
                            <span> taxes are hard, how does it work??</span>
                        </div>
                        <div class="rounded d-flex w-100 bg-white ">
                            <div class="pt-2 ">

                                <span class="px-3 font-weight-bold text-danger text-nowrap">
                                    <i class="fa fa-heart "></i>
                                    Best Answer!</span>
                                <p class="pt-2 px-3">
                                    You can take things and not pay if you want
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="blockquote py-2 rounded d-flex p-3 bg-grey">
                <div class="d-flex m-0 flex-column w-100">
                    <div class="d-flex w-100">
                        <span class="px-2">You helped someone and gained 23 points!</span>
                        <i class="fa fa-pencil px-2"></i>
                        <a href="#">Edit answer</a>
                    </div>
                    <div class="rounded d-flex w-100 bg-white">
                        <div class=" d-flex">
                            <div class="d-flex flex-column px-4">
                                <i class=" fa fa-angle-up fa-2x grey"></i>
                                <i class="">23</i>
                                <i class=" fa fa-angle-down fa-2x grey "></i>
                            </div>
                            <p class="pt-3 pl-2">
                                Download more RAM?
                            </p>
                        </div>

                    </div>

                </div>
            </div>
            <p class="font-weight-bold h6"> <i class="fa fa-calendar fa-1x"> </i> 15/03/2020</p>
            <div class="blockquote py-2 d-flex p-3 bg-grey rounded">
                <div class="d-flex m-0 ">
                    <div class="row px-3 py-1">
                        <div class="d-flex w-100">
                            <span class="">You commented in a reply!</span>
                            <i class="fa fa-pencil px-2"></i>
                            <a href="#">Edit comment</a>
                        </div>
                        <div class="">
                            <h5 class="font-weight-bolder pt-2">
                                How do I wash my yellow jacket?
                            </h5>
                            <span> My jacket is yellow and is dirty</span>
                        </div>
                        <div class="rounded d-flex w-100 bg-white ">
                            <div class="pt-2 ">
                                <p class="pt-2 px-3">
                                    Indeed there is a special soap used for yellow jackets! Best answer for me!
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>