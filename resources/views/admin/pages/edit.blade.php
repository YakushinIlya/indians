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
                        <form action="{{ route("admin.pages.update", ["id"=>$page->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" name="title" value="{{ $page->title }}" class="form-control" id="title" placeholder="Заголовок страницы">
                            </div>
                            <div class="form-group">
                                <label for="cpu">ЧПУ</label>
                                <input type="text" name="slug" value="{{ $page->slug }}" class="form-control" id="cpu" placeholder="URL ссылка страницы (stranica-kontakty)">
                            </div>
                            <div class="form-group">
                                <label for="content">Текст cnстраницы</label>
                                <textarea id="elm1" name="content">{{ $page->content }}</textarea>
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
