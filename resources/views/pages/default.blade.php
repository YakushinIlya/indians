@extends("layouts.app")

@section("content")
    <div class="row index">
        <div class="col-md-9 mt-5 mb-5">
            <h1>{{ $title }}</h1>
            {!! $content !!}
        </div>
    </div>
@endsection
