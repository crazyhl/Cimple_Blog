@extends('index.laytout')

@section('content')
    @foreach($articles as $article)
        <article class="blog-main">
            <h3 class="am-article-title blog-title">
                <a href="{{route('article.show', ['article' => $article->id])}}">{{$article->title}}</a>
            </h3>
            <h4 class="am-article-meta blog-meta">
                posted on {{$article->created_at}}
                under
                @foreach($article->cates()->get() as $c)
                    <a href="{{route('cate.show', ['cate' => $c->id])}}">{{$c->title}}</a>
                @endforeach

            </h4>

            <div class="am-g blog-content">
                <div class="am-u-lg-12">
                    @if(empty($article->description))
                        {!! \App\Helper::parseHtml($article->content) !!}
                    @else
                        {!! \App\Helper::parseHtml($article->description) !!}
                        <a href="{{route('article.show', ['article' => $article->id])}}">Read more</a>
                    @endif
                </div>

            </div>
        </article>
        <hr class="am-article-divider blog-hr">
    @endforeach
    {!! $articles->render(new \App\AmazeuiThreePresenter($articles)) !!}
@endsection