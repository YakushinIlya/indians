<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title??config("app.name") }}</title>
    <link href="{{ asset("/media/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/media/css/main.css") }}" rel="stylesheet">
</head>
<body>

<header>
    <div class="d-none d-md-flex header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-0">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid p-0">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#about">О компании</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route("catalog.index") }}">Каталог</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route("page", ["page"=>"shipping-payment"]) }}">Доставка и оплата</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route("page", ["page"=>"contacts"]) }}">Контакты</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route("news.all") }}">Новости</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-md-6">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <span class="nav-link link-right">{{$shops=Shops::getContacts()->phone??null}}</span>
                                    </li>
                                    <li class="nav-item">
                                        <span class="nav-link link-right">{{Shops::getContacts()->email??null}}</span>
                                    </li>
                                    <li class="nav-item dropdown-center cursor-pointer">
                                        <span class="nav-link link-right dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">График работы магазинов</span>
                                        <div class="dropdown-menu p-2 fs-6" style="max-width: 250px;">
                                            @foreach(Shops::getAddressTimeAll() as $shop)
                                                <div class="mb-3">
                                                    <span>{{ $shop->address }}</span>
                                                    <div class="bg-white p-1 mt-1 border-1 rounded-2 w-max-cont mt-0">
                                                        @if($shop->worktime)
                                                            @php($time=json_decode($shop->worktime))
                                                            <img src="/media/images/icon/time.png" alt="">
                                                            <span>ежедневно, {{\Illuminate\Support\Str::limit($time->start, 5, '')}} - {{\Illuminate\Support\Str::limit($time->stop, 5, '')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row pt-4 pb-4">
                <div class="col-12 col-md-2 text-center text-md-start mb-3">
                    <a href="/">
                        <img src="/media/images/logo.png" class="img-fluid">
                    </a>
                </div>
                <div class="col-12 col-md-7">
                    <form class="row g-3">
                        <div class="col">
                            <input class="form-control form-control-lg" type="search" placeholder="Поиск товаров">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-orange btn-search h-100 form-control-lg"><img src="/media/images/icon/search.png" alt="" class="img-fluid"></button>
                        </div>
                    </form>
                </div>
                <div class="d-none d-md-flex col-md-3">
                    <div class="row">
                        <div class="col-auto p-2 bg-white icon">
                            <img class="img-fluid" src="/media/images/icon/bell.png">
                        </div>
                        <div class="col-auto p-2 bg-white icon dropdown">
                            {{--<img class="img-fluid" src="/media/images/icon/user.png" data-bs-toggle="modal" href="#modalReg" role="button">--}}
                            <img class="img-fluid dropdown-toggle" src="/media/images/icon/user.png" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                            @guest
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" role="button" data-bs-toggle="modal" href="#modalAuth">Вход</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" role="button" data-bs-toggle="modal" href="#modalReg">Регистрация</a>
                                    </li>
                                </ul>
                            @endguest
                            @auth
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route("lk.index") }}" class="dropdown-item">Профиль</a>
                                    </li>
                                    <li>
                                        <a href="{{ route("lk.history") }}" class="dropdown-item">История заказов</a>
                                    </li>
                                    <li>
                                        <a href="{{ route("lk.sales") }}" class="dropdown-item">Скидочная система</a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a href="{{ route("lk.logout") }}" class="dropdown-item">Выход</a>
                                    </li>
                                </ul>
                            @endauth
                        </div>
                        <div class="col-auto p-2 bg-white icon-basket">
                            <a href="{{ route("basket.index") }}" class="text-dark text-decoration-none">
                                <img class="img-fluid" src="/media/images/icon/basket.png"> <span id="countBasket">{{Shops::getCountBasket(auth()->user()->id??Illuminate\Support\Facades\Cookie::get('guestId'))}}</span> товаров
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-flex row mt-2 pb-4">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid p-0">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Скидки</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Кальяны</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Аксессуары</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Табак 18+</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Уголь</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Бестабачные смеси</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Вейпы</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<section class="main">
    <div class="container">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {!! session('status') !!}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning" role="alert">
                {!! session('warning') !!}
            </div>
        @endif

        @yield("content")

    </div>
</section>

<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row p-5">
                <div class="col-md-3">
                    <h4 class="h6">О нас</h4>
                    <p>INDIANS: Продажа никотиносодержащей продукции, кальянов, табаков, сигар, сигарилл, электронок, POD-систем и т.п.</p>
                </div>
                <div class="col-6 col-md-3">
                    <h4 class="h6">Навигация</h4>
                    <ul>
                        <li>Главная</li>
                        <li>Каталог</li>
                        <li>Кальяны</li>
                        <li>Электронные сигареты</li>
                        <li>Жидкости</li>
                        <li>Аксессуары</li>
                        <li>Табаки</li>
                    </ul>
                </div>
                <div class="col-6 col-md-3">
                    <h4 class="h6">Мы в соцсетях</h4>
                    <ul>
                        <li>
                            <a href="{{Shops::getContacts()->vk??null}}" target="_blank" class="text-dark text-decoration-none">Вконтакте</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone={{preg_replace('/[^0-9]/', '', Shops::getContacts()->phone??null)}}" target="_blank" class="text-dark text-decoration-none">Whatsapp</a>
                        </li>
                        <li>
                            <a href="viber://chat?number={{preg_replace('/[^0-9]/', '', Shops::getContacts()->phone??null)}}" target="_blank" class="text-dark text-decoration-none">Viber</a>
                        </li>
                        <li>
                            <a href="https://telegram.me/{{Shops::getContacts()->tg??null}}" target="_blank" class="text-dark text-decoration-none">Telegram</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-3">
                    <h4 class="h6">Помощь и поддержка</h4>
                    <ul>
                        <li>Контакты</li>
                        <li>Оставить заявку</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-center p-4">
                <div class="col-md-4 text-center">
                    Политика конфиденциальности
                </div>
                <div class="col-md-4 text-center">
                    сайт разработан<br>
                    <img src="/media/images/logo-dev.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-4 text-center">
                    (с) Все права защещены  INDIANS от 2015
                </div>
            </div>
        </div>
    </div>
