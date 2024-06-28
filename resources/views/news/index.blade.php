@extends("layouts.app")

@section("content")
    <div class="row news">
        <div class="col-md-9 new-single">
            <div class="pb-5">
                <h1>{{ $new->title }}</h1>
                <span class="new-date bg-white pt-1 pb-1 pl-2 pr-2 border-1 rounded-2">
            <img src="/media/images/icon/time.png" alt=""> <span>{{ date("d.m.Y", strtotime($new->created_at)) }}</span>
          </span>
            </div>
            <img src="{{ $new->image }}" alt="" class="img-fluid" style="width: 100%; max-height: 450px; object-fit: cover;">

            {!! $new->content !!}

        </div>
    </div>
@endsection
