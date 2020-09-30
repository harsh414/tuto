@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>Create Post</h1>
        {{ Form::open(['action'=>['PostsController@update',$post->id],'method'=>'POST']) }}
        {{--        {{csrf_token()}}--}}
        <div class="form-group">
            {{Form::label('title','TITLE')}}
            {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Enter title here'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body',$post->body,['class'=>'ckeditor form-control','placeholder'=>'body'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

        {{ Form::close() }}
    </div>


    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
