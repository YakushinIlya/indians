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
                        <form action="{{ route("admin.feedback.contacts.create") }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Введите e-mail">
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Введите телефон">
                            </div>
                            <div class="form-group">
                                <label for="vk">Ссылка вконтакте</label>
                                <input type="text" name="vk" class="form-control" id="vk" placeholder="Введите ссылку на профиль или группу вконтакте">
                            </div>
                            <div class="form-group">
                                <label for="tg">Имя пользователя телеграм</label>
                                <input type="text" name="tg" class="form-control" id="tg" placeholder="Введите имя пользователя или группы телеграм">
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
