@extends('layouts.default')

@section('title')
<title>GROW - User Settings</title>
@endsection


@section('bodyTag')

<body class="container-fluid vh-100 m-0 p-0">
    @endsection

    @section('main')
    <main id="main" class="ml-lg-auto col-lg-10 align-right">
        <h1 class=" py-2 px-5 ml-3"> Settings</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-5 justify-content-center">
                    <form method="POST" action="{{route('editPassword')}}" class="px-5">
                        {{ csrf_field() }}
                        <h5>Change password </h5>
                        <input type="hidden" id="emailPass" name="emailPass" value="{{Auth::user()->email}}">
                        <div class="form-group">
                            <label for="oldPassword">current password</label>
                            <input type="password" name="oldPassword" id="oldPassword" class="form-control" required
                                autofocus>
                        </div>
                        <div class="form-group">
                            <label class="float-left" for="inputPasswordNew ">new password</label>
                            <input type="password" name="inputPasswordNew" id="inputPasswordNew" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="float-left" for="inputPasswordTwo">confirm new password</label>
                            <input type="password" name="inputPasswordTwo" id="inputPasswordTwo" class="form-control"
                                required>
                        </div>
                        <button class="mb-4 btn btn-primary border-0 bg-mygreen float-right" type="submit">
                            Confirm Changes
                        </button>
                    </form>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <form method="POST" action="{{route('editUsername')}}" class="px-5">
                        {{ csrf_field() }}
                        <input type="hidden" id="emailName" name="emailName" value="{{Auth::user()->email}}">
                        <h5>Change username</h5>
                        <div class="form-group">
                            <label class="float-left" for="newUsername ">new username</label>
                            <input type="text" id="newUsername" name="newUsername" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="namePassword">password</label>
                            <input type="password" id="namePassword" name="namePassword" class="form-control" required >
                        </div>
                        <button class="mb-4 btn btn-primary border-0 bg-mygreen float-right" type="submit">Confirm
                            Changes</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <form method="POST" action="{{route('editEmail')}}" class="px-5">
                        {{ csrf_field() }}
                        <input type="hidden" id="emailEmail" name="emailEmail" value="{{Auth::user()->email}}">
                        <h5>Change e-mail </h5>
                        <div class="form-group">
                            <label><b>current email:</b> {{Auth::user()->email}}</label><br>
                            <label for="inputEmail">new e-mail</label>
                            <input type="email" name="inputEmail" id="inputEmail" class="form-control" required
                                autofocus">
                        </div>
                        <div class="form-group">
                            <label class="float-left" for="passwordEmail">password</label>
                            <input type="password" name="passwordEmail" id="passwordEmail" class="form-control" required>
                        </div>
                        <button class="mb-4 btn btn-primary border-0 bg-mygreen float-right" type="submit">Confirm
                            Changes</button>
                    </form>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <form class="px-5 " action="{{ route('uploadImage') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <h5> Change picture </h5>
                            <div class="file-field ">
                                <div class="mb-4 d-md-flex">
                                    <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                        class="rounded-circle z-depth-1-half avatar-pic " width=80px height="80px"
                                        alt="example placeholder avatar">
                                    <div class="mt-2 ml-2 d-md-flex flex-column">
                                        <span>Add photo</span>
                                        <input class="mb-5" name="image" type="file">
                                    </div>
                                </div>
                            </div>
                            <button class="mb-4 btn btn-primary border-0 bg-mygreen float-right" type="submit">Confirm
                                Changes</button>
                        </form>
                    </div>
                    <div class="">
                        <div class="px-5 ">
                            <form method="POST" action="{{route('deleteAccount') }}" onsubmit=" return confirm('Are you sure you want to delete your account? This action is permanent')">
                                {{ csrf_field() }}
                                <button  class="btn tag-orange text-white">Delete account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection