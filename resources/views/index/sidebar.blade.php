<div class="am-u-md-4 blog-sidebar">
    <div class="am-panel-group">

        <section class="am-panel am-panel-default">
            <div class="am-panel-hd">最新文章</div>
            <ul class="am-list blog-list">
                @foreach($lastestArticle as $article)
                    <li><a href="{{route('article.show', ['article' => $article->id])}}">{{$article->title}}</a></li>
                @endforeach
            </ul>
        </section>
        <section class="am-panel am-panel-default">
            <div class="am-panel-hd">分类</div>
            <ul class="am-list blog-list">
                @foreach($cates as $cate)
                    <li><a href="{{route('cate.show', ['cate' => $cate->id])}}">{{$cate->title}}({{$cate->count}})</a></li>
                @endforeach
            </ul>
        </section>
        <section class="am-panel am-panel-default">
            <div class="am-panel-hd">标签</div>
            <div class="am-panel-bd">
                <p>
                @foreach($tags as $tag)
                    <a href="{{route('tag.show', ['tag' => $tag->id])}}">{{$tag->title}}({{$tag->count}})</a>&nbsp;&nbsp;
                    @endforeach
                </p>
            </div>
        </section>
        @if(count($links) != 0)
        <section class="am-panel am-panel-default">
            <div class="am-panel-hd">链接</div>
            <ul class="am-list blog-list">
                @foreach($links as $link)
                    <li><a href="{{$link->url}}" title="{{$link->description or ''}}">{{$article->title}}</a></li>
                @endforeach
            </ul>
        </section>
        @endif
    </div>
</div>