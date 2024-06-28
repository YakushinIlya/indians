@extends("layouts.app")

@section("content")
    <form action="#" id="formOrder" method="post">
        @csrf
    <div class="row basket pt-5 pb-5">
        <div class="col-12 mb-5">
            <div class="pb-2">
                <h1>{{$title}}</h1>
            </div>
        </div>

        <h2 class="h3 col-12">Личная информация</h2>
        <div class="col-md-9">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 bg-white rounded-10 p-3 row">
                        <div class="col-md-6 mb-3">
                            <label for="fio" class="form-label">ФИО</label>
                            <input type="text" class="form-control form-control-lg" id="fio" name="fio" value="{{$user->fio??''}}" placeholder="{{$user->fio??''}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Номер телефона</label>
                            <input type="phone" class="form-control form-control-lg" id="phone" name="phone" value="{{$user->phone??''}}" placeholder="{{$user->phone??''}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{$user->email??''}}" placeholder="{{$user->email??''}}">
                        </div>
                    </div>
                </div>

                <h2 class="h3 col-12 mt-5" id="head-shipping">Выберите способ доставки</h2>
                <div class="col-12 shipping" id="shipping" role="tablist">
                    <div class="w-100 bg-white rounded-10 p-3 row">
                        <div class="col-md-6 mb-3" role="presentation">
                            <input type="radio" name="shipping" value="1" class="d-none" id="shipping1">
                            <label for="shipping1" class="btn btn-lg w-100 btn-outline-secondary" id="shipping-1" data-bs-toggle="tab" data-bs-target="#shipping-c-1" type="button" role="tab" aria-controls="shipping-c-1" aria-selected="true">Самовывоз</label>
                        </div>
                        <div class="col-md-6 mb-3" role="presentation">
                            <input type="radio" name="shipping" value="2" class="d-none" id="shipping2">
                            <label for="shipping2" class="btn btn-lg w-100 btn-outline-secondary" id="shipping-2" data-bs-toggle="tab" data-bs-target="#shipping-c-2" type="button" role="tab" aria-controls="shipping-c-2" aria-selected="false">Курьером на дом</label>
                        </div>
                    </div>
                </div>

                <div class="col-12 tab-content" id="shipping-content">
                    <div class="shipping mt-3 tab-pane fade" id="shipping-c-1" role="tabpanel" aria-labelledby="shipping-1" tabindex="0">
                        <div class="w-100 bg-white rounded-10 p-3 row">
                            <div class="mb-3 w-50">
                                <label for="region_point" class="form-label">Область / район</label>
                                <input type="text" class="form-control form-control-lg" id="region_point" name="region_point" placeholder="Белгородская область">
                            </div>
                            <div class="mb-3 w-50">
                                <label for="point" class="form-label">Пункт выдачи</label>
                                <input type="text" class="form-control form-control-lg" id="point" name="point" placeholder="Борисовка">
                            </div>
                        </div>
                    </div>
                    <div class="shipping mt-3 tab-pane fade" id="shipping-c-2" role="tabpanel" aria-labelledby="shipping-2" tabindex="0">
                        <div class="w-100 bg-white rounded-10 p-3 row">
                            <div class="col-md-6 mb-3">
                                <label for="region" class="form-label">Область / район</label>
                                <input type="text" class="form-control form-control-lg" id="region" name="region" placeholder="Белгородская область">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">Город</label>
                                <input type="text" class="form-control form-control-lg" id="city" name="city" placeholder="Кераз Сити">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="street" class="form-label">Улица</label>
                                <input type="text" class="form-control form-control-lg" id="street" name="street" placeholder="Ул. 163 лет Пушкина">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="zipcode" class="form-label">Почтовый индекс</label>
                                <input type="text" class="form-control form-control-lg" id="zipcode" name="zipcode" placeholder="194555">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="level" class="form-label">Этаж</label>
                                <input type="text" class="form-control form-control-lg" id="level" name="level" placeholder="1">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="home" class="form-label">Дом</label>
                                <input type="text" class="form-control form-control-lg" id="home" name="home" placeholder="">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="housing" class="form-label">Корпус</label>
                                <input type="text" class="form-control form-control-lg" id="housing" name="housing" placeholder="">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="flat" class="form-label">Кв</label>
                                <input type="text" class="form-control form-control-lg" id="flat" name="flat" placeholder="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="checkbox" class="form-check-input" id="save_address" name="save_address">
                                <label for="save_address" class="form-check-label">Сохранить адрес для будущих покупок</label>
                            </div>
                        </div>
                    </div>
                </div>


                <h2 class="h3 col-12 mt-5" id="head-payment">Выберите способ оплаты</h2>
                <div class="col-12 shipping">
                    <div class="w-100 bg-white rounded-10 p-3 row">
                        <div class="col-md-6 mb-3">
                            <input type="radio" name="payment" value="1" class="d-none" id="pay1">
                            <label for="pay1" class="btn btn-lg w-100 btn-outline-secondary">Наличный расчет</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="radio" name="payment" value="2" class="d-none" id="pay2">
                            <label for="pay2" class="btn btn-lg w-100 btn-outline-secondary">Оплата картой онлайн</label>
                        </div>
                        <div class="col-12">
                            <strong>Внимание!</strong>
                            <p>При получении может понадобиться ваш паспорт или любой другой удостоверяющий личность и возраст документ в соответсвии с законом Российской Федерации!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <button type="submit" class="btn btn-lg btn-orange w-100">Оплатить</button>
            <div class="bg-white rounded-10 p-3 d-flex justify-content-between w-100 mt-3">
                <div>
                    Итого
                </div>
                <div>
                    {{$itogoSum}}Р
                </div>
            </div>
            <div class="text-secondary pt-3">
                <input class="form-check-input" type="checkbox" id="inlinePolitic" value="option1"> Я хотел бы получать эксклюзивные электронные письма со скидками и информацией о продукте (необязательно). Ваши личные данные будут использоваться для обработки ваших заказов, упрощения вашей работы с сайтом и для других целей, описанных в нашей <a href="#" class="text-orange text-decoration-none">политике конфиденциальности</a>
            </div>
        </div>

    </div>
    </form>
@endsection
