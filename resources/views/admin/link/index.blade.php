@extends('admin.laytout')

@section('content')
    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf">
            {{$title}}
        </div>
    </div>

    <hr>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <a href="{{route('admin.link.create')}}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</a>
                </div>
            </div>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
                <thead>
                <tr>
                    <th class="table-title">标题</th>
                    <th class="table-type">URL</th>
                    <th class="table-author am-hide-sm-only">创建日期</th>
                    <th class="table-date am-hide-sm-only">修改日期</th>
                    <th class="table-set">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($links as $link)
                    <tr>
                        <td><a href="{{route('admin.link.edit', ['link'=> $link->id])}}">{{$link->title}}</a></td>
                        <td>{{$link->url}}</td>
                        <td class="am-hide-sm-only">{{$link->created_at}}</td>
                        <td class="am-hide-sm-only">{{$link->updated_at}}</td>
                        <td>
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <form action="{{route('admin.link.destroy', ['link' => $link->id ])}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span
                                                class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="am-cf">
                共 {{$links->total()}} 条记录
                <div class="am-fr">
                    {!! $links->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection