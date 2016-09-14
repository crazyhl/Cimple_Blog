@extends('index.laytout')

@section('content')
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
                {!! \App\Helper::parseHtml($article->content) !!}
            </div>
        </div>
        <div class="am-g ">
            <div class="am-u-lg-12">
                @foreach($article->tags()->get() as $t)
                    <a href="{{route('tag.show', ['tag' => $t->id])}}">{{$t->title}}</a>
                @endforeach
            </div>
        </div>
    </article>
    <hr class="am-article-divider blog-hr">
    @if($article->isAllowCommet == 1)
        <!-- <div data-am-widget="duoshuo" class="am-duoshuo am-duoshuo-default" data-ds-short-name="h57">
            <div class="ds-thread" >
            </div>
        </div> -->
    @endif
@endsection