<div class="am-form-group">
    <label for="doc-ipt-email-1">标题</label>
    <input type="text" class="" name="title" id="doc-ipt-email-1" placeholder="标题" value="{{$link->title or ''}}">
</div>
<div class="am-form-group">
    <label for="doc-ta-1">描述</label>
    <input type="text" class="" name="description" id="doc-ta-1" placeholder="描述" value="{{$link->description or ''}}">
</div>

<div class="am-form-group">
    <label for="doc-ipt-order-1">url</label>
    <input type="text" class="" name="url" id="doc-ipt-order-1" placeholder="排序" value="{{$link->url or ''}}">
</div>
{{csrf_field()}}