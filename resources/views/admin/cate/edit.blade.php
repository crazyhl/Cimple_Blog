@extends('admin.laytout')

@section('content')
    @include('common.errors')
    <form class="am-form" method="post" action="{{route('admin.cate.update', ['cate' => $cate->id])}}">
        <fieldset>
            <legend>{{$title}}</legend>
            @include('admin.cate.form')
            {{method_field('PUT')}}
            <input type="hidden" name="id" value="{{$cate->id}}">
            <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
        </fieldset>
    </form>
@endsection