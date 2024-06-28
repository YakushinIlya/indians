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
                        <form action="{{ route("admin.news.create") }}" method="post" id="sbisProductCategoryForm">
                            @csrf
                            <div class="form-group">
                                <label for="title">Сколько товаров обновить или добавить?</label>
                                <select class="form-control" name="count">
                                    <option selected disabled>-- Выберите количество --</option>
                                        <option value="10">10</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">С какой страницы это сделать?</label>
                                <select class="form-control" name="page">
                                    <option selected disabled>-- Выберите страницу --</option>
                                    @for($i=0; $i<500; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <button type="submit" name="sub" class="btn btn-primary">Добавить/Обновить</button>
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
