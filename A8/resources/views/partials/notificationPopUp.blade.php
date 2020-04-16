<div class="text-black bg-white border notifications" id="notifications">
    <div class="text-center d-flex ">
        <h5 class="mx-auto mt-2"><i class="fa fa-bell "><span> Notifications </span></i></h5>
        <a onclick="close_notifications()" class="close btn mb-auto p-0">&times;</a>
    </div>
    <div class="container-fluid border  p-0">
        <div class="d-inline-block pt-2">
        @yield('notification')

        </div>
    </div>
</div>