<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <title>Burea | Emilio Molina</title>

    <!-- additional styles for plugins -->
    <!-- htmleditor (codeMirror) -->
    <link rel="stylesheet" href="{{ asset('assets/codemirror/lib/codemirror.css') }}">
    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('assets/select2/dist/css/select2.min.css') }}">

    <!-- uikit -->
    <link rel="stylesheet" href="{{ asset('assets/uikit/css/uikit.almost-flat.min.css') }}" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="{{ asset('/css/main.min.css') }}" media="all">


</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">

<header id="header_main">
    <div class="header_main_content">
        <nav class="uk-navbar uk-text-right">

            <!-- main sidebar switch -->
            <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                <span class="sSwitchIcon"></span>
            </a>

            <!-- secondary sidebar switch -->
            <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                <span class="sSwitchIcon"></span>
            </a>

            <span class="uk-margin-small-top" style="font-weight: bold; color: white"> By: Emilio Molina</span>
        </nav>
    </div>
</header>
<!-- main header end -->

<!-- main sidebar -->
<aside id="sidebar_main">

    <div class="sidebar_main_header uk-text-center" style="height: 45px;">
        <div class="sidebar_logo">
            <a href="{{ url('/') }}">
                <h3>MarkdownEditor</h3>
            </a>
        </div>
    </div>

    <div>
        <a href="{{ url('/') }}" class="md-btn md-btn-primary uk-margin-small-top" style="margin-left: 50px">Add New</a>
    </div>

    <div class="menu_section">
        <ul>
            @foreach($documents as $d)
            <li title="{{ $d->title }}">
                <a href="{{ route('show', $d->id) }}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">{{ $d->title }}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</aside>
<!-- main sidebar end -->

<div id="page_content">
    <div id="page_content_inner">

        @if(Session::has('message'))
            <div class="uk-notify-message uk-notify-message-{{ Session::get('alert-class', 'alert-info') }}">
                <a class="uk-close"></a>
                <div>
                    {{ Session::get('message') }}
                </div>
            </div>
        @endif

        @if(isset($first))
        <form action="{{ route('update', $first->id) }}" method="post">
        @else
        <form action="{{ route('create') }}" method="post">
        @endif
            @csrf
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <label>Title</label>
                            <input type="text" name="title" class="input-count md-input" id="input_counter" maxlength="60" value="{{ $first->title ?? '' }}" required/>
                        </div>
                        @if(isset($first))
                        <div class="uk-width-medium-2-3 uk-text-right">
                            <b>Created:</b> {{ $first->created_at ?? '' }}
                            <br>
                            <b>Updated:</b> {{ $first->updated_at ?? '' }}
                        </div>
                        @endif
                    </div>
                    <textarea name="content" data-uk-htmleditor="{ maxsplitsize:900, codemirror : { mode: 'text/html' } }">{!! $first->content ?? '' !!}</textarea>
                </div>
            </div>

            <div class="md-fab-wrapper">
                @if(isset($first))
                    <button type="submit" class="md-fab md-fab-accent" href="#">
                        <i class="material-icons" title="Save">save</i>
                    </button>
                @else
                    <button type="submit" class="md-fab md-fab-accent" href="#">
                        <i class="material-icons" title="Save">save</i>
                    </button>
                @endif
            </div>
        </form>
        @if(isset($first))
        <div class="md-fab-wrapper" style="margin-right: 80px">
            <form action="{{ route('delete', $first->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="md-fab md-fab-danger" href="#">
                    <i class="material-icons" title="Delete">delete</i>
                </button>
            </form>
        </div>
        @endif
    </div>
</div>

<!-- google web fonts -->
<script>
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>

<!-- common functions -->
<script src="{{ asset('assets/js/common.js') }}"></script>
<!-- uikit functions -->
<script src="{{ asset('js/uikit_custom.min.js') }}"></script>
<!-- altair common functions/helpers -->
<script src="{{ asset('assets/js/altair_admin_common.js') }}"></script>

<!-- page specific plugins -->
<!-- jquery ui -->
<script src="{{ asset('assets/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- ionrangeslider -->
<script src="{{ asset('assets/ion.rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!-- htmleditor (codeMirror) -->
<script src="{{ asset('js/uikit_htmleditor_custom.min.js') }}"></script>
<!-- inputmask -->
<script src="{{ asset('assets/jquery.inputmask/dist/jquery.inputmask.bundle.js') }}"></script>
<!-- select2 -->
<script src="{{ asset('assets/select2/dist/js/select2.min.js') }}"></script>


<!--  forms advanced functions -->
<script src="{{ asset('assets/js/forms_advanced.min.js') }}"></script>

<script>
    $(function() {
        if(isHighDensity()) {
            $.getScript( "assets/js/custom/dense.min.js", function(data) {
                // enable hires images
                altair_helpers.retina_images();
            });
        }
        if(Modernizr.touch) {
            // fastClick (touch devices)
            FastClick.attach(document.body);
        }
    });
    $window.load(function() {
        // ie fixes
        altair_helpers.ie_fix();
    });
</script>
</body>
</html>
