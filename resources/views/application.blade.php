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

<body style="background-color: #ffffff">

    <div id="page-container" class="page-header-dark main-content-boxed">

        <div class="block-content block-content-full bg-gd-lake-op text-center" style="padding: 2px !important;">
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
                                        <h3 class="block-title"><a href="{{ url('/')}}">Home</a>  @if($applications->count()>0) » {{ $applications[0]->viewcategory->category_name }} @endif</h3>
                                    </div>
                                    <?php
                                        $keyword = isset($_GET['keyword'])?$_GET['keyword']:'';

                                     ?>


                                    @if($applications->count()>0)
                                    <form action="{{ route('application',$applications[0]->viewcategory->id)}}" method="get">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="block-content block-content-full d-flex  justify-content-between">
                                                    <input type="text" name="keyword" value="{{ $keyword }}" class="form-control" placeholder="Search.."> 
                                                    <button type="button" class="btn" style="display: block; color: #242032; border-color:#d8e5df; margin-left: 5px; ">
                                                            <img src="{{asset('img/search.png')}}" style="width: 15px; margin-left: 10px;">
                                                        </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
                                    @endif

                                    <div class="block-content block-content-hover block-content-no-pad row mb-4">
                                        @if($applications->count()>0)
                                            @foreach($applications as $app)
                                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding-bottom: 10px">
                                                    <div class="block-content block-content-full d-flex  justify-content-between"  style="border: 0.5px solid #ecf0f5; border-radius: 5px;">
                                                        <div class="item  block-app-image" style="width: 50%">
                                                            <img src="{{ asset('uploads/application/'.$app->logo) }}" width="100%" height="100%">
                                                        </div>
                                                        <div class="ml-3" style="width: 50%">
                                                            <p class="font-w600 mb-0 app-title" style="color: #365AF0; position: absolute;bottom: 35px;">
                                                                {{ $app->name}}
                                                            </p>
                                                        </div>
                                                        <div class="ml-3">
                                                            <a href="{{route('application.download',$app->id)}}" >
                                                                <!-- <button type="button" class="block-app-download btn btn-outline-success btn-sm" style="display: block;">
                                                                    Download
                                                                </button> -->
                                                                <img src="{{asset('img/download.png')}}" alt="download" style=" position: absolute;bottom: 35px;width: 20px;right: 40px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 10px">  
                                                <p class="font-w600 mb-0 app-title" style="color: #365AF0;">
                                                    No Application found.
                                                </p>
                                                      
                                            </div>

                                        @endif

                                        <div class="mb-4 mt-4 col-md-12" style="margin:auto 0; position:relative;">
                                             {{ $applications->links() }}
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
    </div>
    </footer>
    </div>

    <script src="{{ asset('/js/dcm.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $('form input').keyup(function() {
            $(this).closest('form').submit();
        });
    });
    </script>


</body>

</html>