@extends("layouts.app")

@section("content")
    <div class="row pt-5 pb-5">
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
                            <label for="exampleFormControlInput1" class="form-label">ФИО</label>
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Кирилл Кириллович Дейкун">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Номер телефона</label>
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInput2" placeholder="+7(999) 999-99-99">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Email</label>
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInput3" placeholder=" info@idile.ru">
                        </div>
                    </div>
                </div>

                <h2 class="h3 col-12 mt-5">Выберите способ доставки</h2>
                <div class="col-12 shipping">
                    <div class="w-100 bg-white rounded-10 p-3 row">
                        <div class="col-md-6 mb-3">
                            <input type="radio" name="shipping" value="1" class="d-none" id="shipping1">
                            <label for="shipping1" class="btn btn-lg w-100 btn-outline-secondary">Самовывоз</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="radio" name="shipping" value="2" class="d-none" id="shipping2">
                            <label for="shipping2" class="btn btn-lg w-100 btn-outline-secondary">Курьером на дом</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 shipping mt-3" id="self-shipping">
                    <div class="w-100 bg-white rounded-10 p-3 row">
                        <div class="mb-3 w-50">
                            <label for="exampleFormControlInpu1" class="form-label">Область / район</label>
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInpu1" placeholder="Белгородская область">
                        </div>
                        <div class="mb-3 w-50">
                            <label for="exampleFormControlInpu2" class="form-label">Пункт выдачи</label>
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInpu2" placeholder="Борисовка">
                        </div>
                    </div>
                </div>
                <div class="col-12 shipping mt-3" id="courier-shipping">
                    <div class="w-100 bg-white rounded-10 p-3 row">
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInp1" class="form-label">Область / район</label>
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInp1" placeholder="Белгородская область">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInp2" class="form-label">Город</label>
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInp2" placeholder="Кераз Сити">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInp3" class="form-label">Улица</label>
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInp3" placeholder="Ул. 163 лет Пушкина">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInp4" class="form-label">Почтовый индекс</label>
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInp4" placeholder="194555">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInp5" class="form-label">Этаж</label>
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInp5" placeholder="1">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="exampleFormControlInp6" class="form-label">Дом</label>
                            <input type="text" class="form-control form-control-lg is-valid" id="exampleFormControlInp6" placeholder="">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="exampleFormControlInp7" class="form-label">Кв</label>
                            <input type="text" class="form-control form-control-lg is-invalid" id="exampleFormControlInp7" placeholder="">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="exampleFormControlInp8" class="form-label">Этаж</label>
                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInp8" placeholder="">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="checkbox" class="form-check-input" id="exampleFormControlInp9">
                            <label for="exampleFormControlInp9" class="form-check-label">Сохранить адрес для будущих покупок</label>
                        </div>
                    </div>
                </div>

                <h2 class="h3 col-12 mt-5">Выберите способ оплаты</h2>
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
            <div class="btn btn-lg btn-orange w-100">Оплатить картой</div>
            <div class="bg-white rounded-10 p-3 d-flex justify-content-between w-100 mt-3">
                <div>
                    Итого
                </div>
                <div>
                    {{$sum}}Р
                </div>
            </div>
            <div class="text-secondary pt-3">
                <input class="form-check-input" type="checkbox" id="inlinePolitic" value="option1"> Я хотел бы получать эксклюзивные электронные письма со скидками и информацией о продукте (необязательно). Ваши личные данные будут использоваться для обработки ваших заказов, упрощения вашей работы с сайтом и для других целей, описанных в нашей <a href="#" class="text-orange text-decoration-none">политике конфиденциальности</a>
            </div>
        </div>
    </div>
@endsection
