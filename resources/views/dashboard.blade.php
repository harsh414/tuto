@extends('layouts.app')

@section('content')

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
{{--    <div>--}}
{{--        <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" autocomplete="off" />--}}
{{--        <h3 align="center">Total Data : <span id="total_records"></span></h3>--}}
{{--        <table class="table table-striped table-bordered">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Name</th>--}}
{{--                <th>Email</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}

{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
@endsection
