<?php

include_once('tpl_common.php');

drawHTMlHeader();
?>

<body style="margin:0px; padding: 0px; font-family: 'Raleway', sans-serif; " class="container-fluid vh-100">
    <?php
    drawNavBar();
    drawNavBarTop();
    ?>


    <main id="main" class="ml-md-auto col-md-10 text-center pr-5">
        <div>
            <h1 class="p-5">Don't be shy! Grow is a platform where you can feel safe</h1>
            <div class="">
                <div>
                    <form class="px-5 py-4 bg-mydark d-flex flex-column">
                        <div class="form-group">
                            <h2 class="text-white p-2  text-left">What is your question?</h2>
                            <input class="form-control ">
                        </div>
                        <div class="form-group">
                            <h2 class="text-white p-2 text-left">Explain yourself a bit better</h2>
                            <textarea class="form-control pb-5" rows="5"></textarea>
                        </div>
                        <h2 class="text-white p-2 text-left">In which categories does your question fit in? Choose up to 5!</h2>
                        <div class="form-check-inline justify-content-center">
                            <!-- input id must be label "for" field -->
                            <input type="checkbox" class="labelCheckBox visually-hidden" id="relAndSex">
                            <label for="relAndSex" class=" tag labelToCheck mx-md-2 my-1 px-3">Relationships & Sexuality</label>

                            <input type="checkbox" class="labelCheckBox visually-hidden" id="health">
                            <label for="health" class=" tag labelToCheck mx-md-2 my-1 px-3">Health</label>

                            <input type="checkbox" class="labelCheckBox visually-hidden" id="cooking">
                            <label for="cooking" class=" tag labelToCheck mx-md-2 my-1 px-3">Cooking</label>
                        </div>
                        <div class="form-group ">
                            <h3 class="text-white text-left p-2">Other:</h3>
                            <input class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success ml-auto">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>