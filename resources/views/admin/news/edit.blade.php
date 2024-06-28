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
                        <form action="{{ route("admin.news.update", ["id"=>$new->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Раздел новости</label>
                                <select class="form-control" name="rubric">
                                    <option selected disabled>-- Выберите раздел новости --</option>
                                    @foreach($rubrics as $rubric)
                                        <option value="{{ $rubric->id }}">{{ $rubric->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" name="title" value="{{ $new->title }}" class="form-control" id="title" placeholder="Заголовок новости">
                            </div>
                            <div class="form-group">
                                <label for="cpu">ЧПУ</label>
                                <input type="text" name="slug" value="{{ $new->slug }}" class="form-control" id="cpu" placeholder="URL ссылка новости (novost-novaya)">
                            </div>
                            <div class="form-group">
                                <label for="content">Текст новости</label>
                                <textarea id="elm1" name="content">{{ $new->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-file mb-3">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Выберите изображение для новости</label>
                                </div>
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
