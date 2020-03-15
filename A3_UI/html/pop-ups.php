<?php

function drawReport()
{ ?>

    <div class="text-left m-auto w-25 rounded bg-mygrey d-flex flex-column">
        <h3 class="px-2">what is wrong?</h3>
        <form class="d-flex flex-column align-items-start p-2 pb-4 m-auto">
            <label><input type="radio" id="language" name="report" value="male"> Innapropriate language</label>
            <label><input type="radio" id="offensive" name="report" value="male"> Offensive towards others</label>
            <label><input type="radio" id="other" name="report" value="male"> Other</label>
            <div class="d-flex flex-column">
                <label>Describe the problem</label>
                <textarea rows="2" class="w-100 form-control rounded border resize-none"></textarea>
            </div>
            <button type="submit" class="btn tag-yellow ml-auto rounded mt-4">Send Report</button>
        </form>
    </div>

<?php } ?>

<?php

function drawNotificationPopUp()
{
?>
    <div class="text-center">
        <h2><i class="fa fa-bell"></i><span class="px-3">Notifications</span></h2>
    </div>
    <section class="container-fluid border w-25 h-50 overflow-auto p-0">
        <div class="d-inline-block pt-2">
            <?php 
            
            drawNotification();
            drawNotification();
            drawNotification();
            drawNotification();
            ?>
            
        </div>
    </section>

<?php } 


function drawNotification(){
    ?>

<div class="d-flex justify-content-start notifications mb-3 px-2">
                <i class="fa fa-circle pt-3 pr-2" style="color: #7a86ef"></i>
                <span>3 users answered your question: "<strong>HOW DO I WASH MY YELLOW JACKET?</strong>"
                    <div class="text-left pl-4">
                        5m ago
                    </div>
                </span>
            </div>

<?php } ?>