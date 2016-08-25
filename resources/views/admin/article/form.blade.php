<div class="am-form-group">
    <label for="doc-ipt-email-1">标题</label>
    <input type="text" class="" name="title" id="doc-ipt-email-1" placeholder="标题" value="{{$article->title or old('title')}}">
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
<div class="am-form-group" id="qn-container">
    <button type="button" class="am-btn am-btn-default" id="pickfiles">
        <span>选择文件</span>
    </button>
    <div>
        <textarea id="qn-uploaer-result" disabled rows="8"></textarea>
    </div>
</div>
<div class="am-form-group">
    <label for="doc-content-1">内容</label>
    <textarea class="" rows="8" id="doc-content-1" name="content">{{$article->content or old('content')}}</textarea>
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
    <input type="text" class="" name="order" id="doc-ipt-order-1" placeholder="排序" value="{{$article->order or old('order')}}">
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
    <script src="{{asset('/js/plupload.full.min.js')}}"></script>
    <script src="{{asset('/js/qiniu.js')}}"></script>
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
            var resultArea = $('#qn-uploaer-result');
            var uploader = Qiniu.uploader({
                runtimes: 'html5,flash,html4',      // 上传模式，依次退化
                browse_button: 'pickfiles',         // 上传选择的点选按钮，必需
                // 在初始化时，uptoken，uptoken_url，uptoken_func三个参数中必须有一个被设置
                // 切如果提供了多个，其优先级为uptoken > uptoken_url > uptoken_func
                // 其中uptoken是直接提供上传凭证，uptoken_url是提供了获取上传凭证的地址，如果需要定制获取uptoken的过程则可以设置uptoken_func
                // uptoken : '<Your upload token>', // uptoken是上传凭证，由其他程序生成
                uptoken_url: '{{url("/admin/qiniu/token")}}',         // Ajax请求uptoken的Url，强烈建议设置（服务端提供）
                // uptoken_func: function(file){    // 在需要获取uptoken时，该方法会被调用
                //    // do something
                //    return uptoken;
                // },
                get_new_uptoken: false,             // 设置上传文件的时候是否每次都重新获取新的uptoken
                // downtoken_url: '/downtoken',
                // Ajax请求downToken的Url，私有空间时使用，JS-SDK将向该地址POST文件的key和domain，服务端返回的JSON必须包含url字段，url值为该文件的下载地址
                unique_names: true,              // 默认false，key为文件名。若开启该选项，JS-SDK会为每个文件自动生成key（文件名）
                // save_key: true,                  // 默认false。若在服务端生成uptoken的上传策略中指定了sava_key，则开启，SDK在前端将不对key进行任何处理
                domain: 'http://cimple.qiniudn.com/',     // bucket域名，下载资源时用到，必需
                container: 'qn-container',             // 上传区域DOM ID，默认是browser_button的父元素
                max_file_size: '100mb',             // 最大文件体积限制
                flash_swf_url: "{{asset('/js/Moxie.swf')}}",  //引入flash，相对路径
                max_retries: 3,                     // 上传失败最大重试次数
                dragdrop: true,                     // 开启可拖曳上传
                drop_element: 'container',          // 拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
                chunk_size: '4mb',                  // 分块上传时，每块的体积
                auto_start: true,                   // 选择文件后自动上传，若关闭需要自己绑定事件触发上传
                //x_vars : {
                //    查看自定义变量
                //    'time' : function(up,file) {
                //        var time = (new Date()).getTime();
                // do something with 'time'
                //        return time;
                //    },
                //    'size' : function(up,file) {
                //        var size = file.size;
                // do something with 'size'
                //        return size;
                //    }
                //},
                init: {
                    'FilesAdded': function(up, files) {
                    },
                    'BeforeUpload': function(up, file) {
                        // 每个文件上传前，处理相关的事情
                    },
                    'UploadProgress': function(up, file) {
                        // 每个文件上传时，处理相关的事情
                    },
                    'FileUploaded': function(up, file, info) {
                        // 每个文件上传成功后，处理相关的事情
                        // 其中info是文件上传成功后，服务端返回的json，形式如：
                        // {
                        //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                        //    "key": "gogopher.jpg"
                        //  }
                        // 查看简单反馈
                        var domain = up.getOption('domain');
                        var res = JSON.parse(info);
                        var sourceLink = domain + res.key; //获取上传成功后的文件的Url
                        resultArea.text(resultArea.text() + sourceLink + "\n");
                    },
                    'Error': function(up, err, errTip) {
                        //上传出错时，处理相关的事情
                    },
                    'UploadComplete': function() {
                        //队列文件处理完毕后，处理相关的事情
                    },
                    'Key': function(up, file) {
                        // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                        // 该配置必须要在unique_names: false，save_key: false时才生效

//                        var key = "";
//                        // do something with key here
//                        return key
                    }
                }
            });
        });

    </script>
@endsection