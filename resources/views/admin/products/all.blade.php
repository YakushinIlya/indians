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
                        <a href="{{ route("admin.products.add") }}" class="btn btn-primary mb-3 text-white" id="submit_data">Добавить/Обновить товары</a>
                        <div class="table-responsive">
                            <table class="table  table-bordered" id="makeEditable">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>#ID СБИС</th>
                                    <th>Код товара</th>
                                    <th>Изображение</th>
                                    <th>Заголовок</th>
                                    <th name="buttons"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->sbis_id }}</td>
                                            <td>{{ $product->article }}</td>
                                            <td>
                                                @if($product->images)
                                                    @foreach(json_decode($product->images) as $img)
                                                        <img src="/storage/images/products/{{ $img }}" alt="" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{ $product->title }}</td>
                                            <td name="buttons">
                                                <div class="d-flex">
                                                    <form action="{{ route("admin.products.delete", ["id"=>$product->id]) }}" method="post">
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

                        {!! $products->links('pagination::bootstrap-4') !!}

                        <hr class="mt-5 mb-5">

                        <form action="{{ route("admin.products.delete-all") }}" method="post" class="mt-5">
                            @csrf
                            @method('DELETE')
                            <button role="submit" class="btn btn-danger"><i class="dripicons-trash"></i> Удалить все товары</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div>

    </div><!-- container -->
@endsection

@section("footer")
    @include("admin.footer")
@endsection
