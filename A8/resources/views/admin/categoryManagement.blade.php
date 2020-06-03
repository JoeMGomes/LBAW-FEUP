@extends('layouts.default')

@section('title')
<title>GROW Adminstration - Category Management</title>
@endsection

@section('bodyTag')

<body class="container-fluid vh-100 m-0 p-0 ">
    @endsection

    @section('main')
    @include('partials.navBarTop')
    <main id="main" class="ml-lg-auto col-lg-10 align-right ">
        <div class="py-4 px-5 ">
            <h1> Administration</h1>

            @include('partials.admin.adminHead')

            <div>
                <form action="{{ route('addCat') }}" method="POST">
                    @csrf
                    <h5>Create New Category</h5>
                    <div class="row">
                        <div class="form-group w-25 col-md-5">
                            <label for="inputCat">Category Name</label>
                            <input type="text" name="inputCat" id="inputCat" class="form-control" required >
                        </div>
                        <div class="form-group col-2">
                            <label class="row" for="color-picker">Category Color</label>
                            <label class="pl-5 row" id="color-picker-wrapper" for="color-picker">
                                <input type="color" value="#5962AE" name="color-picker" id="color-picker">
                            </label>
                        </div>
                        <div class="form-group  col-2">
                            <label for="color-picker">Preview</label><br>
                            <label id="newCatPreview" class="tag my-1">&nbsp;</label>
                        </div>
                    </div>
                    <button type="submit" class="btn bg-mydarkgreen text-white mx-3 mb-4">Submit</button>
                </form>
            </div>
            <div>
                <form method="POST" action={{route('modCat')}}>
                    @csrf
                    <h5>Edit Category</h5>
                    <div class="form-group w-25">
                        <input class="form-control" name="categoryEdit" id="categoryEdit" autocomplete="off" list="tags"
                            placeholder="Type Category Name">
                        <datalist id="tags">

                        </datalist>
                    </div>
                    <div class="row">
                        <input hidden name="catId" id="catId">
                        <div class="form-group w-25 col-md-5">
                            <label for="inputCatEdit">New Category Name</label>
                            <input type="text" id="inputCatEdit" name="inputCatEdit" class="form-control" required >
                        </div>
                        <div class="form-group col-2">
                            <label class="row" for="color-pickerEdit">Category Color</label>
                            <label class="pl-5 row" id="color-picker-wrapperEdit" for="color-pickerEdit">
                                <input type="color" value="#000000" name="color-pickerEdit" id="color-pickerEdit">
                            </label>
                        </div>
                        <div class="form-group  col-2">
                            <label>Preview</label><br>
                            <label id="newCatPreviewEdit" class="tag mx-md-2 my-1 bg-myred">&nbsp;</label>
                        </div>
                    </div>
                    <button type="submit" name="editButton" class="btn bg-mydarkgreen text-white mx-3 mb-4">Edit</button>
                    <button type="submit" name="deleteButton" class="btn tag-orange text-white mx-3 mb-4">Remove</button>
                </form>
            </div>
        </div>
    </main>

    @endsection