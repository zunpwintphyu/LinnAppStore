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
            style="width:80px; height:80px;">
           

            {{-- <img src="{{ asset('/uploads/application/'.$category->logo)}}" alt="employee_photo" 
            style="width:80px; height:80px;">
            <img src="{{ asset('/uploads/application/icon.webp')}}" alt="employee_photo" 
            style="width:80px; height:80px;"> --}}
    @endforeach
      <br>
   
  </div>
@stop



@section('css')

    

@stop



@section('js')

   

@stop