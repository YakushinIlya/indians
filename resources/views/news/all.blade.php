@extends("layouts.app")

@section("content")
    <div class="row news pt-5">
        <div class="col-md-3">
            <aside class="p-4">
                <h2 class="h4">Разделы</h2>
                <ul>
                    @foreach($rubrics as $rubric)
                        <li>
                            <a href="{{ route("news.rubric", ["slug"=>$rubric->slug]) }}" class="text-dark text-decoration-none">{{ $rubric->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>

        <div class="col-md-9">
            <article>
                <div class="row news-items">
                    @foreach($news as $new)
                        <div class="new-item col-md-6">
                            <div class="new">
                                <img src="{{ $new->image }}" alt="" class="img-fluid img-new">
                                <div class="new-info p-2 bg-white">
                                    <a href="{{ route("news.index", ["slug"=>$new->slug]) }}">
                                        <h2 class="h6">{{ $new->title }}</h2>
                                    </a>
                                    <div class="new-date">
                                        <img src="/media/images/icon/time.png" alt=""> <span>{{ date("d.m.Y", strtotime($new->created_at)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {!! $news->links() !!}
                </div>
            </article>
        </div>
    </div>
@endsection
