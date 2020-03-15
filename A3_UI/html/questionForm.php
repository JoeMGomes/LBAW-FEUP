<title>GROW - New question</title>
<?php

include_once('tpl_common.php');

drawHTMlHeader();
?>

<body class="container-fluid vh-100 m-0 p-0 bg-mygrey">
    <?php
    drawNavBar(true);
    ?>

    <main id="main" class="ml-auto col-lg-10 px-md-5">
        <div class="bg-white p-4 my-3 border w-75 mx-auto">
            <h1 class="text-center">Don't be afraid to ask your question</h1>
            <span class="text-left ml-4">
                Tips on getting good answers quickly:
            </span>
                <ul class="text-mydarkblue ml-4 mt-2">
                    <li> Make sure your question has not been asked already </li>
                    <li> Keep your question short and to the point </li>
                    <li> Double-check grammar and spelling </li>
                </ul>
            <form class=" text-black d-flex flex-column">
                <div class="form-group">
                    <h4 class="p-2  text-left">What is your question?</h2>
                        <input class="form-control ">
                </div>
                <div class="form-group">
                    <h4 class="p-2 text-left">Explain yourself a bit better</h2>
                        <textarea class="form-control pb-5" rows="5"></textarea>
                </div>
                <h4 class="p-2 text-left">In which categories does your question fit in? <small> (Choose up to 5)</small></h4>
                <div class="form-group ">
                    <input class="form-control">
                </div>
                <div class="form-check-inline justify-content-start">
                    <!-- input id must be label "for" field -->
                    <input type="checkbox" class="labelCheckBox d-none" id="relAndSex">
                    <label for="relAndSex" class=" tag labelToCheck mx-md-2 my-1 px-3">Relationships & Sexuality</label>

                    <input type="checkbox" class="labelCheckBox d-none" id="health">
                    <label for="health" class=" tag labelToCheck mx-md-2 my-1 px-3">Health</label>

                    <input type="checkbox" class="labelCheckBox d-none" id="cooking">
                    <label for="cooking" class=" tag labelToCheck mx-md-2 my-1 px-3">Cooking</label>
                </div>
                <button type="submit" class="btn bg-mygreen text-white ml-auto">Submit</button>
            </form>
        </div>
    </main>
</body>

</html>