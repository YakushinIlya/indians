@extends("layouts.app")

@section("content")
    <div class="row pt-5 pb-5">
        <div class="col-12 mb-5 mt-5">
            <div class="pb-2 text-center">
                <h1>Добавьте товары, которые хотите купить</h1>
                <p>А чтобы их найти, загляните в каталог<br>
                    или в раздел со скидками</p>
                <a class="btn btn-lg btn-orange" href="{{route('catalog.index')}}">В каталог</a>
            </div>
        </div>
    </div>
@endsection
