<?php

include_once('tpl_common.php');

drawHTMLHeader()

?>

<body style="background-image: url('assets/pattern.png');">
    <?php drawNavBar(false);
    drawMenuBtnMainPage(); ?>

    <main id="main" class="ml-sm-auto col-lg-10 px-4 text-center d-flex flex-column align-items-center justify-content-between">
        <div class="m-5"></div>
        <div class=" m-md-5 m-sm-1 border bg-white p-md-5 p-sm-1 ">
            <label for="search" class="w-75 m-4">
                <h3>Adult life is hard. Hit us with your question!</h3>
            </label>

            <?php drawSearchBarMain("") ?>

            <span>Tip: Search with # to filter your results through categories</span>
            <ul class="my-3 m-1 mx-lg-auto col-lg-10 d-flex list-unstyled justify-content-around flex-wrap">
                <a href="#" class="tag mx-md-2 my-1 bg-myred">Laundry</a>
                <a href="#" class="tag mx-md-2 my-1 bg-myyellow">Cooking</a>
                <a href="#" class="tag mx-md-2 my-1 bg-mygreen">Health</a>
                <a href="#" class="tag mx-md-2 my-1 bg-myred">Finances</a>
                <a href="#" class="tag mx-md-2 my-1 bg-myyellow">Sexuality</a>
                <a href="#" class="tag mx-md-2 my-1 bg-mygreen">Work</a>
                <a href="#" class="tag mx-md-2 my-1 bg-myred">Relationships</a>
                <a href="#" class="tag mx-md-2 my-1 bg-myyellow">Household</a>
            </ul>
        </div>
        <div class="m-1"></div>
        <a href="#popular"><i class="fa fa-angle-down fa-4x bg-white text-dark arrow rounded-circle"></i></a>
        <div class="m-3"></div>

        <div id="popular" class="d-flex flex-column w-75 text-center border bg-white px-5 py-md-3 py-sm-1 mb-5 align-items-center">

            <h1><i class="fa fa-pagelines text-dark"></i>
                Popular questions
                <i class="fa fa-pagelines fa-flip-horizontal text-dark "></i>
            </h1>
            <div class="m-2"></div>
            <div class="d-flex text-left w-75 align-items-center">
                <div class="flex-column d-none d-md-flex ">
                    <img src="assets/david.jpg" class="rounded-img " alt="User Photo" />
                    <small class="text-center mt-2">David Dinis</small>
                </div>
                <div class="ml-4">
                    <a class="text-black" href="questionPage.php">
                        <h4 class="mb-3">How do I wash my yellow jacket?</h4>
                    </a>
                    <p class="text-justified">
                        SO, I have this yellow jacket and I don't know how to wash it. How do I wash
                        it? It is yellow. Please help.
                    </p>
                </div>
            </div>

            <div class="m-1"></div>

            <div class="d-flex text-left w-75 align-items-center">
                <div class="flex-column d-none d-md-flex">
                    <img src="assets/rita.jpg" class="rounded-img" alt="User Photo" />
                    <small class="text-center mt-2">Rita Mota</small>
                </div>
                <div class="ml-4">
                    <a class="text-black" href="questionPage.php">
                        <h4 class="mb-3">For how long do I need to keep my old receipts?</h4>
                    </a>
                    <p class="text-justified">
                        What is a tax? How do I pay it? Life is too hard...
                    </p>
                </div>
            </div>

            <div class="m-1"></div>

            <div class="d-flex text-left w-75 align-items-center">
                <div class="flex-column d-none d-md-flex ">
                    <img src="assets/henrique.jpg" class="rounded-img " alt="User Photo" />
                    <small class="text-center mt-2">David Dinis</small>
                </div>
                <div class="ml-4">
                    <a class="text-black" href="questionPage.php">
                        <h4 class="mb-3">How do I wash my yellow jacket?</h4>
                    </a>
                    <p class="text-justified">
                        SO, I have this yellow jacket and I don't know how to wash it. How do I wash
                        it? It is yellow. Please help.
                    </p>
                </div>
            </div>

            <div class="m-1"></div>

            <div class="d-flex text-left w-75 align-items-center">
                <div class="flex-column d-none d-md-flex ">
                    <img src="assets/david.jpg" class="rounded-img " alt="User Photo" />
                    <small class="text-center mt-2">David Dinis</small>
                </div>
                <div class="ml-4">
                    <a class="text-black" href="questionPage.php">
                        <h4 class="mb-3">How do I wash my yellow jacket?</h4>
                    </a>
                    <p class="text-justified">
                        SO, I have this yellow jacket and I don't know how to wash it. How do I wash
                        it? It is yellow. Please help.
                    </p>
                </div>
            </div>

            <div class="m-1"></div>

            <div class="d-flex text-left w-75 align-items-center">
                <div class="flex-column d-none d-md-flex ">
                    <img src="assets/jose.jpg" class="rounded-img " alt="User Photo" />
                    <small class="text-center mt-2">David Dinis</small>
                </div>
                <div class="ml-4">
                    <a class="text-black" href="questionPage.php">
                        <h4 class="mb-3">How do I wash my yellow jacket?</h4>
                    </a>
                    <p class="text-justified">
                        SO, I have this yellow jacket and I don't know how to wash it. How do I wash
                        it? It is yellow. Please help.
                    </p>
                </div>
            </div>

        </div>

    </main>

</body>

</html>