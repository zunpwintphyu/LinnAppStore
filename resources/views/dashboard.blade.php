@extends('adminlte::page')



@section('title', 'Dashboard')



@section('content_header')
<div class="row">
    <div>
    <h3>Linn App Store</h3>
    </div>
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <i class="fas fa-fw fa-clock"> </i> {{ date('Y-m-d H:i:s') }}
        </div>
    </div>
</div>

@stop



@section('content')
  <div class="content">
     
    @foreach($applications as $data)
            <img src="{{ asset('/uploads/application/'.$data->logo)}}" alt="Icon" 
            style="width:50px; height:50px; margin-bottom: 20px;"> &nbsp &nbsp &nbsp
    @endforeach
  </div>
@stop



@section('css')

    

@stop



@section('js')

   

@stop