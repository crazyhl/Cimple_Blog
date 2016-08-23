<div class="am-form-group">
    <label for="doc-ipt-email-1">标题</label>
    <input type="text" class="" name="title" id="doc-ipt-email-1" placeholder="标题" value="{{$article->title or ''}}">
</div>
<div class="am-form-group">
    <label for="doc-select-1" >分类</label>
    <select id="doc-select-1" name="cate[]" multiple data-am-selected>
        @foreach($cates as $cate)
            <option value="{{$cate->id}}"
                    @if(!empty($article) && in_array($cate->id, $article->cates()->lists('id')->toArray()))
                    selected
                    @endif
            >
                {{$cate->title}}
            </option>
        @endforeach
    </select>
    <span class="am-form-caret"></span>
</div>
<div class="am-form-group">
    <label for="doc-tag-1" >标签</label>
    <input type="text" class="" name="tags" id="doc-tag-1" placeholder="标签 以英文逗号分割" value="@if(!empty($article)){{implode(',', $article->tags()->lists('title')->toArray())}}@endif">
</div>
<div class="am-form-group">
    <label for="doc-content-1">内容</label>
    <textarea class="" rows="8" id="doc-content-1" name="content">{{$article->content or ''}}</textarea>
</div>
<div class="am-checkbox">
    <label>
        <input type="checkbox" name="isAllowCommet"
               @if(!empty($article) && $article->isAllowCommet == 1)
                checked
               @elseif(!empty($article) && $article->isAllowCommet == 0)
               @else
                checked
                @endif> 是否允许评论
    </label>
</div>
<div class="am-checkbox">
    <label>
        <input type="checkbox" name="isTop" value="1"
               @if(!empty($article) && $article->isTop == 1)
               checked
                @endif> 置顶
    </label>
</div>
<div class="am-form-group">
    <label for="doc-ipt-order-1">排序</label>
    <input type="text" class="" name="order" id="doc-ipt-order-1" placeholder="排序" value="{{$cate->order or 0}}">
</div>
<div class="am-form-group">
    <label class="am-radio-inline">
        <input type="radio"  value="1" name="status"
               @if(empty($article) ||$article->status == 1)
                   checked
                @endif
        > 发布
    </label>
    <label class="am-radio-inline">
        <input type="radio" name="status"  value="0"
               @if(!empty($article) && $article->status == 0)
                    checked
                @endif
        > 草稿
    </label>
</div>
{{csrf_field()}}


@section('style')
    <link rel="stylesheet" href="{{asset('/css/selectize.bootstrap3.css')}}">
@endsection

@section('script')
    <script src="{{asset('/js/standalone/selectize.js')}}"></script>
    <script>
        $(function () {
            $('#doc-tag-1').selectize({
                persist: false,
                createOnBlur: true,
                create: true,
                valueField: 'tag',
                labelField: 'tag',
                searchField: ['tag'],
                options: [
                        @foreach($tags as $tag)
                            {tag: '{{$tag->title}}'},
                        @endforeach
                ],
            });
        });
    </script>
@endsection