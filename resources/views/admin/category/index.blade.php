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
    <form  action="{{ route('category.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4" >
            <input type="text" name="category_name" class="form-control" id="cat_name" style="color:blue;font-size:18px;" placeholder="Category Name">
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
                <th><h2>Category Name</h2></th>
                <th><h2>Action</h2></th>
            </thead>
            <tbody>
                @foreach ($categories as $cat )
                <tr>
                    <td><h4>{{ $cat->category_name }}</h4></td>
                    <td>
                        {{-- <form action="{{ route('branch.destroy', $branch->id)}}" method="post"> --}}
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-primary-sm  glyphicon glyphicon-edit"  ></a>
                          <button class="btn btn-primary-sm glyphicon glyphicon-trash" onclick=" confirm('Are you sure?')" type="submit"></button>
                        {{-- </form> --}}
                    </td>
                </tr> 
                @endforeach
                
            </tbody>
        </table>
        {!! $categories->render() !!}
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