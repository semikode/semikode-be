<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ !empty($title_page) ? $title_page : env('APP_NAME', 'SemiKode') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="admin semikode" name="keywords" />
    <meta content="semikode" name="description" />
    <meta name="author" content="semikode">
    <meta name="csrf-token" content="">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/node_modules/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatable/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/node_modules/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/jquery-toast-plugin/dist/jquery.toast.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css')}}">
    <!-- endinject -->
    <!-- icon -->
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">
    <!-- endicon-->
  @yield('css')
</head>
