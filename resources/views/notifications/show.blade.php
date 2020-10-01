@extends('layouts.app')

@section('content')
@foreach($notifications as $not)
    {{$not->data['amount']}}
@endforeach
@endsection
