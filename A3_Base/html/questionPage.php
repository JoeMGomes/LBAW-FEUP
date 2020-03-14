<?php

include_once('tpl_common.php');

drawHTMlHeader();
?>


<body style="font-family: 'Raleway', sans-serif; " class="container-fluid vh-100 p-0 m-0">
    <?php
    drawNavBar(false);
    drawNavBarTop("");
    ?>


    <main id="main" class="ml-auto col-lg-10 text-center h-100 px-md-5 bg-grey ">
        <div class="container-fluid py-2 my-3 pr-lg-5 text-left bg-transparent ">
            <div class="blockquote p-0 border bg-white">
                <div class="d-flex">
                    <div class="flex-column px-3 pt-3 justify-content-start d-none d-md-flex ">
                        <img src="assets/david.jpg" class="rounded-img " alt="User Photo" />
                        <span class="text-center ">David Dinis</span>
                    </div>
                    <div class="container-fluid p-0 m-0">
                        <h2 class="font-weight-bolder pt-3 pr-3">
                            How do I wash my yellow jacket?
                        </h2> <a href="#" class="small text-secondary">
                                <i class="fa fa-flag "></i> Report</a>
                        <p class="pt-2 pr-3">
                            SO, I have this yellow jacket and I don't know how to wash it. How do I wash
                            it? It is yellow. Please help.
                            <br />
                            EDIT: The jacket is yellow
                        </p>
                        <span class="tag tag-yellow">#Laundry</span> <br />
                        <span class="text-left text-dark small pt-3">
                            Asked on June 16, 2015
                        </span>
                    </div>
                </div>
            </div>
            <!-- REPLY -->
            <div class="blockquote m-0 p-0 d-flex flex-column ">
                <div class="d-flex">
                    <div class="px-3">
                        <div class="rounded-img d-flex flex-column align-items-end h-100 justify-content-center ">
                            <i class=" fa fa-angle-up fa-2x goodGreen"></i>
                            <i class="">42</i>
                            <i class=" fa fa-angle-down fa-2x badPurple "></i>
                        </div>
                        
                    </div>
                    <div class="border d-flex flex-column w-100 p-0 bg-white">
                            
                            <span class="p-2 font-weight-bold text-danger text-nowrap">
                                    <i class="fa fa-heart "></i> Best Answer!</span>
                            <p class="px-2">
                                In order to wash your yellow jacket you need to use special yellow jacket
                                washing soap In order to wash your yellow jacket you need to use special
                                yellow jacket washing soap In order to wash your yellow jacket you need to
                                use special yellow jacket washing soap In order to wash your yellow jacket
                                you need to use special yellow jacket
                            </p>
                            <div class="d-flex justify-content-between small px-2 pb-2 align-items-end">
                                <span class=""> &#8212 Henrique Freitas <span class="small text-dark">| 4253 points 
                                | Member since October 2010 | Replied on July 3, 2016</span></span>
                                <a href="#" class="small text-secondary text-nowrap px-2">
                                    <i class="fa fa-flag "></i>
                                    Report
                                </a>
                                
                            </div>
                    </div>
                </div>
                <!-- COMMENT -->
                <div class="d-flex pt-2 justify-content-center">
                    <div class="px-3"><div class="rounded-img h-25"></div></div>
                    <div class="px-3"><div class="rounded-img h-25"></div></div>
                    <div class="border w-100 bg-white ">
                        
                        
                        <p class="py-2 px-2 small m-0">
                            Indeed there is a special soap used for yellow jackets! Best answer for me!
                        </p>
                        <div class="d-flex justify-content-between small px-2 pb-2 align-items-end">
                            <span > &#8212 Rita Mota <span class="small text-dark">| 3443 points
                            | Member since May 2015 | Commented on September 24, 2019</span></span>
                            <a href="#" class="small text-secondary text-nowrap px-2">
                                <i class="fa fa-flag "></i>
                                Report
                            </a>
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
                                <span class="font-weight-bolder">4253 points </span>
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
                            <span class="font-weight-bolder">3443 points</span>
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
                            <span class="font-weight-bolder">3443 points</span>
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