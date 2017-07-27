<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
    <style>
        .side-nav li.active {
            background-color: #ee6e73 !important;
        }
        h1.header {
            background-color: #ee6e73;
            padding: 15px;
            color: #ffffff;
            font-size: 25px;
            text-transform: uppercase;
        }
        h2.header {
            color:#ee6e73;
            font-size: 20px;
            text-transform: uppercase;
        }
        h3.header {
            color:#ee6e73;
        }
        .tocify ul li {
            text-transform: uppercase;
        }
        .tocify ul ul li {
            padding-left: 15px;
            text-transform: none;
        }
        .tocify ul ul li a {
            font-size: 12px;
            font-weight: 400;
        }
        .tocify ul ul ul li {
            padding-left: 30px;
            text-transform: none;
        }
        pre {
            position: relative;
            padding: 25px 12px 7px 12px;
            border: solid 1px rgba(51,51,51,0.12);
            background-color: #F0F0F0;
        }
        pre:before {
            position: absolute;
            padding: 1px 5px;
            background: #e8e6e3;
            top: 0;
            left: 0;
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            color: #555;
            content: attr(class);
            font-size: .9rem;
            border: solid 1px rgba(51,51,51,0.12);
            border-top: none;
            border-left: none;
        }
        pre[class="java"]:before {
            content: 'blade';
        }
        code {
            color: black;
            font-family: 'Inconsolata', Monaco, Consolas, 'Andale Mono', monospace;
            direction: ltr;
            text-align: left;
            white-space: pre;
            word-spacing: normal;
            word-break: normal;
            line-height: 1.4;
            -moz-tab-size: 4;
            -o-tab-size: 4;
            tab-size: 4;
            -webkit-hyphens: none;
            -moz-hyphens: none;
            -ms-hyphens: none;
            hyphens: none;
        }
        iframe {
            width: 100%;
        }
    </style>
    @yield('scripts', '')
    <script>
        @if (class_exists('Spark'))
            window.Spark = {!! json_encode(array_merge(Spark::scriptVariables(), [])) !!};
        @endif
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
        }
    </script>
</head>
<body>
    <div>
        <main>
            <div>
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('ul.tabs').tabs();
            jQuery('pre code').each(function (i, block) {
                hljs.highlightBlock(block);
            });
        });
    </script>
</body>
</html>
