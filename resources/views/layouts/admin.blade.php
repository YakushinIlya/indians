<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>ADM - {{ $title??"Admin Panel" }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset("media/admin/assets/images/favicon.ico") }}">

    <!-- jvectormap -->
    <link href="{{ asset("media/admin/plugins/jvectormap/jquery-jvectormap-2.0.2.css") }}" rel="stylesheet">

    <link href="{{ asset("media/admin/plugins/dropify/css/dropify.min.css") }}" rel="stylesheet">

    <!-- App css -->
    <link href="{{ asset("media/admin/assets/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css") }}" />
    <link href="{{ asset("media/admin/assets/css/jquery-ui.min.css") }}" rel="stylesheet">
    <link href="{{ asset("media/admin/assets/css/icons.min.css") }}" rel="stylesheet" type="text/css") }}" />
    <link href="{{ asset("media/admin/assets/css/metisMenu.min.css") }}" rel="stylesheet" type="text/css") }}" />
    <link href="{{ asset("media/admin/plugins/daterangepicker/daterangepicker.css") }}" rel="stylesheet" type="text/css") }}" />
    <link href="{{ asset("media/admin/assets/css/app.min.css") }}" rel="stylesheet" type="text/css") }}" />
    <style>
        .btn-gender input[type=radio]:checked + label {
            background: rgb(48, 62, 103);
            color: #ffffff;
        }
    </style>

</head>

<body class="dark-sidenav">

<!-- Left Sidenav -->
<div class="left-sidenav">
    @yield("sidebar");
</div>
<!-- end left-sidenav-->

<div class="page-wrapper">
    <!-- Top Bar Start -->
    {{--<div class="topbar">
        @yield("toolbar")
    </div>--}}
    <!-- Top Bar End -->

    <!-- Page Content-->
    <div class="page-content">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {!! session('status') !!}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning" role="alert">
                {!! session('warning') !!}
            </div>
        @endif

        @yield("content")

        {{--@yield("footer")--}}
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->



<!-- jQuery  -->
<script src="{{ asset("media/admin/assets/js/jquery.min.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
<script>
    $.fn.setCursorPosition = function(pos) {
        if ($(this).get(0).setSelectionRange) {
            $(this).get(0).setSelectionRange(pos, pos);
        } else if ($(this).get(0).createTextRange) {
            var range = $(this).get(0).createTextRange();
            range.collapse(true);
            range.moveEnd('character', pos);
            range.moveStart('character', pos);
            range.select();
        }
    };
    $("input[name=phone]").click(function(){
        $(this).setCursorPosition(3);
    }).mask("+7(999)999-9999");
</script>
<script src="{{ asset("media/admin/assets/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("media/admin/assets/js/metismenu.min.js") }}"></script>
<script src="{{ asset("media/admin/assets/js/waves.js") }}"></script>
<script src="{{ asset("media/admin/assets/js/feather.min.js") }}"></script>
<script src="{{ asset("media/admin/assets/js/simplebar.min.js") }}"></script>
<script src="{{ asset("media/admin/assets/js/jquery-ui.min.js") }}"></script>
<script src="{{ asset("media/admin/assets/js/moment.js") }}"></script>
<script src="{{ asset("media/admin/plugins/daterangepicker/daterangepicker.js") }}"></script>


<script src="{{ asset("media/admin/plugins/tinymce/tinymce.min.js") }}"></script>

<!-- App js -->
<script src="{{ asset("media/admin/assets/js/app.js") }}"></script>

<script src="{{ asset("/media/js/main.js") }}"></script>

</body>

</html>
