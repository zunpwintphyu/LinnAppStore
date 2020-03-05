@extends('adminlte::page')
@section('title', 'Application')
<style>
.has-error {
    color: #d32535;
}

.has-error input {
    border-color: #d32535;
}
</style>
@section('content_header')
<h1 style="color:#222299;">Edit Application</h1>
@stop

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="justify-content-center">
    <form action="{{route('application.update',$data->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <label class="col-sm-4 control-label">Category</span></label>
                <div class="form-group column {{ $errors->has('category_id')?'has-error':''}}">
                    <select name="category_id" class="form-control" id="category_id">
                        <option>Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{($data->category_id == $category->id)?'selected':''}}>
                            {{$category->category_name}}
                        </option>
                        @endforeach

                    </select>
                    {!! $errors->first('category_id','<small>:message</small>')!!}
                </div>
            </div>
            <div class="col-md-4">
                <label class="col-sm-4 control-label">App Name</span></label>
                <div class="form-group column {{ $errors->has('name')?'has-error':''}}">
                    <input type="text" name="name" class="form-control" id="name" style="color:blue;font-size:15px;"
                        placeholder="Name" value="{{$data->name}}">
                    {!! $errors->first('name','<small>:message</small>')!!}
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label class="col-sm-4 control-label">File Upload</span></label>
                <div class="form-group column {{ $errors->has('file')?'has-error':''}}">
                    <input type="file" name="file" class="form-control" id="file" style="color:blue;font-size:15px;"
                        value="{{$data->file}}">
                    {!! $errors->first('file','<small>:message</small>')!!}
                    <a href="#">{{$data->file}}</a>
                </div>
            </div>
            <div class="col-md-4">
                <label class="col-sm-4 control-label">Logo Upload</span></label>
                <div class="form-group column {{ $errors->has('logo')?'has-error':''}}">
                    <input type="file" name="logo" class="form-control" id="logo" style="color:blue;font-size:15px;"
                        value="{{$data->logo}}">
                    {!! $errors->first('logo','<small>:message</small>')!!}

                </div>
            </div>
            <br>
            <div class="col-md-2">
                <button class="btn btn-success btn-sm form-control" type="submit"><span
                        class="glyphicon glyphicon-plus"></span>UPDATE</button>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-4"></div>
                <div class="text-left col-md-8">
                    @if($data->logo!='')
                    <img src="{{ asset('uploads/application/'.$data->logo) }}" height="200px" width="200px"
                        id="shop_image_preview"> <span class="remove_preview" id="shop_remove_preview"></span>
                    @endif
                </div>
            </div>
        </div>
    </form>


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