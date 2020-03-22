<title>Administration</title>
<?php

include_once('tpl_common.php');
include_once('tpl_admin.php');

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
            <?php drawAdminHead() ?>

            <div class="table-responsive">
                <h5>Pending Reports</h5>
                <table class="table table-bordered table-striped fixed-header">
                    <thead class="">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Offender</th>
                            <th scope="col">Date</th>
                            <th scope="col">Offense</th>
                            <th scope="col">Post</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php
                        drawTableEntry();
                        drawTableEntry();
                        drawTableEntry();
                        drawTableEntry();
                        drawTableEntry();
                        drawTableEntry();
                        drawTableEntry();
                        drawTableEntry();
                        drawTableEntry();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
<?php

function drawTableEntry()
{
?>

    <tr>
        <td class="align-middle text-center">12333</>
        <td class="align-middle text-center">Rita Mota</td>
        <td class="align-middle text-center">26/05/18</td>
        <td class="align-middle text-center">Offensive Towards Others</td>
        <td class="align-middle text-center "><a class="text-black" href="#">ARE YOU RETARDED??</a></td>
        <td class="align-middle text-center">The answer is very rude and has no actual asnwer to the question asked</td>
        <td class="align-middle text-center ">
            <button class="btn text-danger">Delete</button>
            <button class="btn text-success">Keep</i></button>
        </td>
    </tr>

<?php } ?>