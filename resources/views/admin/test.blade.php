@extends("layouts.admin")

@section("sidebar")
    @include("admin.sidebar")
@endsection

@section("toolbar")
    @include("admin.toolbar")
@endsection

@section("content")
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">{{ $title }}</h4>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->

    </div><!-- container -->
@endsection

@section("footer")
    @include("admin.footer")
@endsection
