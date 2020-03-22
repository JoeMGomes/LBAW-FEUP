<title>My Activity</title>
<?php

include_once('tpl_common.php');

drawHTMLHeader()

?>

<body class=" vh-100 m-0 p-0">
    <!-- <nav class="position-fixed col-md-2 col-lg-2 d-none d-md-flex flex-column  justify-content-between  bg-dark sidebar h-100"> -->
    <?php
    drawNavBar(true);
    drawNavBarTop("");
    ?>



    <main id="main" class="ml-lg-auto col-lg-10  ">
        <h2 class="p-4">Activity Page</h2>
        <div class="container-fluid py-0 my-0 pr-lg-5 text-left bg-white ">
            <p class="h6 my-3"> <i class="fa fa-calendar fa-1x"> </i> 21/03/2020</p>
            <div class="border d-flex flex-column bg-light mb-3">
                <div class="d-flex m-0 ">
                    <div class="row w-100 px-3 ml-2 py-1">
                        <div class="d-flex w-100">
                            <span>You asked a question!</span>
                            <i class="fa fa-pencil px-2"></i>
                            <a href="#">Edit question</a>
                        </div>
                        <div class="my-2">
                            <h5 class=" pt-2">
                                Do I need to keep all my receipts from the past year?
                            </h5>
                            <span> taxes are hard, how does it work??</span>
                        </div>
                        <div class="d-flex w-100 border bg-white mx-4 ">
                            <div class="pt-2 ">
                                <span class="px-3  text-danger text-nowrap">
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
            <div class="border d-flex flex-column bg-light mb-3">
                <div class="d-flex m-0">
                    <div class="row w-100 px-3 ml-2 py-1">
                        <div class="d-flex w-100">
                            <span class="px-2">You helped someone and gained<b> 23</b> points!</span>
                            <i class="fa fa-pencil px-2"></i>
                            <a href="#">Edit answer</a>
                        </div>
                        <div class=" d-flex w-100 border bg-white mx-4 ">
                            <div class="d-flex flex-column px-4">
                                <i class=" fa fa-angle-up fa-2x text-mydark"></i>
                                <i>23</i>
                                <i class=" fa fa-angle-down fa-2x text-mydark "></i>
                            </div>
                            <p class="pt-3 pl-2 ">
                                Download more RAM?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="h6 my-3"> <i class="fa fa-calendar fa-1x"> </i> 15/03/2020</p>
            <div class="border d-flex flex-column bg-light mb-3">
                <div class="d-flex m-0 ">
                    <div class="row px-3 ml-2 py-1 w-100">
                        <div class="d-flex w-100">
                            <span>You commented in a reply!</span>
                            <i class="fa fa-pencil px-2"></i>
                            <a href="#">Edit comment</a>
                        </div>
                        <div class="my-2">
                            <h5 class="pt-2">
                                How do I wash my yellow jacket?
                            </h5>
                            <span> My jacket is yellow and is dirty</span>
                        </div>
                        <div class="d-flex w-100 border bg-white mx-4">
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