@extends('adminlte::page')
@section('title', 'Category')

@section('content_header')
    <h1 style="color:#222299;">Edit Category</h1>
@stop

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="justify-content-center">
    <form  action="{{ route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-4" >
        <input type="text" value="{{ $category->category_name}}" name="category_name" class="form-control" id="cat_name" style="color:blue;font-size:18px;" placeholder="Category Name">
        <span style="color:red">{!! $errors->first('category_name','<small>:message</small>')!!}</span>
        </div>
        <div class="col-md-3">
            <input type="file" name="logo" id="logo" class="form-control" accept="image/x-png,image/gif,image/jpeg" >
            
            <span style="color:red">{!! $errors->first('logo','<small>:message</small>')!!} </span>
        </div>
        <div class="col-md-1">
            <button class="btn btn-success btn-sm form-control" type="submit"><span class="glyphicon glyphicon-plus"></span>ADD</button> 
        </div>
    </div><br>
    <div class="row">
        <div class="form-group">
            <div class="col-md-4"></div>
            <div class="text-left col-md-8">
                @if($category->logo!='')
                <img src="{{ asset('uploads/category/'.$category->logo) }}" height="100px" width="100px"
                    id="logo"> <span class="remove_preview"  id="logo"></span>
                @endif
            </div>
        </div>
    </div>
    </form>
    <br>
    <hr>
    <div class="col-md-4">
       
    </div>
</div>
@stop
@section('css')
    
@stop


@section('js')
    <script> 
         $(document).ready(function() {

                setTimeout(function() {
                    $(".alert-success").fadeOut(3000);
                }, 3000);

            });
     </script>
@stop