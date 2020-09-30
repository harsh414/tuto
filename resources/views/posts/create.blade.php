@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>Create Post</h1>
        {{ Form::open(['action'=>'PostsController@store','method'=>'POST','enctype'=>'multipart/data']) }}
        <div class="form-group">
        {{Form::label('title','TITLE')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Enter title here'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['class'=>'ckeditor form-control','placeholder'=>'body'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        {{ Form::close() }}
        </form>
    </div>


    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
