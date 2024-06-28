@extends("layouts.app")

@section("content")
    <div class="row lk mt-5">
        <div class="col-12 mb-3">
            <div class="pb-2">
                <h1>Добрый день, {{ $user->fio }}!</h1>
            </div>
        </div>

        <div class="col-md-9">
            <div class="bg-white border-1 rounded-10 p-4 row justify-content-between">
                <div class="col">
                    <a href="{{ route("lk.index") }}" class="btn btn-lg btn-outline-secondary w-100">Профиль</a>
                </div>
                <div class="col">
                    <a href="{{ route("lk.history") }}" class="btn btn-lg btn-outline-secondary w-100 active">История заказов</a>
                </div>
                <div class="col">
                    <a href="{{ route("lk.sales") }}" class="btn btn-lg btn-outline-secondary w-100">Скидочная система</a>
                </div>
                @role("admin")
                    <div class="col-12 mt-3">
                        <a href="{{ route("admin.index") }}" target="_blank" class="btn btn-lg btn-danger w-100">Админ панель</a>
                    </div>
                @endrole
            </div>
        </div>

        @if(isset($order) && !empty($order))

        @else
            <div class="col-md-9 mt-5">
                <h1>У вас еще не было заказов</h1>
                <p>А чтобы их сделать, загляните в каталог<br>
                    или в раздел со скидками</p>
                <a href="{{route('catalog.index')}}" class="btn btn-lg btn-orange">В каталог</a>
            </div>
        @endif

    </div>

    <div class="row mt-5">
        <div class="col-md-12 mb-3">
            <h2>Вы недавно смотрели</h2>
        </div>
        <div class="col-md-3 mb-3 catalog-item">
            <div class="bg-white border-1 rounded-left-bottom-10">
                <div class="img" style="height: 312px; text-align: center;">
                    <a href="http://lara-indians.loc/catalog/product/217">
                        <img src="/storage/images/products/img-8O2OftOWZmVZXkDkamZy.png" alt="" class="img-fluid rounded-top-10">
                        <img src="/storage/images/products/img-cmJAAkHIPDmQiWdYxxp9.png" alt="" class="img-fluid rounded-top-10">
                    </a>
                </div>
                <div class="d-flex">
                    <div class="p-3 rounded-left-bottom-10">
                        <span class="price">310₽</span>
                        <br>
                        <a href="http://lara-indians.loc/catalog/product/217">
                            <span class="name" style="font-size: 14px;">Сменный испаритель VAPORESSO GTX V2 0.2 Me...</span>
                        </a>
                    </div>
                    <div class="btn-basket ml-auto text-center align-middle p-4 bg-orange rounded-right-bottom-10" onclick="productToBasket(310, 217, 2) ">
                        <img src="/media/images/icon/add-basket.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3 catalog-item">
            <div class="bg-white border-1 rounded-left-bottom-10">
                <div class="img" style="height: 312px; text-align: center;">
                    <a href="http://lara-indians.loc/catalog/product/217">
                        <img src="/storage/images/products/img-8O2OftOWZmVZXkDkamZy.png" alt="" class="img-fluid rounded-top-10">
                        <img src="/storage/images/products/img-cmJAAkHIPDmQiWdYxxp9.png" alt="" class="img-fluid rounded-top-10">
                    </a>
                </div>
                <div class="d-flex">
                    <div class="p-3 rounded-left-bottom-10">
                        <span class="price">310₽</span>
                        <br>
                        <a href="http://lara-indians.loc/catalog/product/217">
                            <span class="name" style="font-size: 14px;">Сменный испаритель VAPORESSO GTX V2 0.2 Me...</span>
                        </a>
                    </div>
                    <div class="btn-basket ml-auto text-center align-middle p-4 bg-orange rounded-right-bottom-10" onclick="productToBasket(310, 217, 2) ">
                        <img src="/media/images/icon/add-basket.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3 catalog-item">
            <div class="bg-white border-1 rounded-left-bottom-10">
                <div class="img" style="height: 312px; text-align: center;">
                    <a href="http://lara-indians.loc/catalog/product/217">
                        <img src="/storage/images/products/img-8O2OftOWZmVZXkDkamZy.png" alt="" class="img-fluid rounded-top-10">
                        <img src="/storage/images/products/img-cmJAAkHIPDmQiWdYxxp9.png" alt="" class="img-fluid rounded-top-10">
                    </a>
                </div>
                <div class="d-flex">
                    <div class="p-3 rounded-left-bottom-10">
                        <span class="price">310₽</span>
                        <br>
                        <a href="http://lara-indians.loc/catalog/product/217">
                            <span class="name" style="font-size: 14px;">Сменный испаритель VAPORESSO GTX V2 0.2 Me...</span>
                        </a>
                    </div>
                    <div class="btn-basket ml-auto text-center align-middle p-4 bg-orange rounded-right-bottom-10" onclick="productToBasket(310, 217, 2) ">
                        <img src="/media/images/icon/add-basket.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3 catalog-item">
            <div class="bg-white border-1 rounded-left-bottom-10">
                <div class="img" style="height: 312px; text-align: center;">
                    <a href="http://lara-indians.loc/catalog/product/217">
                        <img src="/storage/images/products/img-8O2OftOWZmVZXkDkamZy.png" alt="" class="img-fluid rounded-top-10">
                        <img src="/storage/images/products/img-cmJAAkHIPDmQiWdYxxp9.png" alt="" class="img-fluid rounded-top-10">
                    </a>
                </div>
                <div class="d-flex">
                    <div class="p-3 rounded-left-bottom-10">
                        <span class="price">310₽</span>
                        <br>
                        <a href="http://lara-indians.loc/catalog/product/217">
                            <span class="name" style="font-size: 14px;">Сменный испаритель VAPORESSO GTX V2 0.2 Me...</span>
                        </a>
                    </div>
                    <div class="btn-basket ml-auto text-center align-middle p-4 bg-orange rounded-right-bottom-10" onclick="productToBasket(310, 217, 2) ">
                        <img src="/media/images/icon/add-basket.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-md-12 mb-3">
            <h2>Популярные бренды</h2>
        </div>
        <div class="col-md-3">
            <div class="bg-white border-1 rounded-10 pt-5 pb-5">
                <h4 class="h3 text-center">DarkSide</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-white border-1 rounded-10 pt-5 pb-5">
                <h4 class="h3 text-center">Alphahookah</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-white border-1 rounded-10 pt-5 pb-5">
                <h4 class="h3 text-center">MustHave</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-white border-1 rounded-10 pt-5 pb-5">
                <h4 class="h3 text-center">Vaporesso</h4>
            </div>
        </div>
    </div>
@endsection
