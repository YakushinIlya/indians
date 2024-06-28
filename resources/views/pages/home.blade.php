@extends("layouts.app")

@section("content")
    <div class="row index">
        <div class="col-12 mt-5 pt-5 pb-5">
            <section class="index-section-slide bg-white rounded-20 w-100" id="index-slide-1">
                <div class="row">
                    <div class="col-12 col-md-7 p-5">
                        <h1 class="mb-3">Скидка на кальяны<br> и табаки <span class="text-orange">до 85%</span></h1>
                        <ul>
                            <li>Привезем за 1 час</li>
                            <li>Более 56 вкусов</li>
                            <li>Бесплатная доставка</li>
                        </ul>
                        <a href="{{ route("catalog.index") }}" class="btn btn-orange btn-lg text-white">Открыть каталог</a>
                    </div>
                    <div class="d-none d-md-flex col-md-5 position-relative">
                        <img src="media/images/index-slide-1.png" alt="" class="img-fluid" id="index-slide-img-1">
                    </div>
                </div>
            </section>
        </div>

        <div class="col-12 col-md-6 mt-4">
            <section class="index-section-slide bg-white rounded-20 w-100" style="background: url('media/images/index-slide-2.png') no-repeat right bottom; background-size: auto 100%;">

                <div class="d-flex align-content-end flex-wrap p-3 p-md-5 h-200px h-md-300px">
                    <div>
                        <h1>
                            <a href="{{ route("catalog.category", ["category"=>1]) }}" class="text-decoration-none text-dark">Кальяны</a>
                        </h1>
                        <span>Когда душа требует<br> расслабиться</span>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-md-6 mt-4">
            <section class="index-section-slide bg-orange rounded-20 w-100" style="background: url('media/images/index-slide-3.png') no-repeat right bottom; background-size: auto 100%;">

                <div class="d-flex align-content-end flex-wrap p-3 p-md-5 h-200px h-md-300px">
                    <div class="text-white">
                        <h1>
                            <a href="{{ route("catalog.category", ["category"=>2]) }}" class="text-decoration-none text-white">Аксессуары</a>
                        </h1>
                        <span>Пора обновиться<br> и попробовать новое</span>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-md-6 mt-4">
            <section class="index-section-slide rounded-20 w-100" id="index-slide-4" style="background: url('media/images/index-slide-4.png') no-repeat right bottom; background-size: auto 100%;">

                <div class="d-flex align-content-end flex-wrap p-3 p-md-5 h-200px h-md-300px">
                    <div class="text-white">
                        <h1>
                            <a href="{{ route("catalog.category", ["category"=>3]) }}" class="text-decoration-none text-white">POD-системы</a>
                        </h1>
                        <span>Много вкуса, много пара</span>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-md-6 mt-4">
            <section class="index-section-slide rounded-20 w-100" id="index-slide-5" style="background: url('media/images/index-slide-5.png') no-repeat right bottom; background-size: auto 100%;">

                <div class="d-flex align-content-end flex-wrap p-3 p-md-5 h-200px h-md-300px">
                    <div class="text-white">
                        <h1>
                            <a href="{{ route("catalog.category", ["category"=>4]) }}" class="text-decoration-none text-white">Жидкости</a>
                        </h1>
                        <span>Вкусные, разные,<br> и прекрасные</span>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-md-12 mt-5 mb-5 pt-5">
            <span class="h1">Акции</span><span class="h3"> - </span><span>посмотреть все</span>
        </div>

        <div id="carouselSaleIndex" class="carousel-NewProductIndex carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators carousel-NewProductIndex-btn d-md-none mt-5">
                <button type="button" data-bs-target="#carouselSaleIndex" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselSaleIndex" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselSaleIndex" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="" id="row-md1">
                    <div class="col-md-4 carousel-item active">
                        <section class="index-section-sale bg-white rounded-10 w-100" style="background: url('media/images/index-sale-1.png') no-repeat right bottom; background-size: auto 100%;">
                            <div class="d-flex align-content-end flex-wrap p-3 h-200px">
                                <div class="">
                                    <h1 class="h4">Кальян со<br> скидкой <span class="text-orange">35%</span></h1>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-4 carousel-item">
                        <section class="index-section-sale bg-white rounded-10 w-100" style="background: url('media/images/index-sale-2.png') no-repeat right bottom; background-size: auto 100%;">
                            <div class="d-flex align-content-end flex-wrap p-3 h-200px">
                                <div class="">
                                    <h1 class="h4">Кальян со<br> скидкой <span class="text-orange">25%</span></h1>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-4 carousel-item">
                        <section class="index-section-sale bg-white rounded-10 w-100" style="background: url('media/images/index-sale-3.png') no-repeat right bottom; background-size: auto 100%;">
                            <div class="d-flex align-content-end flex-wrap p-3 h-200px">
                                <div class="">
                                    <h1 class="h4">Кальян со<br> скидкой <span class="text-orange">55%</span></h1>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-5 mb-5 pt-5">
            <span class="h1">Новые поступления</span><span class="h3"> - </span><span>посмотреть все</span>
        </div>

        <div id="carouselNewProductIndex" class="carousel-NewProductIndex carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators carousel-NewProductIndex-btn d-md-none mt-5">
                <button type="button" data-bs-target="#carouselNewProductIndex" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselNewProductIndex" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselNewProductIndex" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="" id="row-md2">
                    <div class="col-md-4 carousel-item active">
                        <section class="index-section-sale bg-white rounded-10 w-100" style="background: url('media/images/index-sale-3.png') no-repeat right bottom; background-size: auto 100%;">
                            <div class="d-flex align-content-end flex-wrap p-3 h-200px">
                                <div class="">
                                    <h1 class="h4">Новый кальян<br> <span class="text-orange">Vostok</span></h1>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-4 carousel-item">
                        <section class="index-section-sale bg-white rounded-10 w-100" style="background: url('media/images/index-new-2.png') no-repeat right bottom; background-size: auto 100%;">
                            <div class="d-flex align-content-end flex-wrap p-3 h-200px">
                                <div class="">
                                    <h1 class="h4"><span class="text-orange">Новые</span> вкусы<br> для POD-ов</h1>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-4 carousel-item">
                        <section class="index-section-sale bg-white rounded-10 w-100" style="background: url('media/images/index-new-3.png') no-repeat right bottom; background-size: auto 100%;">
                            <div class="d-flex align-content-end flex-wrap p-3 h-200px">
                                <div class="">
                                    <h1 class="h4">POD-система<br> <span class="text-orange">Bakinskya</span></h1>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 mb-5" id="about"></div>

        <div class="col-md-12 bg-white border-1 rounded-4 mb-3 bg-xs-no-image" style="background: url('media/images/index-info-1.png') no-repeat right bottom; background-size: auto 100%;">
            <div class="row index-info">
                <div class="col-12 col-md-8 p-4">
                    <div class="h1">Табачный клуб INDIANS</div>
                    <p>INDIANS  - это удобство, вкус, доступность, качество<br> продаваемой продукции и забота о нашем клиенте.<br> Есть приятные программы лояльности, которые не оставят<br> любого равнодушным. Совмещаем приятное с полезным!</p>
                </div>
                <div class="col-md-4 index-info-img d-none d-md-flex h-250px">
                </div>
            </div>
        </div>
        <div class="col-md-12 bg-white border-1 rounded-4 mb-3 bg-xs-no-image" style="background: url('media/images/index-info-2.png') no-repeat right bottom; background-size: auto 100%;">
            <div class="row index-info">
                <div class="col-12 col-md-8 p-4">
                    <div class="h1">Большой каталог и доступные цены</div>
                    <p>Среди множества интернет-магазинов кальянной продукции и электронных сигарет, мы понимаем, что за чертой города или в жилых массивах бывает сложно найти нужную продукцию и при этом не потерять время. Мы решили исправить это! В наших магазинах есть все, что может понадобится для приятного времяпровождения. От аксессуаров, табаков, жидкостей, до самых интересных кальянов и новинок в этой сфере.</p>
                </div>
                <div class="col-md-4 index-info-img d-none d-md-flex h-250px">
                </div>
            </div>
        </div>
        <div class="col-md-12 bg-white border-1 rounded-4 mb-3 bg-xs-no-image" style="background: url('media/images/index-info-3.png') no-repeat right bottom; background-size: auto 100%;">
            <div class="row index-info">
                <div class="col-12 col-md-8 p-4">
                    <div class="h1">Помощь в выборе, фильтры и почта</div>
                    <p>Мы продумали нашу систему каталога так, чтобы любой мог разобраться и сделать заказ. Можете воспользоваться всего 1-2 фильтрами, а можете более 15, все зависит от вашего желания и потребностей! Наш каталог сразу предлагает смежные товары, которые могут вам пригодиться и вам не придется вновь искать товар. Если вы вдруг хотите что-то уточнить, вы всегда можете  позвонить нам или написать на нашу почту.</p>
                </div>
                <div class="col-md-4 index-info-img d-none d-md-flex h-250px">
                </div>
            </div>
        </div>
        <div class="col-md-12 bg-white border-1 rounded-4 mb-3 bg-xs-no-image" style="background: url('media/images/index-info-4.png') no-repeat right bottom; background-size: auto 100%;">
            <div class="row index-info">
                <div class="col-12 col-md-8 p-4">
                    <div class="h1">Почему магазин Indians?</div>
                    <p>Наши магазины находятся за чертой города в жилых массивах. Мы хотим предложить нашим клиентам удобство выбора товара, покупки и получения. </p>
                </div>
                <div class="col-md-4 index-info-img d-none d-md-flex h-250px">
                </div>
            </div>
        </div>
    </div>

    <script>
        (() => {
            let widthWindows = window.screen.width;
            if(widthWindows>768){
                document.querySelectorAll(".carousel-NewProductIndex .carousel-inner").forEach(n => n.classList.remove('carousel-inner'));
                document.querySelectorAll(".carousel-NewProductIndex .carousel-item").forEach(n => n.classList.remove('carousel-item'));
                document.getElementById("row-md1").classList.toggle("row");
                document.getElementById("row-md2").classList.toggle("row");
            }
        })();
    </script>
@endsection
