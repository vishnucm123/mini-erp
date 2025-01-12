<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Admin</title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- Custom fonts for this template-->
    <link
        href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}"
        rel="stylesheet"
        type="text/css"
    />
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin.css') }}" rel="stylesheet"/>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->

@include('layout.navbar')






<div class="content-wrapper">

    {{-- @yield('content') --}}
    <!-- /.container-fluid-->
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <!-- Ongoing Tasks Box -->
            {{-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row justify-content-center">

                            <div class="col-12">
                                <h5 class="text-uppercase text-muted mb-0 text-center"></h5>
                                <span class="h2 font-weight-bold mb-0 d-block text-center"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed Tasks Box -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-7">
                                <h5 class="text-uppercase text-muted mb-0 text-center"></h5>
                                <span class="h2 font-weight-bold mb-0 d-block text-center"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Total Users Box -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-7">
                                <h5 class="text-uppercase text-muted mb-0 text-center">Total customers</h5>
                                <span class="h2 font-weight-bold mb-0 d-block text-center">{{$customers ?? ''}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Tasks Box -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-7">
                                <h5 class="text-uppercase text-muted mb-0 text-center">Total invoices</h5>
                                <span class="h2 font-weight-bold mb-0 d-block text-center">{{$invoices ?? 0}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper-->
    @include('layout.footer')
    <!-- Scroll to Top Button-->

    </div>
</div>
</body>
</html>


