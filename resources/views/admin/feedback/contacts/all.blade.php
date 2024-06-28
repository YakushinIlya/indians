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
                        <a href="{{ route("admin.feedback.contacts.add") }}" class="btn btn-primary mb-3 text-white" id="submit_data">Добавить контакты</a>
                        <div class="table-responsive">
                            <table class="table  table-bordered" id="makeEditable">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>E-mail</th>
                                    <th>Телефон</th>
                                    <th>Вконтакте</th>
                                    <th>Телеграм</th>
                                    <th>Статус</th>
                                    <th name="buttons"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->vk }}</td>
                                        <td>{{ $contact->tg }}</td>
                                        <td>
                                            @if($contact->active)
                                                <span class="badge badge-soft-success">Активен</span>
                                            @else
                                                <span class="badge badge-soft-danger">Не активен</span>
                                            @endif
                                        </td>
                                        <td name="buttons">
                                            <div class="d-flex">
                                                <a href="{{ route("admin.feedback.contacts.active", ["id"=>$contact->id]) }}" class="btn btn-success mr-1">Активировать</a>
                                                <a href="{{ route("admin.feedback.contacts.edit", ["id"=>$contact->id]) }}" class="btn btn-primary mr-1"><i class="dripicons-pencil"></i></a>
                                                <form action="{{ route("admin.feedback.contacts.delete", ["id"=>$contact->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button role="submit" class="btn btn-danger"><i class="dripicons-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {!! $contacts->links('pagination::bootstrap-4') !!}

                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div>

    </div><!-- container -->
@endsection

@section("footer")
    @include("admin.footer")
@endsection
