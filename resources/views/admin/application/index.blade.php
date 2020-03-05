@extends('adminlte::page')
@section('title', 'Application')

@section('content_header')
<h1 style="color:#222299;">Application</h1>
@stop

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="justify-content-center">
    <form action="{{ route('application.store')}}" method="post">

        @csrf
        <div class="row">
            <div class="col-md-4">
                <label class="col-sm-4 control-label">Category</span></label>
                <select name="category_id" class="form-control" id="category_id">
                    <option>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">
                        {{$category->category_name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="col-sm-4 control-label">App Name</span></label>
                <input type="text" name="name" class="form-control" id="name" style="color:blue;font-size:15px;"
                    placeholder="Name">
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label class="col-sm-4 control-label">File Upload</span></label>
                <input type="file" name="file" class="form-control" id="cat_name" style="color:blue;font-size:15px;">
            </div>
            <div class="col-md-4">
                <label class="col-sm-4 control-label">Logo Upload</span></label>
                <input type="file" name="logo" class="form-control" id="cat_name" style="color:blue;font-size:15px;">
            </div>
            <br>
            <div class="col-md-1">
                <button class="btn btn-success btn-sm form-control" type="submit"><span
                        class="glyphicon glyphicon-plus"></span>ADD</button>
            </div>
        </div>
    </form>
    <br>
    <!-- <hr> -->

    <div class="col-md-4">
        <table class="table table-hover">
            <thead>
                <th>
                    <h4>Application Name</h4>
                </th>
                <th>
                    <h4>Category</h4>
                </th>
                <th>
                    <h4>Action</h4>
                </th>
            </thead>
            <tbody>
                @foreach($applications as $application)
                <tr>
                    <td>
                        {{$application->name}}
                    </td>
                    <td>
                        {{$application->viewcategory->category_name}}
                    </td>
                    <td>
                        <form action="{{ route('application.destroy', $application->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary-sm  glyphicon glyphicon-edit"></a>
                            <button class="btn btn-primary-sm glyphicon glyphicon-trash"
                                onclick=" confirm('Are you sure you want to delete?')" type="submit"></button>
                        </form>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

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