<div class="am-form-group">
    <label for="doc-ipt-email-1">标题</label>
    <input type="text" class="" name="title" id="doc-ipt-email-1" placeholder="标题" value="{{$page->title or old('title')}}">
</div>
<div class="am-form-group">
    <label for="doc-content-1">内容</label>
    <textarea class="" rows="8" id="doc-content-1" name="content">{{$page->content or old('content')}}</textarea>
</div>
<div class="am-checkbox">
    <label>
        <input type="checkbox" name="isAllowCommet"
               @if(!empty($page) && $page->isAllowCommet == 1)
                checked
               @elseif(!empty($page) && $page->isAllowCommet == 0)
               @else
                checked
                @endif> 是否允许评论
    </label>
</div>
<div class="am-checkbox">
    <label>
        <input type="checkbox" name="isTop" value="1"
               @if(!empty($page) && $page->isTop == 1)
               checked
                @endif> 置顶
    </label>
</div>
<div class="am-form-group">
    <label for="doc-ipt-order-1">排序</label>
    <input type="text" class="" name="order" id="doc-ipt-order-1" placeholder="排序" value="{{$page->order or old('order')}}">
</div>
<div class="am-form-group">
    <label class="am-radio-inline">
        <input type="radio"  value="1" name="status"
               @if(empty($page) ||$page->status == 1)
                   checked
                @endif
        > 发布
    </label>
    <label class="am-radio-inline">
        <input type="radio" name="status"  value="0"
               @if(!empty($page) && $page->status == 0)
                    checked
                @endif
        > 草稿
    </label>
</div>
{{csrf_field()}}