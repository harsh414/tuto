@extends('layouts.app')

@section('content')
    @if(count($posts)>0)
    @foreach($posts as $post)
    <div class="card card-body bg-light" style="background: yellow">
        <a href="posts/{{$post->id}}" > {{$post->title}}</a>
        <div></div>
    </div>
    @endforeach
        {{$posts->links()}}
    @else
    <p>no post found</p>
    @endif

@endsection
