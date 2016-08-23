@extends('admin.laytout')

@section('content')
    @include('common.errors')
    <form class="am-form" method="post" action="{{route('admin.page.update', ['page' => $page->id])}}">
        <fieldset>
            <legend>{{$title}}</legend>
            @include('admin.page.form')
            {{method_field('PUT')}}
            <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
        </fieldset>
    </form>
@endsection