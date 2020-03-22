<?php

include_once('tpl_common.php');
drawHTMLHeader();

?>

<body class="container-fluid vh-100 p-0 m-0">

    <?php
    drawNavBar(false);
    drawNavBarTop("How do I do my taxes");
    ?>


    <main id="main" class="ml-lg-auto  col-lg-10 align-right h-100 ">

        <div class=" ml-lg-auto w-100 pb-0">
            <div class="ml-1 d-flex align-items-center justify-content-between mb-3">
                <div class="col-lg-5">
                    <label for="sort" class="sorter-label "> Sorted by</label>
                    <select id="sort" class=" custom-select col-5">
                        <option>Most answers</option>
                        <option>Most recent</option>
                    </select>
                </div>
                <span class="pr-4 mr-4"> 2 results found </span>
            </div>
            <div class="border d-flex flex-column bg-light w-90 align-items-center py-3">
                <!-- Question -->
                <div class="d-flex">
                    <div class="flex-column d-none d-md-flex ">
                        <img src="assets/david.jpg" class="rounded-img " alt="User Photo" />
                        <small class="text-center mt-2">David Dinis</small>
                    </div>
                    <div class="ml-4">
                        <a class="text-black" href="questionPage.php">
                            <h1 class="mb-3"> <small>(<u>Edited</u>)</small> How do I wash my <mark>yellow jacket?</mark></h1>
                        </a>
                        <p class="text-justified ">
                            SO, I have this <mark>yellow jacket</mark> and I don't know how to wash it. How do I wash
                            it? It is <mark> yellow</mark>. Please help.
                        </p>
                        <div class="d-flex row align-items-end justify-content-end">

                            <div class="text-right col-lg-4">
                                <small> Asked on June 16, 2015 </small>
                                <?php drawReport() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Comment -->
                <div class="d-flex align-items-center w-100 bg-white">
                    <div class="border w-100 d-flex flex-column mx-4 px-3 py-3">
                        <span class="text-danger text-nowrap"> <i class="fa fa-heart"></i> Best Answer!</span>
                        <p class="text-justify">
                            In order to wash your <mark>yellow jacket</mark>
                            need to use special <mark>yellow jacket</mark>
                            washing soap
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

            </div>
        </div>
        <!-- <div class="blockquote py-lg-2 border d-flex p-3 bg-light">
                <div class="d-flex m-0 ">
                    <div class="row ">
                        <div class="d-flex flex-column px-5 justify-content-center">
                            <img src="assets/david.jpg" class="rounded-img " alt="User Photo" />
                            <span class="text-center"><strong>David Dinis</strong></span>
                        </div>
                        <div>
                            <h4 class=" pt-2">
                                <a href="questionPage.php">
                                    Another question about taxes and receipts!
                                </a>
                                <?php drawReport() ?>
                            </h4>
                            <span> taxes are hard, how does it work??</span>
                            <footer class=" blockquote-footer text-left pt-lg-3">
                                Asked on 16, June 2015
                            </footer>

                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </main>
</body>

</html>