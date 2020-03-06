<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Linn App Store</title>

    <link rel="icon" href="http://appstore.test/img/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="http://appstore.test/img/favicon.png" type="image/x-icon" />

    <meta name="csrf-token" content="pUC9p0TaXaankh6Yw6jwHuhqZGVROZZHKB9NA9qk">

    <!-- Icons -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-theme" href="{{ asset('/css/dcm.css') }}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('/css/themes/green.css') }}">

    <style>
        .cc-window {
            opacity: 1;
            transition: opacity 1s ease
        }
        
        .cc-window.cc-invisible {
            opacity: 0
        }
        
        .cc-animate.cc-revoke {
            transition: transform 1s ease
        }
        
        .cc-animate.cc-revoke.cc-top {
            transform: translateY(-2em)
        }
        
        .cc-animate.cc-revoke.cc-bottom {
            transform: translateY(2em)
        }
        
        .cc-animate.cc-revoke.cc-active.cc-bottom,
        .cc-animate.cc-revoke.cc-active.cc-top,
        .cc-revoke:hover {
            transform: translateY(0)
        }
        
        .cc-grower {
            max-height: 0;
            overflow: hidden;
            transition: max-height 1s
        }
        
        .cc-link,
        .cc-revoke:hover {
            text-decoration: underline
        }
        
        .cc-revoke,
        .cc-window {
            position: fixed;
            overflow: hidden;
            box-sizing: border-box;
            font-family: Helvetica, Calibri, Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5em;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            z-index: 9999
        }
        
        .cc-window.cc-static {
            position: static
        }
        
        .cc-window.cc-floating {
            padding: 2em;
            max-width: 24em;
            -ms-flex-direction: column;
            flex-direction: column
        }
        
        .cc-window.cc-banner {
            padding: 1em 1.8em;
            width: 100%;
            -ms-flex-direction: row;
            flex-direction: row
        }
        
        .cc-revoke {
            padding: .5em
        }
        
        .cc-header {
            font-size: 18px;
            font-weight: 700
        }
        
        .cc-btn,
        .cc-close,
        .cc-link,
        .cc-revoke {
            cursor: pointer
        }
        
        .cc-link {
            opacity: .8;
            display: inline-block;
            padding: .2em
        }
        
        .cc-link:hover {
            opacity: 1
        }
        
        .cc-link:active,
        .cc-link:visited {
            color: initial
        }
        
        .cc-btn {
            display: block;
            padding: .4em .8em;
            font-size: .9em;
            font-weight: 700;
            border-width: 2px;
            border-style: solid;
            text-align: center;
            white-space: nowrap
        }
        
        .cc-highlight .cc-btn:first-child {
            background-color: transparent;
            border-color: transparent
        }
        
        .cc-highlight .cc-btn:first-child:focus,
        .cc-highlight .cc-btn:first-child:hover {
            background-color: transparent;
            text-decoration: underline
        }
        
        .cc-close {
            display: block;
            position: absolute;
            top: .5em;
            right: .5em;
            font-size: 1.6em;
            opacity: .9;
            line-height: .75
        }
        
        .cc-close:focus,
        .cc-close:hover {
            opacity: 1
        }
        
        .cc-revoke.cc-top {
            top: 0;
            left: 3em;
            border-bottom-left-radius: .5em;
            border-bottom-right-radius: .5em
        }
        
        .cc-revoke.cc-bottom {
            bottom: 0;
            left: 3em;
            border-top-left-radius: .5em;
            border-top-right-radius: .5em
        }
        
        .cc-revoke.cc-left {
            left: 3em;
            right: unset
        }
        
        .cc-revoke.cc-right {
            right: 3em;
            left: unset
        }
        
        .cc-top {
            top: 1em
        }
        
        .cc-left {
            left: 1em
        }
        
        .cc-right {
            right: 1em
        }
        
        .cc-bottom {
            bottom: 1em
        }
        
        .cc-floating>.cc-link {
            margin-bottom: 1em
        }
        
        .cc-floating .cc-message {
            display: block;
            margin-bottom: 1em
        }
        
        .cc-window.cc-floating .cc-compliance {
            -ms-flex: 1 0 auto;
            flex: 1 0 auto
        }
        
        .cc-window.cc-banner {
            -ms-flex-align: center;
            align-items: center
        }
        
        .cc-banner.cc-top {
            left: 0;
            right: 0;
            top: 0
        }
        
        .cc-banner.cc-bottom {
            left: 0;
            right: 0;
            bottom: 0
        }
        
        .cc-banner .cc-message {
            display: block;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            max-width: 100%;
            margin-right: 1em
        }
        
        .cc-compliance {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-line-pack: justify;
            align-content: space-between
        }
        
        .cc-floating .cc-compliance>.cc-btn {
            -ms-flex: 1;
            flex: 1
        }
        
        .cc-btn+.cc-btn {
            margin-left: .5em
        }
        
        @media print {
            .cc-revoke,
            .cc-window {
                display: none
            }
        }
        
        @media screen and (max-width:900px) {
            .cc-btn {
                white-space: normal
            }
        }
        
        @media screen and (max-width:414px) and (orientation:portrait),
        screen and (max-width:736px) and (orientation:landscape) {
            .cc-window.cc-top {
                top: 0
            }
            .cc-window.cc-bottom {
                bottom: 0
            }
            .cc-window.cc-banner,
            .cc-window.cc-floating,
            .cc-window.cc-left,
            .cc-window.cc-right {
                left: 0;
                right: 0
            }
            .cc-window.cc-banner {
                -ms-flex-direction: column;
                flex-direction: column
            }
            .cc-window.cc-banner .cc-compliance {
                -ms-flex: 1 1 auto;
                flex: 1 1 auto
            }
            .cc-window.cc-floating {
                max-width: none
            }
            .cc-window .cc-message {
                margin-bottom: 1em
            }
            .cc-window.cc-banner {
                -ms-flex-align: unset;
                align-items: unset
            }
            .cc-window.cc-banner .cc-message {
                margin-right: 0
            }
        }
        
        .cc-floating.cc-theme-classic {
            padding: 1.2em;
            border-radius: 5px
        }
        
        .cc-floating.cc-type-info.cc-theme-classic .cc-compliance {
            text-align: center;
            display: inline;
            -ms-flex: none;
            flex: none
        }
        
        .cc-theme-classic .cc-btn {
            border-radius: 5px
        }
        
        .cc-theme-classic .cc-btn:last-child {
            min-width: 140px
        }
        
        .cc-floating.cc-type-info.cc-theme-classic .cc-btn {
            display: inline-block
        }
        
        .cc-theme-edgeless.cc-window {
            padding: 0
        }
        
        .cc-floating.cc-theme-edgeless .cc-message {
            margin: 2em 2em 1.5em
        }
        
        .cc-banner.cc-theme-edgeless .cc-btn {
            margin: 0;
            padding: .8em 1.8em;
            height: 100%
        }
        
        .cc-banner.cc-theme-edgeless .cc-message {
            margin-left: 1em
        }
        
        .cc-floating.cc-theme-edgeless .cc-btn+.cc-btn {
            margin-left: 0
        }
    </style>

    <style>
        #page-footer {
            padding-top: 2rem;
            min-height: auto !important;
        }
    </style>

