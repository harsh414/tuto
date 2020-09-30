@extends('layouts.app')
@section('content2')
<form action="{{route('pay')}}" method="post">
    {{csrf_field()}}
    <button type="submit" class="btn btn-primary">Notify</button>
</form>
@endsection

