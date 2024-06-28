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
                        <div class="table-responsive">
                            <table class="table  table-bordered" id="makeEditable">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>#ID раздела</th>
                                    <th>#ID родителя</th>
                                    <th>Заголовок</th>
                                    <th name="buttons"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->sbis_id }}</td>
                                            <td>{{ $category->sbis_id_parent }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td name="buttons">
                                                <div class="d-flex">
                                                    <form action="{{ route("admin.categories.delete", ["id"=>$category->id]) }}" method="post">
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

                        {!! $categories->links('pagination::bootstrap-4') !!}

                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div>

    </div><!-- container -->
@endsection

@section("footer")
    @include("admin.footer")
@endsection