</head>

<body style="background-color: #ffffff">

    <div id="page-container" class="page-header-dark main-content-boxed">
        <div class="block-content block-content-full bg-gd-lake-op text-center">
            <p class="text-white font-size-h3 font-w300 mt-3 mb-0">
                Linn App Store
            </p>
        </div>
        <main id="main-container">
            <div class="content content-full">

                <div class="row">

                    <div class="col-lg-12 col-xl-12" >

                        <div class="row">
                            <div class="block block-rounded" style="width: 100% !important;">
                                <div class="block-content block-content-full">

                                    <div class="">

                                        <div class="block-content tab-content">

                                            <div class="tab-pane  active " id="cat-1" role="tabpanel">

                                                <!-- <ul class="list-unstyled"> -->
                                                <div class="row">
                                                    @foreach($categories as $cat)

                                                    <div class="col-6">
                                                        <a class="block block-transparent block-link-pop text-center mb-0" href="{{ route('application',$cat->id)}}" style="text-decoration: none;">
                                                            <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center" style="margin-bottom: 10px; border: 1px solid #ecf0f5; border-radius: 10px;">
                                                                <div>
                                                                    <!-- <i class="fab fa-google-play text-primary mr-1"></i> -->
                                                                    <div class="font-w600 mt-2 text-uppercase"> <strong style="color: #365AF0;">{{ $cat->category_name}} </strong></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    @endforeach

                                                  
                                                </div>
                                                <!-- </ul> -->
                                            </div>
                                            
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('/js/dcm.js') }}"></script>

</body>

</html>