@extends('template.default')
@section('title')
My Blog
@endsection
@section('head')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>MySchool</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="/assets/img/favicon.png" rel="icon">
<link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="/assets/css/style.css" rel="stylesheet">

<!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrasp v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">My Blog</li>
                        </ol>
                    </nav>
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div>
                @foreach($blog as $data)
                <div id="cardbook" class="card border m-4">
                    <div class="card-body">
                        <div class="row mt-4">
                            <div class="col-lg m-1 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <h2><strong> {{ $data->title }} </strong></h2>
                                    </div>
                                </div>
                                <h6><span> {{ $data->name }} </span></h6>
                            </div>
                        </div>
                        <h5 class="mt-2">Content</h5>
                        <p>{{ $data->content }}</p>
                        <div class="row">
                            <div class="col-6">
                                <form action="/showblog/{{ $data->id }}" method="get">
                                    <button type="submit" class="btn btn-primary btn-sm"><i></i>show
                                    </button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form class="d-inline" action="/delete/{{ $data->id }}" method="post" style="float:inline-end">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="url" value="{{ URL::current() }}">
                                    <button type="submit" class="btn btn-danger btn-sm" id="btn-delete"><i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col">
                            <form action="/updateget/{{ $data->id }}" method="get">
                                <button type="submit" class="btn btn-success btn-sm" style="float:inline-end"><i class="bx bxs-pencil"></i>
                                </button>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /.content -->
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });

        $('.dropdown-toggle').dropdown();
    </script>



    @endsection