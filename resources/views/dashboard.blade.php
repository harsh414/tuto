@extends('layouts.app')

@section('content')
<div class="container">
{{--    <img src="{{$avatar}}" class="img-rounded" alt="Cinque Terre">--}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   @foreach($posts as $post)
                   <div class="">
                   {{$post->title}}
                   </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
