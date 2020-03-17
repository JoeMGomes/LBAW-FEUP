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
                    <h4 class="p-2  text-left">What is your question?</h4>
                    <input class="form-control ">
                </div>
                <div class="form-group">
                    <h4 class="p-2 text-left">Explain yourself a bit better</h4>
                    <textarea class="form-control pb-5" rows="5"></textarea>
                </div>
                <div class="form-group ">
                    <label for="categories" class="p-2 h4 text-left">In which categories does your question fit in? <small class="h6"> (Choose up to 5)</small></label>
                    <input class="form-control" id="categories">
                </div>
                <div class="form-check justify-content-start">
                    <!-- input id must be label "for" field -->
                    <input type="checkbox" class="labelCheckBox d-none" id="rel">
                    <label for="rel" class=" tag labelToCheck mx-md-2 my-1 px-3">Relationships</label>

                    <input type="checkbox" class="labelCheckBox d-none" id="sex">
                    <label for="sex" class=" tag labelToCheck mx-md-2 my-1 px-3">Sexuality</label>

                    <input type="checkbox" class="labelCheckBox d-none" id="health">
                    <label for="health" class=" tag labelToCheck mx-md-2 my-1 px-3">Health</label>

                    <input type="checkbox" class="labelCheckBox d-none" id="cooking">
                    <label for="cooking" class=" tag labelToCheck mx-md-2 my-1 px-3">Cooking</label>
                </div>
                <button type="submit" class="btn bg-mydarkgreen text-white mt-1 ml-auto">Submit</button>
            </form>
        </div>
    </main>
</body>
