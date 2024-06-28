@extends("layouts.app")

@section("content")
    <div class="row lk mt-5  mb-5">
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
                    <a href="{{ route("lk.history") }}" class="btn btn-lg btn-outline-secondary w-100">История заказов</a>
                </div>
                <div class="col">
                    <a href="{{ route("lk.sales") }}" class="btn btn-lg btn-outline-secondary w-100 active">Скидочная система</a>
                </div>
                @role("admin")
                    <div class="col-12 mt-3">
                        <a href="{{ route("admin.index") }}" target="_blank" class="btn btn-lg btn-danger w-100">Админ панель</a>
                    </div>
                @endrole
            </div>
        </div>

        <div class="col-md-9 mt-5 mb-3">
            <h1>Скидочная система</h1>
        </div>
        <div class="col-md-6 bg-white rounded-left-bottom-10 rounded-left-top-10 p-4 border-right-secondary-1 text-center">
            <h3 class="h5 mb-5">Вы можете отсканировать QR-код с телефона</h3>
            <img src="/media/images/qr.png" alt="" class="img-fluid">
        </div>
        <div class="col-md-6 bg-white rounded-right-bottom-10 rounded-right-top-10 p-4 text-center">
            <h3 class="h5 mb-3">Или заполнить данные здесь</h3>
            <div class="p-5">
                <h4 class="h4">Дисконтная карта</h4>
                <p>Чтобы получить дисконтную карту, заполните поля ниже</p>

                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Как к вам обращаться">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="+7">
                </div>
                <div class="mb-3 d-flex">
                    <label for="exampleFormControlInput3" class="w-100">Дата рождения</label>
                    <input type="date" class="form-control flex-shrink-1" id="exampleFormControlInput3" placeholder="+7">
                </div>
                <div class="form-check w-auto">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Соглашаюсь на обработку персональных данных</label>
                </div>
                <div class="mt-5">
                    <div class="btn btn-orange btn-lg">Продолжить</div>
                </div>
            </div>
        </div>

    </div>
@endsection
