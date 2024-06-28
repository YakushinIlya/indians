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
                    <a href="{{ route("lk.index") }}" class="btn btn-lg btn-outline-secondary w-100 active">Профиль</a>
                </div>
                <div class="col">
                    <a href="{{ route("lk.history") }}" class="btn btn-lg btn-outline-secondary w-100">История заказов</a>
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

        <div class="col-md-9 mt-5">
            <h1>Личная информация</h1>
            <form action="{{ route("lk.update") }}" method="post">
                @csrf
                <div class="bg-white border-1 rounded-10 p-4 row justify-content-between">
                    <div class="col-4">
                        <label for="exampleFormControlInput1" class="form-label">ФИО</label>
                        <input type="text" class="form-control form-control-lg" name="fio" value="{{ $user->fio }}" id="exampleFormControlInput1" placeholder="Ф.И.О">
                    </div>
                    <div class="col-4">
                        <label for="exampleFormControlInput2" class="form-label">Номер телефона</label>
                        <input type="text" class="form-control form-control-lg" name="phone" value="{{ $user->phone }}" id="exampleFormControlInput2" placeholder="+7(999) 999-99-99">
                    </div>
                    <div class="col-4">
                        <label for="date-birth" class="form-label">Дата рождения</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" name="db_day" value="{{ $user->db_day }}" id="date-birth">
                            <input type="text" class="form-control form-control-lg" name="db_month" value="{{ $user->db_month }}">
                            <input type="text" class="form-control form-control-lg" name="db_year" value="{{ $user->db_year }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="exampleFormControlInput1" class="form-label">Пароль</label>
                        <input type="password" class="form-control form-control-lg" name="password" id="exampleFormControlInput12" value="">
                    </div>
                    <div class="col-4">
                        <label for="exampleFormControlInput3" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-lg" @empty($user->email) name="email" @endisset value="{{ $user->email }}" id="exampleFormControlInput3" placeholder="info@idile.ru" @isset($user->email) disabled @endisset>
                    </div>
                    <div class="col-4">
                        <div>
                            <label class="form-label">Пол</label>
                        </div>
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="gender" id="btnradio1" value="1" {{ $user->gender == 1 ? "checked" : '' }}>
                            <label class="btn btn-outline-secondary btn-lg-12px" for="btnradio1">М</label>

                            <input type="radio" class="btn-check" name="gender" id="btnradio3" value="2" {{ $user->gender == 2 ? "checked" : '' }}>
                            <label class="btn btn-outline-secondary btn-lg-12px" for="btnradio3">Ж</label>
                        </div>
                    </div>
                    <div class="col-4 mt-3">
                        <button class="btn btn-lg btn-orange" type="submit">Редактировать</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-9 mt-5">
            <h1>Адрес для получения товара</h1>
            <div class="row mb-3">
                @foreach(Shops::getAddressTimeAll() as $shop)
                    <div class="lk-shop-item col-md-12 bg-white rounded-10 w-100 p-3 mt-3">
                        <div class="row">
                            <div class="p-2 col-md-3">
                                <img src="images/img-shop.png" alt="" class="img-fluid">
                            </div>
                            <div class="p-2 col-md-5">
                                <h3 class="h5 mb-3">{{ $shop->address }}</h3>
                                @php($time=json_decode($shop->worktime))
                                <div class="bg-white pt-1 pb-1 pl-2 pr-2 mt-1 border-1 rounded-2 w-max-cont">
                                    <img src="/media/images/icon/time.png" alt="">
                                    <span>ежедневно, {{\Illuminate\Support\Str::limit($time->start, 5, '')}} -- {{\Illuminate\Support\Str::limit($time->stop, 5, '')}}</span>
                                </div>
                                @php($hour=\Illuminate\Support\Carbon::now()->hour)
                                @php($hourStart=\Illuminate\Support\Str::limit($time->start, 2, ''))
                                @php($hourEnd=\Illuminate\Support\Str::limit($time->stop, 2, ''))
                                @if($hour<$hourEnd && $hour>=$hourStart)
                                    <div class="bg-white pt-1 pb-1 pl-2 pr-2 mt-1 border-1 rounded-2 w-max-cont">
                                        <img src="/media/images/icon/green.png" alt=""> <span>открыто, осталось {{Shops::getTimeNowEnd($hour, $hourEnd)}} часов</span>
                                    </div>
                                @else
                                    <div class="bg-white pt-1 pb-1 pl-2 pr-2 mt-1 border-1 rounded-2 w-max-cont">
                                        <img src="/media/images/icon/red.png" alt=""> <span>закрыто, ещё {{Shops::getTimeEndNow($hour, $hourStart, $hourEnd)}} часов</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-2 col-md-4">
                                <input id="radio-{{ $shop->id }}" type="radio" name="shop" value="{{ $shop->id }}" onchange="shopChange({{$shop->id}}, {{auth()->user()->id}})">
                                <label for="radio-{{ $shop->id }}" class="btn btn-lg btn-orange mb-3 w-100 @if($shop->id==auth()->user()->shop) active-change @endif">Выбрать для покупок</label>
                                <div class="btn btn-lg btn-outline-orange w-100">Показать на карте</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
