@extends("layouts.app")

@section("content")
    <div class="row catalog">
        <div class="col-md-12 mt-5 mb-5 pt-5">
            <span class="h1">Категория - {{ $category??0 }}</span>
        </div>

        <div class="col-md-12 bg-white border-1 rounded-4 mb-3 bg-xs-no-image">
            @foreach($categories as $cat)
                {{ $cat }}<br>
            @endforeach
        </div>
    </div>
@endsection
