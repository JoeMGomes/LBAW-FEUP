<?php

function drawReport()
{?>
<button type="button" class="btn text-secondary" data-toggle="modal" data-target="#report">
    <a href="#" class=" text-black"><i class="fa fa-flag"></i> Report</a>
</button>

<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" ole="document">
        <div class="text-left rounded bg-mygrey d-flex flex-column p-5 modal-content">
            <h3 class="">What is wrong?</h3>
            <form class="d-flex flex-column align-items-start">
                <label><input type="radio" id="language" name="report" value="male"> Innapropriate
                    language</label>
                <label><input type="radio" id="offensive" name="report" value="male"> Offensive
                    towards
                    others</label>
                <label><input type="radio" id="other" name="report" value="male"> Other</label>
                <div class="d-flex flex-column w-100">
                    <label>Describe the problem</label>
                    <textarea rows="2" class="form-control rounded border resize-none"></textarea>
                </div>
                <button type="submit" class="btn bg-myyellow rounded ml-auto mt-4">Send Report</button>
            </form>
        </div>
    </div>
</div>

<?php }

function drawNotificationPopUp()
{
    ?>
<div class="text-black bg-white border notifications" id="notifications">
    <div class="text-center d-flex ">
        <h2 class="mx-auto mt-2"><i class="fa fa-bell "><span class="ml-auto">Notifications </span></i></h2>
        <a onclick="close_notifications()" class="close btn mb-auto p-0">&times;</a>
    </div>
    <div class="container-fluid border  p-0">
        <div class="d-inline-block pt-2">
            <?php
drawNotification();
    drawNotification();
    drawNotification();
    drawNotification();
    drawNotification();
    drawNotification();
    drawNotification();
    drawNotification();
    drawNotification();
    drawNotification();

    ?>
        </div>
    </div>
</div>

<?php }

function drawNotification()
{
    ?>

<div class=" d-flex justify-content-start notifications mb-3 px-2">
    <i class="fa fa-circle pt-3 pr-2" style="color: #7a86ef"></i>
    <span>3 users answered your question: "<strong>HOW DO I WASH MY YELLOW JACKET?</strong>"
        <div class="text-left pl-4">
            5m ago
        </div>
    </span>
</div>

<?php }?>