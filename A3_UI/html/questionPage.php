<?php

include_once('tpl_common.php');
drawHTMlHeader();
?>


<body class="container-fluid vh-100 p-0 m-0 bg-mygrey">
    <?php
    drawNavBar(false);
    drawNavBarTop("");
    ?>

    <main id="main" class="ml-auto col-lg-10 px-md-5">

        <div class="container-fluid py-4 px-5 border bg-white">
            <!-- Question -->
            <div class=" d-flex mb-3 ">
                <div class="flex-column px-2  d-none d-md-flex ">
                    <img src="assets/david.jpg" class="rounded-img " alt="User Photo" />
                    <small class="text-center mt-2">David Dinis</small>
                </div>
                <div class="ml-3">
                    <h1> <small>(<u>Edited</u>)</small> How do I wash my yellow jacket?</h1>
                    <p class="pt-2 ">
                        SO, I have this yellow jacket and I don't know how to wash it. How do I wash
                        it? It is yellow. Please help.
                    </p>
                    <div class="d-flex row align-items-end justify-content-between">
                        <div class="col-lg-8">
                            <button class="btn rounded-pill my-1 bg-myyellow">Yellow</button>
                            <button class="btn rounded-pill my-1 bg-myblue">Laundry</button>
                            <button class="btn rounded-pill my-1 bg-mygreen">Laundry</button>
                            <button class="btn rounded-pill my-1 bg-myyellow">Laundry</button>
                            <button class="btn rounded-pill my-1 bg-myred">Laundry</button>
                        </div>
                        <div class="text-right col-lg-4">
                            <small> Asked on June 16, 2015 </small>
                            <?php drawReport() ?>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Answer -->
            <div class=" d-flex ml-5 align-items-center">
                <div class="ml-3 text-center  flex-column">
                    <i class="fa fa-angle-up fa-2x text-mygreen"></i>
                    <div>4200</div>
                    <i class=" fa fa-angle-down fa-2x text-myblue "></i>
                </div>

                <div class="border w-100 d-flex flex-column ml-3 px-3 pt-2 bg-white ">
                <span class="text-danger text-nowrap ml-3"> <i class="fa fa-heart"></i> Best Answer!</span>
                    <div class="d-flex mt-3 mx-3">
                        <p class="text-justify">
                            In order to wash your yellow jacket you need to use special yellow jacket
                            washing soap In order to wash your yellow jacket you need to use special
                            yellow jacket washing soap In order to wash your yellow jacket you need to
                            use special yellow jacket washing soap In order to wash your yellow jacket
                            you need to use special yellow jacket
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <img src="assets/henrique.jpg" class="reply-img mx-1" alt="User Photo" />
                            <p> &#8212 Henrique Freitas <span class="small text-dark">| 4253 points
                                            | Member since October 2010</span></p>
                        </div>
                        <div>
                        <small class="mr-3"> Replied on July 3, 2016 </small>
                            <?php drawReport() ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Comment -->
            <div class="d-flex blockquote pt-2 justify-content-center">
                <div class="px-3">
                    <div class="rounded-img h-25"></div>
                </div>
                <div class="d-flex flex-column border w-100 bg-white mt-1 ml-4 px-3 py-3">
                    <p class="small">
                        Indeed there is a special soap used for yellow jackets! Best answer for me!
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <img src="assets/rita.jpg" class="comment-img" alt="User Photo" />
                            <small> &#8212 Rita Mota <span class="small">| 3443 points
                                    | Member since May 2015</span></small>
                        </div>
                        <div class="small mx-2">
                            <small class="mr-3"> Answered on July 3, 2016 </small>
                            <?php drawReport() ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Answer 2 -->
            <div class=" d-flex ml-5 align-items-center">
                <div class="ml-4 text-center  flex-column">
                    <i class="fa fa-angle-up fa-2x text-mygreen"></i>
                    <div>4200</div>
                    <i class=" fa fa-angle-down fa-2x text-myblue "></i>
                </div>

                <div class="border w-100 d-flex flex-column ml-4 px-3 pt-2 bg-white ">
                    <div class="d-flex mt-3 mx-3">
                        <p class="text-justify">
                            Soak it in rice... that might work...
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center m-3 ">
                        <div>
                            <img src="assets/henrique.jpg" class="reply-img" alt="User Photo" />
                            <small> &#8212 José Gomes <span class="small text-dark">| 4253 points
                                    | Member since May 2015 </span></small>
                        </div>
                        <div>
                            <small class="mr-3"> Replied on July 3, 2016 </small>
                            <?php drawReport() ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="blockquote py-lg-2 px-lg-5 d-flex flex-column">
                <div class="d-flex px-lg-5">
                    <div class="d-flex flex-column px-4">
                        <i class=" fa fa-angle-up fa-2x text-mygreen"></i>
                        100
                        <i class=" fa fa-angle-down fa-2x text-myblue"></i>
                    </div>
                    <div class="border d-flex p-3 w-100">
                        <div class="d-flex flex-column align-items-center pr-4">
                            <img src="assets/jose.jpg" class="rounded-img" alt="User Photo" />
                            <span class="text-center">José Gomes</span>
                        </div>
                        <div>
                            <span class="small">
                                <span>4253 points </span>
                                | Member since May 2015 | Posted 1 month ago |
                                <?php drawReport() ?>
                            </span>
                            <p class="pt-lg-3 pl-lg-2 ">

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
                            <span>3443 points</span>
                            | Member since May 2015 | Posted 15 days ago |
                            <?php drawReport() ?>
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
                            <span>3443 points</span>
                            | Member since October 2010 | Posted today |
                            <?php drawReport() ?>
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
        </div>
    </main>
</body>

</html>