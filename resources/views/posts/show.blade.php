@extends('layouts.app')
@section('content')
    <h1>{{$post->title}}</h1>
    @if(Auth::user() && Auth()->user()->id ==  $post->user_id)
    <a href="/tutorial/public/posts/{{$post->id}}/edit">Edit post</a>
    {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('DELETE',['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
    @endif
@endsection
