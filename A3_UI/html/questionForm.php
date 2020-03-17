<title>GROW - New question</title>
<?php

include_once('tpl_common.php');

drawHTMlHeader();
?>

<body class="container-fluid vh-100 m-0 p-0 bg-mygrey">
    <?php
    drawNavBar(true);
    ?>

    <main id="main" class="ml-lg-auto col-lg-10 p-4">
        <div class="bg-white p-4 border w-75 mx-auto">
            <h1 class="text-center my-3">Don't be afraid to ask your question</h1>
            <div class="text-left ml-4 mt-4">
                <span class=""> Tips on getting good answers quickly: </span>
                <ul class="list-unstyled ml-3 mt-2">
                    <li> <i class=" fa fa-check-circle text-mydarkgreen"></i> Make sure your question has not been asked already </li>
                    <li> <i class=" fa fa-check-circle text-mydarkgreen"></i> Keep your question short and to the point </li>
                    <li> <i class=" fa fa-check-circle text-mydarkgreen"></i> Double-check grammar and spelling </li>
                </ul>
            </div>
            <form class=" text-black d-flex flex-column ">
                <div class="form-group">
                    <label for="question" class="p-2 h4 text-left">What is your question?</label>
                    <input id="question" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description" class="p-2 h4 text-left">Explain yourself a bit better</label>
                    <textarea class="form-control" id="description" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="categor" class="p-2 h4 text-left">In which categories does your question fit in?
                        <small class="h6"> (Choose up to 5)</small>
                    </label>
                    <input class="form-control" id="categor">
                </div>
                <div class="form-check ">
                    <!-- input id must be label "for" field -->
                    <input type="checkbox" id="rel">
                    <label for="rel" class="labelToCheck" onkeydown="">Relationship</label>

                    <input type="checkbox" id="sex">
                    <label for="sex" class="labelToCheck" >Sexuality</label>

                    <input type="checkbox" id="cooking">
                    <label for="cooking" class="labelToCheck" >Cooking</label>

                    <input type="checkbox" id="health">
                    <label for="health" class="labelToCheck" >Health</label>

                </div>
                <button type="submit" class="btn bg-mydarkgreen text-white mt-1 ml-auto">Submit</button>
            </form>
        </div>
    </main>
</body>