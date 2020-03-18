<?php

include_once('tpl_common.php');
drawHTMLHeader();

?>

<body class="container-fluid vh-100 p-0 m-0">

    <?php
    drawNavBar(false);
    drawNavBarTop("How do I do my taxes");
    ?>


    <main id="main" class="ml-lg-auto col-lg-10 align-right h-100 ">
        <div class="row justify-content-end my-2">
            <div class="col">
                <label class="sorter-label "> Sorted by</label>
                <select class=" custom-select col-5">
                    <option>Most answers</option>
                    <option>Most recent</option>
                </select>
            </div>
            <span class="col row justify-content-end align-self-center pr-4 mr-4"> 2 results found </span>
        </div>
        <div class="container-fluid py-0 my-0 pr-lg-5 text-left bg-white ">
            <div class="blockquote py-lg-2 border d-flex p-3 bg-light">
                <div class="d-flex m-0 ">
                    <div class="row ">
                        <div class="d-flex flex-column px-5 justify-content-center">
                            <img src="assets/david.jpg" class="rounded-img " alt="User Photo" />
                            <span class="text-center"><strong>David Dinis</strong></span>
                        </div>
                        <div>
                            <h4 class=" pt-2">
                                <a href="questionPage.php">
                                    Do I need to keep all my receipts from the past year?
                                </a>
                                <?php drawReport()?>

                            </h4>
                            <span> taxes are hard, how does it work??</span>
                            <footer class="blockquote-footer text-left pt-lg-3">
                                Asked on 16, June 2015
                            </footer>

                        </div>
                        <div class="border d-flex w-75 m-auto bg-white align-self-center">
                            <div class="d-flex flex-column align-items-center py-4">
                                <img src="assets/henrique.jpg" class="rounded-img small" alt="User Photo" />
                                <span class="text-center px-2"><strong>Henrique Freitas</strong></span>
                            </div>
                            <div class="py-4 ">
                                <span> 4253 points </span>
                                | Member since October 2010 | Posted 15 days ago |
                                <?php drawReport()?>
                                <span class="px-lg-5 text-danger text-nowrap"> <i class="fa fa-heart "></i> Best
                                    Answer!</span>
                                <p class="pt-lg-3 pl-lg-2">
                                    In order to wash your yellow jacket you need to use special yellow jacket
                                    washing soap
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="blockquote py-lg-2 border d-flex p-3 bg-light">
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
                                <?php drawReport()?>
                            </h4>
                            <span> taxes are hard, how does it work??</span>
                            <footer class=" blockquote-footer text-left pt-lg-3">
                                Asked on 16, June 2015
                            </footer>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>