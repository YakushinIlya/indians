@extends("layouts.app")

@section("content")
    <form action="{{route("basket.details")}}" method="post">
        @csrf
        <div class="row pt-5 pb-5">

            <div class="col-12 mb-5">
                <div class="pb-2">
                    <h1>Корзина товаров: <span id="h1-count">{{count($products)}}</span>шт.</h1>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="basketSelectAll" value="option1">
                        <label class="form-check-label" for="basketSelectAll">Выбрать все</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <div class="form-check-label text-dark text-decoration-none cursor-pointer" for="inlineCheckbox2" onclick="basketDeleteAll();">
                            <img src="/media/images/icon/trash.png" alt="" class="img-fluid" id="inlineCheckbox2">
                            Удалить
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row basket_shop-items">

                    @foreach($products as $product)
                        <div class="col-12 basket_shop-item col bg-white rounded-10 w-100 p-3 mb-3" id="product-{{$product->id}}">
                            <div class="row">
                                <div class="p-2 col-md-3">
                                    @foreach(json_decode($product->images) as $img)
                                        <img src="/upload/product/image/{{ $img }}" alt="" class="img-fluid basket-img">
                                        @break
                                    @endforeach
                                </div>
                                <div class="p-2 col-md-8">
                                    <a href="{{ route("catalog.product", ["id"=>$product->id]) }}" class="text-dark text-decoration-none">
                                        <h3 class="h5 mb-3">{{$product->title}}</h3>
                                    </a>
                                    <h4 class="mt-1 text-orange">
                                        {{$product->price}}Р
                                    </h4>
                                    {{--<div class="h-40px old-price text-secondary">
                                        <span class="position-relative">9000Р</span>
                                    </div>--}}
                                    <div class="d-flex flex-row">
                                        <div class="bg-white w-150px h-40px">
                                            <input type="number" name="productCount[{{$product->id}}]" value="1" min="0" max="1000" step="1" id="countProduct" onchange="basketCountProduct({{$product->id}});">
                                        </div>
                                        <div class="bg-white border-secondary border-1 rounded-10 ml-10px p-7-10 cursor-pointer" onclick="basketTrash({{$product->id}}, {{$userId}});">
                                            <img src="/media/images/icon/trash.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 col-md-1">
                                    <input class="form-check-input" type="checkbox" name="product[{{$product->id}}]" id="inlineCheckbox-{{$product->id}}" value="{{$product->id}}">
                                </div>
                            </div>
                        </div>
                        @php($sum += $product->price)
                    @endforeach

                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-lg btn-orange w-100">Перейти к оформлению</button>
                <div class="bg-white rounded-10 p-3 d-flex justify-content-between w-100 mt-3">
                    <div>
                        Итого
                    </div>
                    <div>
                        <span id="basket-sum">{{$sum}}</span>Р
                    </div>
                </div>
                <div class="text-secondary">
                    Хотите купить дешевле?<br>
                    <a href="#" class="text-orange text-decoration-none">Получить скидку</a>
                </div>
            </div>

        </div>
    </form>
@endsection
