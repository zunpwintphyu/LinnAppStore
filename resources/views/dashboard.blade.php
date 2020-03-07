@extends('adminlte::page')



@section('title', 'Dashboard')



@section('content_header')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
           Total: {{$count}}
        </div>
    </div>
    <div class="col-md-12"> 
        <?php 
            $keyword = (isset($_GET['keyword']))?$_GET['keyword']:'';
            $category_id = (isset($_GET['category_id']))?$_GET['category_id']:'';
        ?>  
        <form method="GET" action="{{route('dashboard')}}">
            <div class="row">
                <div class="col-md-3 form-group">
                    <input type="text" name="keyword" class="form-control float-right" placeholder="Search by application name..." value="{{$keyword}}" style="border-radius: 5px;margin-left: 25px;">
                </div>
                <div class="col-md-3 form-group">

                    <select class="form-control" name="category_id" style="border-radius: 5px;">
                          <option value="">Select by category...</option>
                              @foreach($categories as $category)
                                  <option value="{{$category->id}}" {{ ($category_id==  $category->id)?'selected':'' }}>
                                        {{$category->category_name}}
                                  </option>
                              @endforeach
                        </select>
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
 {!! $applications->appends(request()->input())->links() !!}
@stop


@section('css')



@stop



@section('js')



@stop