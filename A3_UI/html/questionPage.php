<?php

include_once('tpl_common.php');
drawHTMLHeader();
?>


<body class="container-fluid vh-100 p-0 m-0 bg-mygrey">
    <?php
    drawNavBar(false);
    drawNavBarTop("");
    ?>

    <main id="main" class="ml-auto col-lg-10 px-md-5 mb-3">
        <div class="py-4 px-5 border bg-white">

            <!-- Question -->
            <div class=" d-flex mb-3 ">
                <div class="flex-column d-none d-md-flex ">
                    <img src="assets/david.jpg" class="rounded-img " alt="User Photo" />
                    <small class="text-center mt-2">David Dinis</small>
                </div>
                <div class="ml-4">
                    <h1> <small>(<u>Edited</u>)</small> How do I wash my yellow jacket?</h1>
                    <p class="text-justified ">
                        SO, I have this yellow jacket and I don't know how to wash it. How do I wash
                        it? It is yellow. Please help.
                    </p>
                    <div class="d-flex row align-items-end justify-content-between">
                        <div class="col-lg-8">
                            <a href="" class="btn rounded-pill my-1 bg-myyellow">Yellow</a>
                            <a href="" class="btn rounded-pill my-1 bg-myblue">Laundry</a>
                            <a href="" class="btn rounded-pill my-1 bg-mygreen">Laundry</a>
                            <a href="" class="btn rounded-pill my-1 bg-myyellow">Laundry</a>
                            <a href="" class="btn rounded-pill my-1 bg-myred">Laundry</a>
                        </div>
                        <div class="text-right col-lg-4">
                            <small> Asked on June 16, 2015 </small>
                            <?php drawReport() ?>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Answer -->
            <div class="d-flex align-items-center w-100">
                <div class="rounded-img text-center flex-column">
                    <i class="fa fa-angle-up fa-2x text-mygreen"></i>
                    <div>4200</div>
                    <i class=" fa fa-angle-down fa-2x text-myblue "></i>
                </div>
                <div class="border w-100 d-flex flex-column mx-4 px-3 py-3">
                    <span class="text-danger text-nowrap"> <i class="fa fa-heart"></i> Best Answer!</span>
                    <p class="text-justify">
                        In order to wash your yellow jacket you need to use special yellow jacket
                        washing soap In order to wash your yellow jacket you need to use special
                        yellow jacket washing soap In order to wash your yellow jacket you need to
                        use special yellow jacket washing soap In order to wash your yellow jacket
                        you need to use special yellow jacket
                    </p>
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="flex-column align-items-center mr-3">
                            <span class="text-nowrap">
                                <img src="assets/henrique.jpg" class="reply-img mr-2" alt="User Photo" />
                                &#8212 Henrique Freitas
                            </span>
                            <small class="small"> 4253 points | Member since October 2010</small>
                        </div>
                        <div>
                            <small> Replied on July 3, 2016 </small>
                            <?php drawReport() ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comment -->
            <div class="d-flex align-items-center mt-1 w-100">
                <div class="rounded-img"> </div>
                <div class="rounded-img"> </div>
                <div class="border w-100 d-flex flex-column mx-4 px-3 py-3">
                    <p class="text-justify">
                        Indeed there is a special soap used for yellow jackets! Best answer for me!
                    </p>
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="flex-column align-items-center mr-3">
                            <span class="text-nowrap">
                                <img src="assets/rita.jpg" class="comment-img mr-2" alt="User Photo" />
                                &#8212 Rita Mota
                            </span>
                            <small class="small"> 3443 points | Member since May 2015</small>
                        </div>
                        <div>
                            <small> Answered on July 3, 2016 </small>
                            <?php drawReport() ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Answer 2 -->
            <div class="d-flex align-items-center mt-4 w-100">
                <div class="rounded-img text-center flex-column">
                    <i class="fa fa-angle-up fa-2x text-mygreen"></i>
                    <div>53</div>
                    <i class=" fa fa-angle-down fa-2x text-myblue "></i>
                </div>
                <div class="border w-100 d-flex flex-column mx-4 px-3 py-3">
                    <p class="text-justify">
                        Soak it in rice... that might work...
                    </p>
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="flex-column align-items-center mr-3">
                            <span class="text-nowrap">
                                <img src="assets/jose.jpg" class="reply-img mr-2" alt="User Photo" />
                                &#8212 José Gomes
                            </span>
                            <small class="small"> 4253 points | Member since May 2015</small>
                        </div>
                        <div>
                            <small> Replied on July 3, 2016 </small>
                            <?php drawReport() ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comment -->
            <div class="d-flex align-items-center mt-1 w-100">
                <div class="rounded-img"> </div>
                <div class="rounded-img"> </div>
                <div class="border w-100 d-flex flex-column mx-4 px-3 py-3">
                    <p class="text-justify">
                        Indeed there is a special soap used for yellow jackets! Best answer for me!
                    </p>
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="flex-column align-items-center mr-3">
                            <span class="text-nowrap">
                                <img src="assets/rita.jpg" class="comment-img mr-2" alt="User Photo" />
                                &#8212 Rita Mota
                            </span>
                            <small class="small"> 3443 points | Member since May 2015</small>
                        </div>
                        <div>
                            <small> Answered on July 3, 2016 </small>
                            <?php drawReport() ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Comment -->
            <div class="d-flex align-items-center mt-1 w-100">
                <div class="rounded-img"> </div>
                <div class="rounded-img"> </div>
                <div class="border w-100 d-flex flex-column mx-4 px-3 py-3">
                    <p class="text-justify">
                        I like trainsI like trainsI like trainsI like trainsI like trainsI like
                        trainsI like trainsI like trainsI like trainsI like trainsI like trainsI like
                        trainsI like trainsI like trainsI like trainsI like trainsI like trainsI like
                        trainsI like trainsI like trainsI like trainsI like trainsI like trainsI like
                        trainsI like trainsI like trainsI like trainsI like trains
                    </p>
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="flex-column align-items-center mr-3">
                            <span class="text-nowrap">
                                <img src="assets/henrique.jpg" class="comment-img mr-2" alt="User Photo" />
                                &#8212 Henrique Freitas
                            </span>
                            <small class="small"> 3443 points | Member since October 2010</small>
                        </div>
                        <div>
                            <small> Answered on July 3, 2016 </small>
                            <?php drawReport() ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>

</html>