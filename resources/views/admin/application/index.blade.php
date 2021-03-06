@extends('adminlte::page')
@section('title', 'Application')
<style>
.has-error {
    color: #d32535;
}

.has-error input {
    border-color: #d32535;
}

#progress {
    position: relative;
    width: 100%;
    /* border: 1px solid #7F98B2; */
    padding: 1px;
    border-radius: 3px;
}

.bar {
    background-color: #B4F5B4;
    width: 0%;
    height: 25px;
    border-radius: 3px;
}

.percent {
    position: absolute;
    display: inline-block;
    top: 3px;
    left: 48%;
    color: #7F98B2;
}
</style>
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
    <form action="{{ route('application.store')}}" method="post" enctype="multipart/form-data" id="data">

        @csrf
        <div class="row">
            <div class="col-md-4">
                <label class="col-sm-5 control-label">Category</label>
                <div class="form-group column {{ $errors->has('category_id')?'has-error':''}}">
                    <select name="category_id" class="form-control" id="category_id">
                        <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->category_name}}
                            </option>
                            @endforeach
                    </select>
                    {!! $errors->first('category_id','<small>:message</small>')!!}
                </div>
            </div>
            <div class="col-md-4">
                <label class="col-sm-5 control-label">App Name</label>
                <div class="form-group column {{ $errors->has('name')?'has-error':''}}">
                    <input type="text" name="name" class="form-control" id="name" style="color:blue;font-size:15px;"
                        placeholder="Name">
                    {!! $errors->first('name','<small>:message</small>')!!}
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label class="col-sm-5 control-label">File Upload</label>
                <div class="form-group column {{ $errors->has('file')?'has-error':''}}">
                    <input type="file" name="file" class="form-control" id="file" style="color:blue;font-size:15px;">
                    {!! $errors->first('file','<small>:message</small>')!!}
                </div>
            </div>
            <div class="col-md-4">
                <label class="col-sm-5 control-label">Logo Upload</label>
                <div class="form-group column {{ $errors->has('logo')?'has-error':''}}">
                    <input type="file" name="logo" class="form-control" id="logo" style="color:blue;font-size:15px;">
                    {!! $errors->first('logo','<small>:message</small>')!!}
                </div>
            </div>
            <br>
            <div class="col-md-1">
                <button class="btn btn-success btn-sm form-control" type="submit" onclick="hideProgress()" style="margin-top: 5px;">
                    <span class="glyphicon glyphicon-plus"></span>ADD</button>
            </div>
        </div> 
       <div id="progress">
            <div class="bar"></div >
            <div class="percent"></div >
        </div>
        
    </form>
        <?php 
        $category_id = isset($_GET['category_id'])?$_GET['category_id']:'';
        $keyword = isset($_GET['keyword'])?$_GET['keyword']:'';
    ?>
        <form method="GET" action="{{route('application.index')}}">
            <div class="row">
                <div class="col-md-3 form-group">
                    <input type="text" name="keyword" class="form-control float-right" placeholder="Search by application name..." style="border-radius: 5px;" value="{{$keyword}}">
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

    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <th>
                    App Logo
                </th>
                <th>
                    Application Name
                </th>
                <th>
                    Category
                </th>
                <th>
                    Size
                </th>
                <th>
                    Action
                </th>
            </thead>
            <tbody>
                @foreach($applications as $application)
                <tr>
                    <td>
                        <img src="{{ asset('uploads/application/'.$application->logo) }}" height="50px" width="50px"
                        id="shop_image_preview"> <span class="remove_preview" id="shop_remove_preview"></span>
                    </td>
                    <td>
                        {{$application->name}}
                    </td>
                    <td>
                        {{$application->viewcategory->category_name}}
                    </td>
                    <?php 
                        $file_size = File::size(public_path('uploads/application/'.$application->file));
                    ?>
                    <td>
       
                        {{  number_format($file_size / 1048576,2) }} MB
                    </td>
                    <td>
                      <!--   <form action="{{ route('application.destroy', $application->id)}}" method="post"
                            onsubmit="return confirm('Do you want to delete?');">
                            @csrf
                            @method('DELETE') -->
                            <a href="{{route('application.edit',$application->id)}}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit" title="Edit"></i></a>
                                 <a href="{{route('application.download',$application->id)}}" class="btn btn-sm btn-success"><i class="fas fa-download"></i> </a>
                            <button class="btn btn-sm btn-danger btn-sm deleteRecord" data-id="{{$application->id }}">
                                <i class="fa fa-fw fa-trash" title="Delete"></i></button>
                        <!-- </form> -->
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        {!! $applications->appends(request()->input())->links() !!}
    </div>
    <input type="hidden" id="token" value="{{ csrf_token() }}">
</div>
@stop
@section('css')

@stop


@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
$(document).ready(function() {

    setTimeout(function() {
        $(".alert-success").fadeOut(3000);
    }, 3000);

    function validate(formData, jqForm, options) {
        var form = jqForm[0];

         if (!form.name.value) {
            alert("Please Enter App Name");
            return false;
        }

        
        if (!form.file.value) {
            alert("Please Choose Apk File");
            return false;
        }
       

        if (!form.logo.value) {
            alert("Please Choose Uploaded Logo");
            return false;
        }
    }
    
    function hidePages() {
        var x = document.getElementById("progress");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
 
    (function() {
 
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
 
    $('form#data').ajaxForm({
        beforeSubmit: validate,
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            var posterValue = $('input[name=file]').fieldValue();
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        success: function() {
            var percentVal = 'Wait, Saving';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
             status.html(xhr.responseText);
            var jsonResponse = JSON.parse(xhr.responseText);
            console.log(jsonResponse);
            if(jsonResponse.success){
                alert('Uploaded Successfully');
                window.location.href = "application";
            }else{
                alert('Uploaded Fail!');
            }
           
        }
    });
     
    })();

    $(".deleteRecord").click(function(){
        var id = $(this).data("id");
        var token = $('#token').val();
        var confirmation = confirm("are you sure you want to delete?");
        if (confirmation) {
             $.ajax(
                    {
                        url: "application/"+id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function (response){
                          if(response.success){
                                alert('Delete Successfully');
                                window.location.href = "application";
                            }else{
                                alert('Delete Fail!');
                            }
                        }
                    });
            }
           
        });
    });
</script>
@stop