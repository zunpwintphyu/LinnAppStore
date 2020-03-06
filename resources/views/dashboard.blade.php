@extends('adminlte::page')



@section('title', 'Dashboard')



@section('content_header')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
           Total: {{$applications->count()}}
        </div>
    </div>
    <div class="col-md-12"> 
        <?php 
            $keyword = (isset($_GET['keyword']))?$_GET['keyword']:'';
        ?>  
        <form method="GET" action="{{route('dashboard')}}">
            <div class="row">
                <div class="col-md-3 form-group">
                    <input type="text" name="keyword" class="form-control float-right" placeholder="Search by application name..." value="{{$keyword}}" style="border-radius: 5px;margin-left: 25px;">
                </div>
                <div class="col-md-1 form-group">
                    <input type="submit" class="btn btn-primary" value="Search">
                </div>
            </div>
        </form>
    </div>
</div>

@stop 



@section('content')
<div class="content">

    @foreach($applications as $data)
    <div class="rows">
        <div class="col-md-1">
            <img src="{{ asset('/uploads/application/'.$data->logo)}}" alt="Icon"
                style="width:50px; height:50px; margin-bottom: 20px;">
        </div>
    </div>
    @endforeach
</div>
@stop



@section('css')



@stop



@section('js')



@stop