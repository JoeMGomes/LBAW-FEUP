<?php

include_once('tpl_common.php');

drawHTMlHeader()

?>

<body style="background-image: url('assets/pattern.png');" class="vh-100 m-0 p-0">
    <?php drawNavBar(false) ?>

    <main id="main" class=" ml-sm-auto col-lg-10 px-4 text-center d-flex flex-column justify-content-between vh-100">
        <div></div>
        <div class=" m-md-5 m-sm-1 border bg-white p-md-5 p-sm-1 ">
            <label for="search" class="w-75 m-4">
                <h3>Adult life is hard. Hit us with your question!</h3>
            </label>

            <?php drawSearchBarMain("") ?>

            <span>Tip: Search with # to filter your results through categories</span>

            <ul class="mt-3 m-1 mx-lg-auto col-lg-10 d-flex list-unstyled justify-content-around flex-wrap">
                <li class="tag mx-md-2 my-1 bg-myred">Laundry</li>
                <li class="tag mx-md-2 my-1 bg-myyellow">Cooking</li>
                <li class="tag mx-md-2 my-1 bg-mygreen">Health</li>
                <li class="tag mx-md-2 my-1 bg-myred">Finances</li>
                <li class="tag mx-md-2 my-1 bg-myyellow">Sexuality</li>
                <li class="tag mx-md-2 my-1 bg-mygreen">Work</li>
                <li class="tag mx-md-2 my-1 bg-myred">Relationships</li>
                <li class="tag mx-md-2 my-1 bg-myyellow">Household</li>
            </ul>
        </div>


        <div class="mb-3">  <i class="fa fa-angle-down fa-4x bg-dark text-white rounded px-3"></i></div>

    </main>

</body>

</html>