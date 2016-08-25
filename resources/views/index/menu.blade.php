<header class="am-topbar">
    <h1 class="am-topbar-brand">
        <a href="{{route('home')}}">{{$option['TITLE']}}</a>
    </h1>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
            data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
                class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            <li class="am-active"><a href="{{route('home')}}">首页</a></li>
            @foreach($pages as $page)
                <li><a href="{{route('page.show', ['article' => $page->id])}}">{{$page->title}}</a></li>
            @endforeach
        </ul>
    </div>
</header>