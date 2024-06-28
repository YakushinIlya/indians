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

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route("admin.rubrics.create") }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок раздела новости">
                            </div>
                            <div class="form-group">
                                <label for="cpu">ЧПУ</label>
                                <input type="text" name="slug" class="form-control" id="cpu" placeholder="URL ссылка раздела новости (novost-novaya-razdel)">
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div>

    </div><!-- container -->
@endsection

@section("footer")
    @include("admin.footer")
@endsection
