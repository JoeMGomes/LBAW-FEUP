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
    <h1 class=" py-2 px-4"> Administration</h1>
    <div class="container px-4">
        @include('partials.admin.adminHead')

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
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                    @include('partials.admin.reportEntry')
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
