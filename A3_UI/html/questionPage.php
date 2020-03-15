<?php

include_once('tpl_common.php');

drawHTMlHeader();
?>


<body class="container-fluid vh-100 p-0 m-0  bg-mygrey">
    <?php
    drawNavBar(false);
    drawNavBarTop("");
    ?>

    <main id="main" class="ml-auto col-lg-10 text-center px-md-5">
        <div class="container-fluid py-2 my-3 pr-lg-5 text-left bg-transparent ">
            <!-- Question -->
            <div class="blockquote p-0 border bg-white">
                <div class="d-flex">
                    <div class="flex-column px-3 pt-3 justify-content-start d-none d-md-flex ">
                        <img src="assets/david.jpg" class="rounded-img " alt="User Photo" />
                        <small class="text-center">David Dinis</small>
                    </div>
                    <div class="container-fluid p-0 m-0">
                        <h1 class="pt-3"> <small>(<u>Edited</u>)</small> How do I wash my yellow jacket?</h1>

                        <p class="pt-2 pr-3">

                            SO, I have this yellow jacket and I don't know how to wash it. How do I wash
                            it? It is yellow. Please help.

                        </p>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="tag bg-myyellow mr-1 px-4">Yellow</span>
                                <span class="tag bg-myblue m-1 px-4">Laundry</span>
                            </div>
                            <div class="text-right m-3">
                                <small class="pt-3 mr-3"> Asked on June 16, 2015 </small>
                                <a href="#" class="small text-secondary mr-3"><i class="fa fa-flag "></i> Report</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Answer -->
            <div class="blockquote d-flex flex-column ">
                <div class="d-flex align-items-center">
                    <div class="rounded-img d-flex flex-column align-items-center h-100 justify-content-center ml-2 ">
                        <i class=" fa fa-angle-up fa-2x text-mygreen"></i>
                        <i class="">42</i>
                        <i class=" fa fa-angle-down fa-2x text-myblue "></i>
                    </div>
                    <div class="border d-flex flex-column w-100 p-0 bg-white pl-3 pr-3">
                        <span class="p-2 text-danger text-nowrap"> <i class="fa fa-heart"></i> Best Answer!</span>
                        <div class="d-flex ">
                            <div class="d-flex flex-column align-items-center pr-4">
                                <img src="assets/henrique.jpg" class="rounded-img ml-2" alt="User Photo" />
                                <small class="text-center">Henrique Freitas</small>
                                <small><span class="small text-center">4253 points</span></small>
                            </div>
                            <p class="px-2 text-justify">
                                In order to wash your yellow jacket you need to use special yellow jacket
                                washing soap In order to wash your yellow jacket you need to use special
                                yellow jacket washing soap In order to wash your yellow jacket you need to
                                use special yellow jacket washing soap In order to wash your yellow jacket
                                you need to use special yellow jacket
                            </p>
                        </div>
                        <div class="d-flex small justify-content-end  align-items-end m-3 ">
                            <small class="mr-3"> Replied on July 3, 2016 </small>
                            <a href="#" class="small text-secondary"><i class="fa fa-flag "></i> Report</a>
                        </div>
                    </div>
                </div>
                <!-- Comment -->
                <div class="d-flex blockquote pt-2 justify-content-center">
                    <div class="px-3">
                        <div class="rounded-img h-25"></div>
                    </div>
                    <div class="d-flex border w-100 bg-white ml-4">


                        <div class="border d-flex flex-column w-100 bg-white pl-3 pr-3">
                            <div class="d-flex align-items-center">
                                <img src="assets/rita.jpg" class="rounded-img ml-2 size-25" alt="User Photo" />
                                <p class="pt-3 small ml-4">
                                    Indeed there is a special soap used for yellow jackets! Best answer for me!
                                </p>
                            </div>
                            <div class="d-flex small justify-content-end  mr-3 mb-3 ">
                                <small class="mr-3"> Replied on July 3, 2016 </small>
                                <a href="#" class="small text-secondary"><i class="fa fa-flag "></i> Report</a>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="blockquote py-lg-2 px-lg-5 d-flex flex-column">
                    <div class="d-flex px-lg-5">
                        <div class="d-flex flex-column px-4">
                            <i class=" fa fa-angle-up fa-2x goodGreen"></i>
                            <i class="">100</i>
                            <i class=" fa fa-angle-down fa-2x  badPurple"></i>
                        </div>
                        <div class="border d-flex p-3 w-100">
                            <div class="d-flex flex-column align-items-center pr-4">
                                <img src="assets/jose.jpg" class="rounded-img" alt="User Photo" />
                                <span class="text-center">José Gomes</span>
                            </div>
                            <div>
                                <span class="small">
                                    <span class="">4253 points </span>
                                    | Member since May 2015 | Posted 1 month ago |
                                    <a href="#" class="small text-secondary">
                                        <i class="fa fa-flag "></i>
                                        Report
                                    </a>
                                </span>
                                <p class="pt-lg-3 pl-lg-2 ">
                                    Soak it in rice... that might work...
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- COMMENT -->
                    <div class="d-flex pt-2 justify-content-center px-lg-5">
                        <div class="d-flex flex-column align-items-center pr-3">
                            <img src="assets/rita.jpg" class="small rounded-img" alt="User Photo" />
                        </div>
                        <div class="border w-75">
                            <span class=" small px-3">
                                <span class="">3443 points</span>
                                | Member since May 2015 | Posted 15 days ago |
                                <a href="#" class="small text-secondary">
                                    <i class="fa fa-flag "></i>
                                    Report
                                </a>
                            </span>
                            <p class="py-lg-2 px-lg-2 small">
                                Indeed there is a special soap used for yellow jackets! Best answer for me!
                            </p>
                        </div>
                    </div>
                    <!-- COMMENT -->
                    <div class="d-flex pt-2 justify-content-center px-lg-5">
                        <div class="d-flex flex-column align-items-center pr-3">
                            <img src="assets/henrique.jpg" class="small rounded-img" alt="User Photo" />
                        </div>
                        <div class="border w-75">
                            <span class=" small px-3">
                                <span class="">3443 points</span>
                                | Member since October 2010 | Posted today |
                                <a href="#" class="small text-secondary">
                                    <i class="fa fa-flag "></i>
                                    Report
                                </a>
                            </span>
                            <p class="py-lg-2 px-lg-2 small">
                                I like trainsI like trainsI like trainsI like trainsI like trainsI like
                                trainsI like trainsI like trainsI like trainsI like trainsI like trainsI like
                                trainsI like trainsI like trainsI like trainsI like trainsI like trainsI like
                                trainsI like trainsI like trainsI like trainsI like trainsI like trainsI like
                                trainsI like trainsI like trainsI like trainsI like trains
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</body>

</html>