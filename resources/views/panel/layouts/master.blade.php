<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alpha Dev Logger</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    @stack('styles')
</head>
<body>
<div class="wrapper p-5">
    <div class="content-header mb-3">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{config('logger-alpha.panel.go_back_route')}}">← Go Back</a>
                        </li>
                        @yield('breadcrumb')
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>

    <footer class="main-footer ml-0 mt-5">
        <strong><a href="https://github.com/vascovitche/alpha-dev-logger">AlphaDevTeam</a>. Logger.</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>
</div>

</body>
</html>
