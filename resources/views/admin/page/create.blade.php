@extends('admin.laytout')

@section('content')
    @include('common.errors')
    <form class="am-form" method="post" action="{{route('admin.page.store')}}">
        <fieldset>
            <legend>{{$title}}</legend>
            @include('admin.page.form')
            <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
        </fieldset>
    </form>
@endsection