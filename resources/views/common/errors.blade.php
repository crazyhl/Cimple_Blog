@if (count($errors) > 0)
    <!-- 表单错误清单 -->
    <div class="am-panel am-panel-danger">
        <div class="am-panel-hd">哎呀！出了些问题</div>
        <div class="am-panel-bd">

            <ul class="am-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif