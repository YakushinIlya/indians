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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route("admin.news.add") }}" class="btn btn-primary mb-3 text-white" id="submit_data">Добавить новость</a>
                        <a href="{{ route("admin.rubrics.add") }}" class="btn btn-primary mb-3 text-white" id="submit_data">Добавить раздел новости</a>
                        <div class="table-responsive">
                            <table class="table  table-bordered" id="makeEditable">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Заголовок</th>
                                    <th>ЧПУ</th>
                                    <th name="buttons"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($rubrics as $rubric)
                                        <tr>
                                            <td>{{ $rubric->id }}</td>
                                            <td>{{ $rubric->title }}</td>
                                            <td>{{ $rubric->slug }}</td>
                                            <td name="buttons">
                                                <div class="d-flex">
                                                    <a href="{{ route("admin.rubrics.edit", ["id"=>$rubric->id]) }}" class="btn btn-primary mr-1"><i class="dripicons-pencil"></i></a>
                                                    <form action="{{ route("admin.rubrics.delete", ["id"=>$rubric->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button role="submit" class="btn btn-danger"><i class="dripicons-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {!! $rubrics->links('pagination::bootstrap-4') !!}

                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div>

    </div><!-- container -->
@endsection

@section("footer")
    @include("admin.footer")
@endsection
