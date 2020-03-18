<title>Administration</title>
<?php

include_once('tpl_common.php');

drawHTMlHeader();
?>

<body class="container-fluid vh-100 m-0 p-0 ">
    <?php
    drawNavBar(true);
    drawNavBarTop("");
    ?>
    <main id="main" class="ml-lg-auto col-lg-10 align-right ">
        <h1 class=" py-2 px-4"> Administration</h1>
        <div class="container mx-5">
            <div>
                <h5>Create New Category</h5>
                <div class="row">
                    <div class="form-group w-25 col-md-5">
                        <label  for="inputUsername">Category Name</label>
                        <input type="text" id="inputCat" class="form-control" required="" autofocus="">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputColor">Category Color</label>
                        <label class="pl-5" id="color-picker-wrapper" for="color-picker">
                            <input type="color" value="#550000" id="color-picker">
                        </label>
                    </div>
                    <div class="form-group  col-md-5">
                        <label for="inputColor">Preview</label><br>
                        <label id="newCatPreview"class="tag my-1">&nbsp;</label>
                    </div>
                    <button type="submit" class="btn bg-mydarkgreen text-white mx-3 mb-4">Submit</button>
                </div>
            </div>
            <div>
                <h5>Edit Category</h5>
                <div class="form-group w-25">
                    <input class="form-control" id="categories" placeholder="autocomplete">
                </div>
                <div class="row">
                    <div class="form-group w-25 col-md-5">
                        <label  for="inputUsername">New Category Name</label>
                        <input type="text" id="inputCatEdit" class="form-control" required="" autofocus="">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputColor">Category Color</label>
                        <label class="pl-5" id="color-picker-wrapperEdit" for="color-pickerEdit">
                            <input type="color" value="#550000" id="color-pickerEdit">
                        </label>
                    </div>
                    <div class="form-group  col-md-5">
                        <label for="inputColor">Preview</label><br>
                        <label id="newCatPreviewEdit"class="tag mx-md-2 my-1 bg-myred">&nbsp;</label>
                    </div>
                    <button type="submit" class="btn bg-mydarkgreen text-white mx-3 mb-4">Edit</button>
                    <button type="submit" class="btn tag-orange text-white mx-3 mb-4">Remove</button>
                </div>
            </div>
        </div>
    </main>

</body>