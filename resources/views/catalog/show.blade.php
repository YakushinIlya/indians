@extends("layouts.app")

@section("content")
    <div class="row pt-5 pb-5 product justify-content-start">

        <div class="col-md-6 text-center">
            @if($product->images)
                @foreach(json_decode($product->images) as $img)
                    <img src="/storage/images/products/{{ $img }}" alt="" class="img-fluid">
                @endforeach
            @else
                <img src="/media/images/no-photo.jpg" alt="" class="img-fluid">
            @endif
        </div>
        <div class="col-md-6">
            <div class="row justify-content-between">
                <div class="col">
                    <div class="bg-white pt-1 pb-1 pl-2 pr-2 border-1 rounded-2 mr-1">
                        <img src="images/icon/star-full.png" alt="" class="img-fluid">
                        <img src="images/icon/star-full.png" alt="" class="img-fluid">
                        <img src="images/icon/star-full.png" alt="" class="img-fluid">
                        <img src="images/icon/star-full.png" alt="" class="img-fluid">
                        <img src="images/icon/star-zero.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col">
                    <div class="bg-white pt-1 pb-1 pl-2 pr-2 border-1 rounded-2 mr-1">В наличии в 2 магазинах</div>
                </div>
                <div class="col">
                    <div class="bg-white pt-1 pb-1 pl-2 pr-2 border-1 rounded-2">В наличии 15 штук</div>
                </div>
            </div>
            <div class="clearfix"></div>
            <h1 class="h1 mt-2">{{ $product->title }}</h1>
            <div class="mt-2">
                <span>Артикул -- {{ $product->article }} </span>
            </div>
            <div class="mt-2">
                <ul>
                    @if($product->options)
                        @foreach(json_decode($product->options) as $k => $v)
                            <li><strong>{{$k}}:</strong> {{$v}}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="mt-2">
                {{ $product->desc }}
            </div>
            <div class="mt-2">
                <div class="row justify-content-between">
                    <div class="col">
                        <div class="btn btn-lg btn-orange text-white w-100">В корзину</div>
                    </div>
                    <div class="col">
                        <input type="number" id="countProduct" value="1" min="0" max="1000" step="1"/>
                    </div>
                    <div class="col">
                        {{ $product->price }}₽
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-5 mb-5">
            <span class="h1">Отзывы</span><span class="h3"> - </span><span>посмотреть все</span>
        </div>

        <div class="col-md-12 bg-white border-1 rounded-4 mb-3">
            <div class="row feedback">
                <div class="col-md-8 p-4">
                    <div class="d-flex">
                        <div class="feedback-stars mr-auto">
                            <div class="bg-white pt-1 pb-1 pl-2 pr-2">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-zero.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="h1">Кирилл Дейкун</div>
                    <span>15.12.2022</span>
                    <p>Новый мини-кальян от производителя Alpha Hookah, который подчеркнет твой стиль жизни! Главная фишка в его красивой продувке, где шарики прыгают как уровень громкости в музыкальном плеере.
                        Шахта выполнена из высококачественной нержавеющей стали</p>
                </div>
                <div class="col-md-4 feedback-img">
                    <img src="images/feedback.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-12 bg-white border-1 rounded-4 mb-3">
            <div class="row feedback">
                <div class="col-md-8 p-4">
                    <div class="d-flex">
                        <div class="feedback-stars mr-auto">
                            <div class="bg-white pt-1 pb-1 pl-2 pr-2">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-zero.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="h1">Кирилл Дейкун</div>
                    <span>15.12.2022</span>
                    <p>Новый мини-кальян от производителя Alpha Hookah, который подчеркнет твой стиль жизни! Главная фишка в его красивой продувке, где шарики прыгают как уровень громкости в музыкальном плеере.
                        Шахта выполнена из высококачественной нержавеющей стали</p>
                </div>
                <div class="col-md-4 feedback-img">
                    <img src="images/feedback.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-12 bg-white border-1 rounded-4 mb-3">
            <div class="row feedback">
                <div class="col-md-8 p-4">
                    <div class="d-flex">
                        <div class="feedback-stars mr-auto">
                            <div class="bg-white pt-1 pb-1 pl-2 pr-2">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-zero.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="h1">Кирилл Дейкун</div>
                    <span>15.12.2022</span>
                    <p>Новый мини-кальян от производителя Alpha Hookah, который подчеркнет твой стиль жизни! Главная фишка в его красивой продувке, где шарики прыгают как уровень громкости в музыкальном плеере.
                        Шахта выполнена из высококачественной нержавеющей стали</p>
                </div>
                <div class="col-md-4 feedback-img">
                    <img src="images/feedback.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-12 bg-white border-1 rounded-4 mb-3">
            <div class="row feedback">
                <div class="col-md-8 p-4">
                    <div class="d-flex">
                        <div class="feedback-stars mr-auto">
                            <div class="bg-white pt-1 pb-1 pl-2 pr-2">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-full.png" alt="" class="img-fluid">
                                <img src="images/icon/star-zero.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="h1">Кирилл Дейкун</div>
                    <span>15.12.2022</span>
                    <p>Новый мини-кальян от производителя Alpha Hookah, который подчеркнет твой стиль жизни! Главная фишка в его красивой продувке, где шарики прыгают как уровень громкости в музыкальном плеере.
                        Шахта выполнена из высококачественной нержавеющей стали</p>
                </div>
                <div class="col-md-4 feedback-img">
                    <img src="images/feedback.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-5 pt-3">
            <div class="h1">Вам может пригодиться</div>
        </div>
        <div class="col-md-3">
            <div class="bg-white border-1 rounded-left-bottom-10">
                <div class="img">
                    <img src="images/recomended.png" alt="" class="img fluid w-100 rounded-top-10">
                </div>
                <div class="d-flex">
                    <div class="p-3 rounded-left-bottom-10">
                        <span class="price">15 550₽</span>
                        <br>
                        <span class="name">Кальян TabakerkaIzBaku</span>
                    </div>
                    <div class="ml-auto text-center align-middle p-4 bg-orange rounded-right-bottom-10">
                        <img src="images/icon/add-basket.png" alt="" class="img fluid w-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-white border-1 rounded-left-bottom-10">
                <div class="img">
                    <img src="images/recomended.png" alt="" class="img fluid w-100 rounded-top-10">
                </div>
                <div class="d-flex">
                    <div class="p-3 rounded-left-bottom-10">
                        <span class="price">15 550₽</span>
                        <br>
                        <span class="name">Кальян TabakerkaIzBaku</span>
                    </div>
                    <div class="ml-auto text-center align-middle p-4 bg-orange rounded-right-bottom-10">
                        <img src="images/icon/add-basket.png" alt="" class="img fluid w-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-white border-1 rounded-left-bottom-10">
                <div class="img">
                    <img src="images/recomended.png" alt="" class="img fluid w-100 rounded-top-10">
                </div>
                <div class="d-flex">
                    <div class="p-3 rounded-left-bottom-10">
                        <span class="price">15 550₽</span>
                        <br>
                        <span class="name">Кальян TabakerkaIzBaku</span>
                    </div>
                    <div class="ml-auto text-center align-middle p-4 bg-orange rounded-right-bottom-10">
                        <img src="images/icon/add-basket.png" alt="" class="img fluid w-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-white border-1 rounded-left-bottom-10">
                <div class="img">
                    <img src="images/recomended.png" alt="" class="img fluid w-100 rounded-top-10">
                </div>
                <div class="d-flex">
                    <div class="p-3 rounded-left-bottom-10">
                        <span class="price">15 550₽</span>
                        <br>
                        <span class="name">Кальян TabakerkaIzBaku</span>
                    </div>
                    <div class="ml-auto text-center align-middle p-4 bg-orange rounded-right-bottom-10">
                        <img src="images/icon/add-basket.png" alt="" class="img fluid w-100">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
