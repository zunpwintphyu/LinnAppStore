@extends('adminlte::page')
@section('title', 'Category')

@section('content_header')
    <h1 style="color:#222299;">Category</h1>
@stop

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="justify-content-center">
    <form  action="{{ route('category.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4" >
            <input type="text" name="category_name" class="form-control" id="cat_name" style="color:blue;font-size:18px;" placeholder="Category Name">
            
            <span style="color:red">{!! $errors->first('category_name','<small>:message</small>')!!} </span>
        </div>
        <div class="col-md-3">
            <input type="file" name="logo" id="logo" class="form-control">
            
            <span style="color:red">{!! $errors->first('logo','<small>:message</small>')!!} </span>
        </div>
        <div class="col-md-1">
            <button class="btn btn-success btn-sm form-control" type="submit"><span class="glyphicon glyphicon-plus"></span>ADD</button> 
        </div>
    </div>
    </form>
    <br>
    <hr>
    <div class="col-md-4">
        <table class="table table-hover">
            <thead>
                <th>Category Name</th>
                <th><center>Logo</center></th>
                <th><center>Action</center></th>
            </thead>
            <tbody>
                @foreach ($categories as $cat )
                <tr>
                    <td>{{ $cat->category_name }}</td>
                    <td>
                    <center>
                        <img src="{{ asset('uploads/category/'.$cat->logo) }}" alt="image"  style="width:20%;alignItem:center">
                    </center>
                    </td>
                    <td>
                        <form action="{{ route('category.destroy',$cat->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <a class="btn  btn-sm  glyphicon glyphicon-edit" href="{{ route('category.edit',$cat->id)}}"></a>
                          <button class="btn  btn-sm glyphicon glyphicon-trash" onclick=" confirm('Are you sure?')" type="submit"></button>
                        </form>
                    </td>
                </tr> 
                @endforeach
                
            </tbody>
        </table>
        <div class="row">
            {!! $categories->render() !!}
        </div>
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