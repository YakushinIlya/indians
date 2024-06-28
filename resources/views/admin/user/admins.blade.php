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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route("admin.user.add") }}" class="btn btn-primary mb-3 text-white" id="submit_data">Добавить пользователя</a>
                        <div class="table-responsive">
                            <table class="table  table-bordered" id="makeEditable">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Ф.И.О</th>
                                    <th>Телефон</th>
                                    <th>E-mail</th>
                                    <th>Пол</th>
                                    <th>Роль</th>
                                    <th>Статус</th>
                                    <th>Дата рождения</th>
                                    <th name="buttons"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->fio }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->genderTitle }}</td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    <div class="text-primary">{{ $role->name }}</div>
                                                @endforeach
                                            </td>
                                            <td>
                                                <span class="badge @if($user->status==1) badge-soft-success @elseif($user->status==0) badge-soft-danger @endif">{{ $user->statusTitle }}</span>
                                            </td>
                                            <td>{{ $user->db_day }}.{{ $user->db_month }}.{{ $user->db_year }}</td>
                                            <td name="buttons">
                                                <div class="d-flex">
                                                    <a href="{{ route("admin.user.edit", ["id"=>$user->id]) }}" class="btn btn-primary mr-1"><i class="dripicons-pencil"></i></a>
                                                    <form action="{{ route("admin.user.delete", ["id"=>$user->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button role="submit" class="btn btn-danger"><i class="dripicons-trash"></i></button>
                                                    </form>
                                                    @if($user->status==1)
                                                        <a href="{{ route("admin.user.lock", ["id"=>$user->id]) }}" class="btn btn-warning ml-1"><i class="dripicons-lock"></i></a>
                                                    @elseif($user->status==0)
                                                        <a href="{{ route("admin.user.unlock", ["id"=>$user->id]) }}" class="btn btn-success ml-1"><i class="dripicons-lock-open"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {!! $users->links() !!}

                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div>

    </div><!-- container -->
@endsection

@section("footer")
    @include("admin.footer")
@endsection
