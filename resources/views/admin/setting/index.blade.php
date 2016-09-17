@extends('admin.laytout')

@section('content')
    <form class="am-form" method="post" action="{{url('admin/setting')}}">
        <fieldset>
            <legend>{{$title}}</legend>
            <div class="am-form-group">
                <label for="doc-title-email-1">站点标题</label>
                <input type="text" class="" name="TITLE" id="doc-title-email-1" placeholder="站点标题" value="{{$option['TITLE'] or ''}}">
            </div>
            <div class="am-form-group">
                <label for="doc-stitle-email-1">站点子标题</label>
                <input type="text" class="" name="SUB_TITLE" id="doc-stitle-email-1" placeholder="站点子标题" value="{{$option['SUB_TITLE'] or ''}}">
            </div>
            <div class="am-form-group">
                <label for="doc-keywords-email-1">关键词</label>
                <input type="text" class="" name="KEYWORDS" id="doc-keywords-email-1" placeholder="关键词" value="{{$option['KEYWORDS'] or ''}}">
            </div>
            <div class="am-form-group">
                <label for="doc-description-email-1">站点描述</label>
                <input type="text" class="" name="DESCRIPTION" id="doc-description-email-1" placeholder="站点描述" value="{{$option['DESCRIPTION'] or ''}}">
            </div>
            <div class="am-form-group">
                <label for="doc-perpage-email-1">每页分页数量</label>
                <input type="text" class="" name="PER_PAGE" id="doc-perpage-email-1" placeholder="每页分页数量" value="{{$option['PER_PAGE'] or ''}}">
            </div>
            <div class="am-form-group">
                <label for="doc-bnno-email-1">备案号</label>
                <input type="text" class="" name="BN_NO" id="doc-bnno-email-1" placeholder="备案号" value="{{$option['BN_NO'] or ''}}">
            </div>
            <div class="am-form-group">
                <label for="doc-bnno-email-1">统计代码</label>
                <input type="text" class="" name="STATISTICS" id="doc-bnno-email-1" placeholder="统计代码" value="{{$option['STATISTICS'] or ''}}">
            </div>
            {{csrf_field()}}
            <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
        </fieldset>
    </form>
@endsection