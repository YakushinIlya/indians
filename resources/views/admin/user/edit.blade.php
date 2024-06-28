@extends("layouts.admin")

@section("sidebar")
    @include("admin.sidebar")
@endsection

@section("toolbar")
    @include("admin.toolbar")
@endsection

@section("content")
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">{{ $title }}</h4>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route("admin.user.update", ["id"=>$user->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="fio">Ф.И.О</label>
                                <input type="text" name="fio" class="form-control" id="fio" value="{{ $user->fio }}" placeholder="Иванов Иван Иванович">
                            </div>
                            <div class="form-group">
                                <label for="phone">Номер телефона</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}" placeholder="+7(999)999-9999">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail адрес</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" placeholder="info@idile.ru">
                            </div>
                            <div class="col-md-4 pl-0 mb-3">
                                <label for="date-birth" class="form-label">Дата рождения</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="db_day" value="{{ $user->db_day }}" id="date-birth" placeholder="00">
                                    <input type="text" class="form-control" name="db_month" value="{{ $user->db_month }}" placeholder="00">
                                    <input type="text" class="form-control" name="db_year" value="{{ $user->db_year }}" placeholder="0000">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <label class="form-label">Пол</label>
                                </div>
                                <div class="btn-group btn-gender" role="group">
                                    <input type="radio" class="btn-check d-none" name="gender" id="btnradio1" value="1" {{ $user->gender == 1 ? "checked" : '' }}>
                                    <label class="btn btn-outline-secondary btn-lg-12px" for="btnradio1">М</label>

                                    <input type="radio" class="btn-check d-none" name="gender" id="btnradio3" value="2" {{ $user->gender == 2 ? "checked" : '' }}>
                                    <label class="btn btn-outline-secondary btn-lg-12px" for="btnradio3">Ж</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="0123456789">
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div>

    </div><!-- container -->
@endsection

@section("footer")
    @include("admin.footer")
@endsection
