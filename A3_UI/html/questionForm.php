<title>GROW - New question</title>
<?php

include_once('tpl_common.php');

drawHTMlHeader();
?>

<body class="container-fluid vh-100 m-0 p-0">
    <?php
    drawNavBar(true);
    ?>

    <main id="main" class="ml-auto col-lg-10 text-center px-md-5 bg-mygrey">
        <div class="bg-white">
            <form class="mt-px-5 py-4  text-dark d-flex flex-column">
                <h1 class="">GROW is a platform where you can feel <i>safe</i></h1>
                <div class="form-group">
                    <h2 class="p-2  text-left">What is your question?</h2>
                    <input class="form-control ">
                </div>
                <div class="form-group">
                    <h2 class="p-2 text-left">Explain yourself a bit better</h2>
                    <textarea class="form-control pb-5" rows="5"></textarea>
                </div>
                <h2 class="p-2 text-left">In which categories does your question fit in? Choose up to 5!</h2>
                <div class="form-check-inline justify-content-center">
                    <!-- input id must be label "for" field -->
                    <input type="checkbox" class="labelCheckBox d-none" id="relAndSex">
                    <label for="relAndSex" class=" tag labelToCheck mx-md-2 my-1 px-3">Relationships & Sexuality</label>

                    <input type="checkbox" class="labelCheckBox d-none" id="health">
                    <label for="health" class=" tag labelToCheck mx-md-2 my-1 px-3">Health</label>

                    <input type="checkbox" class="labelCheckBox d-none" id="cooking">
                    <label for="cooking" class=" tag labelToCheck mx-md-2 my-1 px-3">Cooking</label>
                </div>
                <div class="form-group ">
                    <h3 class="text-white text-left p-2">Other:</h3>
                    <input class="form-control">
                </div>
                <button type="submit" class="btn btn-success ml-auto">Submit</button>
            </form>
        </div>
    </main>
</body>

</html>