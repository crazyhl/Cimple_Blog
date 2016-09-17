<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{$title}} - {{$option['TITLE']}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="{{asset('/css/amazeui.min.css')}}"/>
    <link rel="alternate icon" type="image/png" href="/i/favicon.png">
    <link href="//cdn.bootcss.com/highlight.js/9.6.0/styles/tomorrow-night.min.css" rel="stylesheet">
    <style>
        @media only screen and (min-width: 1200px) {
            .blog-g-fixed {
                max-width: 1200px;
            }
        }

        @media only screen and (min-width: 641px) {
            .blog-sidebar {
                font-size: 1.4rem;
            }
        }

        .blog-main {
            padding: 20px 0;
        }

        .blog-title {
            margin: 10px 0 20px 0;
        }

        .blog-meta {
            font-size: 14px;
            margin: 10px 0 20px 0;
            color: #222;
        }

        .blog-meta a {
            color: #27ae60;
        }

        .blog-pagination a {
            font-size: 1.4rem;
        }

        .blog-team li {
            padding: 4px;
        }

        .blog-team img {
            margin-bottom: 0;
        }

        .blog-content img,
        .blog-team img {
            max-width: 100%;
            height: auto;
        }

        .blog-footer {
            padding: 10px 0;
            text-align: center;
        }
    </style>
    @yield('style')
</head>
<body>
@include('index.menu')

<div class="am-g am-g-fixed blog-g-fixed">
    <div class="am-u-md-8">
        @yield('content')

    </div>

    @include('index.sidebar')

</div>

<footer class="blog-footer">
    <p>{{$option['TITLE']}}<br/>
        <small>
            © Copyright 2016. by the Cimple.
            @if($option['BN_NO'])
                | <a href="http://www.miibeian.gov.cn" target="_blank">{{$option['BN_NO']}}</a>
            @endif
            @if($option['STATISTICS'])
                {!! $option['STATISTICS'] !!}
            @endif
        </small>
    </p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{asset('/js/jquery.min.js')}}"></script>
<!--<![endif]-->
<script src="{{asset('/js/amazeui.min.js')}}"></script>
<script src="{{asset('/js/app.js')}}"></script>
<script src="//cdn.bootcss.com/highlight.js/9.6.0/highlight.min.js"></script>
<script >hljs.initHighlightingOnLoad();</script>
@yield('script')

</body>
</html>