</footer>

@guest
    <div class="modal fade" id="modalReg" aria-hidden="true" aria-labelledby="modalRegLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0 border-0">
                    <button type="button" class="btn-close mr-10px mt-10px" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mt-0 pt-0">

                    <form action="{{ route("api.register") }}" id="formReg" method="post">
                        <div class="bg-white rounded-left-top-10 rounded-left-bottom-10 rounded-right-top-10 rounded-right-bottom-10 p-4">
                            <h1 class="text-center mb-5">Регистрация</h1>
                            <div class="mb-3">
                                <label for="phoneReg" class="form-label">Номер телефона</label>
                                <input type="text" name="phone" class="form-control form-control-lg" id="phoneReg" placeholder="+7(000)000-0000">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Пароль</label>
                                <input type="text" name="password" class="form-control form-control-lg" id="formGroupExampleInput2" placeholder="Придумайте пароль">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput3" class="form-label">Подтверждение пароля</label>
                                <input type="text" name="password_confirmation" class="form-control form-control-lg" id="formGroupExampleInput3" placeholder="Повторите пароль">
                            </div>
                            <div class="mb-3">
                                <label for="date-birth" class="form-label">Дата рождения</label>
                                <div class="input-group">
                                    <input type="number" name="db_day" class="form-control form-control-lg" id="date-birth_day" placeholder="ДД">
                                    <input type="number" name="db_month" class="form-control form-control-lg" placeholder="ММ">
                                    <input type="number" name="db_year" class="form-control form-control-lg" placeholder="ГГГГ">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-orange w-100 mt-4 mb-3">Зарегестрироваться</button>
                            <div class="text-secondary">Есть аккаунт? <span class="text-orange text-decoration-none" data-bs-toggle="modal" href="#modalAuth" role="button">Войти</span></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAuth" aria-hidden="true" aria-labelledby="modalAuthLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0 border-0">
                    <button type="button" class="btn-close mr-10px mt-10px" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mt-0 pt-0">

                    <form action="{{ route("form.auth") }}" id="formAuth" method="post">
                        @csrf
                        <div class="bg-white rounded-left-top-10 rounded-left-bottom-10 rounded-right-top-10 rounded-right-bottom-10 p-4">
                            <h1 class="text-center mb-5">Вход</h1>
                            <div class="mb-3">
                                <label for="phoneAuth" class="form-label">Номер телефона</label>
                                <input type="text" name="phone" class="form-control form-control-lg" id="phoneAuth" placeholder="+7(000)000-00-00">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Пароль</label>
                                <input type="password" name="password" class="form-control form-control-lg" id="passwordAuth" placeholder="Введите пароль">
                            </div>
                            <button type="submit" class="btn btn-lg btn-orange w-100 mt-4 mb-3">Войти</button>
                            <div class="text-secondary">Нет аккаунта? <span class="text-orange text-decoration-none" data-bs-toggle="modal" href="#modalReg" role="button">Зарегистрироваться</span></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endguest

<div class="modal fade" id="age18" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="age18" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-0 border-0">
                <button type="button" class="btn-close mr-10px mt-10px" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-0 pt-0">
                <div class="bg-white rounded-left-top-10 rounded-left-bottom-10 rounded-right-top-10 rounded-right-bottom-10 p-2">
                    <h1>Для доступа к сайту необходимо<br> подтвердить возраст <span class="text-orange">18+</span></h1>
                    <p>Сайт содержит информацию об электронных сигаретах, предназначенную только для лиц старше 18 лет, являющихся потребителями табака или иной никотиносодержащей продукции, которые в противном случае продолжат курить или употреблять иную никтотиносодержащую продукцию. Электронные сигареты, кальянны и табак для кальяна, а так же, нагреватели табака не являются альтернативой отказу от употребления табачной или иной никотиносодержащей продукции и не является средством для лечения никотиновой зависимости.</p>
                    <a class="btn btn-lg btn-orange" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" onclick="age18()">Мне есть 18 лет</a>
                    <a href="/" class="btn btn-lg btn-outline-orange">Мне нет 18 лет</a>
                    <p class="text-secondary mt-3">Продолжая использовать сайт, я подтверждаю, что мне уже исполнилось 18 лет, и я являюсь потребителем табака или иной никотинсодержащей продукции.</p>
                    <p class="text-secondary">Indians использует cookie c целью повышения производительности и упрощения работы с сайтом, а также в рекламных и аналитических целях. Продолжая работу с сайтом, вы соглашаетесь на использование файлов cookie.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset("/media/js/jquery.cookie.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>

<script src="{{ asset("/media/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("/media/js/bootstrap-input-spinner.js") }}"></script>
<script src="{{ asset("/media/js/main.js") }}"></script>
<script type="text/javascript">
    $(window).on('load',function(){
        if(localStorage.getItem('age')!=18) {
            $('#age18').modal('show');
        }
    });
    $("input[type='number']#countProduct").inputSpinner();
</script>
</body>
</html>
