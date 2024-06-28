@extends("layouts.app")

@section("content")
    <div class="row catalog pt-5 pb-5">

        <div class="col-12 d-flex mb-5">
            <div class="breadcrumbs">
                <a href="{{ route("catalog.index") }}">Каталог</a>{{-- <span> - </span> <a href="">Кальяны</a> <span> - </span> <a href="">Streetwirbaku</a>--}}
            </div>
            <div class="sorting ml-auto">
                <div class="btn-group">
                    <select class="form-select">
                        <option selected disabled>В любом магазине</option>
                        @foreach(Shops::getAllData(["id", "name"]) as $shop)
                            <option value="{{$shop->id}}">{{$shop->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="btn-group">
                    <select class="form-select">
                        <option value="1">Сначала дешевле</option>
                        <option value="2">Сначала дороже</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <aside class="p-4">
                <form action="" method="get">
                    @csrf
                    <h2 class="h4">Цена</h2>
                    <div class="d-flex justify-content-around mw-100">
                        <div>
                            <input type="number" placeholder="от 2700" class="w-100" size="4">
                        </div>
                        <div>
                            <span class="w-auto m-auto"> - </span>
                        </div>
                        <div>
                            <input type="number" placeholder="до 27000" class="w-100" size="5">
                        </div>
                    </div>

                    <div class="">
                        <hr>
                    </div>

                    <h2 class="h4">Каталог</h2>
                    <ul class="filter-category">
                        @foreach($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{route("catalog.category", ["category"=>$category->sbis_id])}}">{{$category->title}}</a>
                                {{--<span>2</span>--}}
                            </li>
                        @endforeach
                    </ul>
                    <div class="@if(!isset($_GET['_token'])) d-none @endif allFilters">
                        <h2 class="h4">Производитель</h2>
                        <ul class="filter">
                            @foreach($fabricator as $fabr)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <input type="checkbox" name="fabricator[{{$fabr->id}}]" id="maker-{{$fabr->id}}" value="{{$fabr->id}}" class="d-none" @if(isset($_GET['fabricator']) && array_key_exists($fabr->id, $_GET['fabricator'])) checked @endif>
                                    <label for="maker-{{$fabr->id}}">{{$fabr->value}}</label> {{--<span>14</span>--}}
                                </li>
                            @endforeach
                        </ul>
                        <div class="">
                            <hr>
                        </div>

                        <h2 class="h4">Размер</h2>
                        <ul class="filter">
                            @foreach($sizes as $size)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <input type="checkbox" name="size[{{$size->id}}]" id="maker-{{$size->id}}" value="{{$size->id}}" class="d-none"@if(isset($_GET['size']) && array_key_exists($size->id, $_GET['size'])) checked @endif>
                                    <label for="maker-{{$size->id}}">{{$size->value}}</label> {{--<span>14</span>--}}
                                </li>
                            @endforeach
                        </ul>

                        <div class="">
                            <hr>
                        </div>

                        <h2 class="h4">Материал</h2>
                        <ul class="filter">
                            @foreach($materials as $material)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <input type="checkbox" name="material[{{$material->id}}]" id="maker-{{$material->id}}" value="{{$material->id}}" class="d-none"@if(isset($_GET['material']) && array_key_exists($material->id, $_GET['material'])) checked @endif>
                                    <label for="maker-{{$material->id}}">{{$material->value}}</label> {{--<span>14</span>--}}
                                </li>
                            @endforeach
                        </ul>
                        <button type="submit" class="btn btn-orange w-100 mt-2">Применить фильтры</button>
                    </div>
                </form>
            </aside>

            <div class="btn btn-outline-secondary w-100 mt-2" id="showAllFilters">Показать все фильтры</div>
            <div class="btn btn-outline-secondary w-100 mt-2">Сбросить все фильтры</div>
        </div>

        <div class="col-md-9">
            <article>
                <div class="row catalog-items">
                    @auth
                        @php($userId=auth()->user()->id)
                    @endauth
                    @foreach($products as $product)
                        <div class="col-md-4 mb-3 catalog-item">
                            <div class="bg-white border-1 rounded-left-bottom-10">
                                <div class="img" style="height: 312px; text-align: center;">
                                    <a href="{{ route("catalog.product", ["id"=>$product->id]) }}">
                                        @foreach(json_decode($product->images) as $img)
                                            <img src="/upload/product/image/{{ $img }}" alt="" class="img-fluid rounded-top-10">
                                        @endforeach
                                    </a>
                                </div>
                                <div class="d-flex">
                                    <div class="p-3 rounded-left-bottom-10">
                                        <span class="price">{{ $product->price }}₽</span>
                                        <br>
                                        <a href="{{ route("catalog.product", ["id"=>$product->id]) }}">
                                            <span class="name" style="font-size: 14px;">{{ \Illuminate\Support\Str::limit($product->title, 42, $end='...') }}</span>
                                        </a>
                                    </div>
                                    @guest
                                        <div class="btn-basket ml-auto text-center align-middle p-4 bg-orange rounded-right-bottom-10" role="button" data-bs-toggle="modal" href="#modalAuth">
                                            <img src="/media/images/icon/add-basket.png" alt="" class="img-fluid">
                                        </div>
                                    @endguest
                                    @auth
                                        <div class="btn-basket ml-auto text-center align-middle p-4 bg-orange rounded-right-bottom-10" onclick="productToBasket({{$product->price}}, {{$product->id}}, {{$userId??0}}) ">
                                            <img src="/media/images/icon/add-basket.png" alt="" class="img-fluid">
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-3 text-center align-content-center">
                        {!! $products->links("vendor.pagination.default") !!}
                    </div>
                </div>

            </article>
        </div>

    </div>
@endsection
