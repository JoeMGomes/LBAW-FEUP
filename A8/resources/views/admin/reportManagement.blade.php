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
        <div class="py-4 px-5  ">
            <h1> Administration</h1>
            @include('partials.admin.adminHead')

            <div class="table-responsive">
                <h5>Pending Reports</h5>
                <table class="table table-bordered table-striped fixed-header">
                    <thead class="">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Offender</th>
                            <th scope="col">Date</th>
                            <th scope="col">Type</th>
                            <th scope="col">Post</th>
                            <th scope="col">Offense</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach($reports as $report)
                            @include('partials.admin.reportEntry',['report' => $report])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    @endsection