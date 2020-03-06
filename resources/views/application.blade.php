<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Linn App Store</title>

    <link rel="icon" href="http://103.83.190.196/appstore/public/img/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="http://103.83.190.196/appstore/public/img/favicon.png" type="image/x-icon" />

    <meta name="csrf-token" content="tidGsyouGdCB7i9px0SKyhsXHx4yjkdDXhJf9vcj">

    <!-- Icons -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-theme" href="{{ asset('/css/dcm.css') }}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('/css/themes/green.css') }}">

</head>

<body>

    <div id="page-container" class="page-header-dark main-content-boxed">

        <div class="block-content block-content-full bg-gd-lake-op text-center">
            <p class="text-white font-size-h3 font-w300 mt-3 mb-0">
                Linn App Store
            </p>
        </div>
        <main id="main-container">
            <div class="content content-full">

                <div class="row">

                    <div class="col-lg-12 col-xl-12">

                        <div class="row">

                            <div class="col-lg-12 col-xl-12">
                                <div class="block block-themed" itemscope itemtype="http://schema.org/MobileApplication">
                                    <div class="block-header bg-light">
                                        <h3 class="block-title"><a href="{{ url('/')}}">Home</a>  » {{ $applications[0]->viewcategory->category_name }}</h3>
                                    </div>

                                    <div class="block-content block-content-hover block-content-no-pad row mb-4">
                                        @foreach($applications as $app)
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                <div class="block-content block-content-full d-flex  justify-content-between" style="background-color: #e4ede9">
                                                    <div class="item  block-app-image" style="width: 50%">
                                                        <img src="{{ asset('uploads/application/',$app->logo) }}" width="100%" height="100%">
                                                    </div>
                                                    <div class="ml-3" style="width: 50%">
                                                        <p class="font-w600 mb-0 app-title">
                                                            {{ $app->name}}
                                                        </p>
                                                    </div>
                                                    <div class="ml-3">
                                                        <a href="{{route('application.download',$app->id)}}">
                                                            <button type="button" class="block-app-download btn btn-outline-success btn-sm" style="display: block;">
                                                                Download
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                        </div>
                                        @endforeach

                                      
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </main>

    </div>
    </div>
    </footer>
    </div>

    <script src="{{ asset('/js/dcm.js') }}"></script>

</body>

</html>