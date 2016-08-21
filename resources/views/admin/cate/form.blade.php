<div class="am-form-group">
    <label for="doc-ipt-email-1">标题</label>
    <input type="text" class="" name="title" id="doc-ipt-email-1" placeholder="标题" value="{{$cate->title or ''}}">
</div>
<div class="am-form-group">
    <label for="doc-ta-1">描述</label>
    <textarea class="" rows="5" id="doc-ta-1" name="description">{{$cate->description or ''}}</textarea>
</div>

<div class="am-form-group">
    <label for="doc-ipt-order-1">排序</label>
    <input type="text" class="" name="order" id="doc-ipt-order-1" placeholder="排序" value="{{$cate->order or 0}}">
</div>
{{csrf_field()}}