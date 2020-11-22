@extends('layouts.app')
@section('content')
    <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" name="file[]" id="file" multiple>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@endsection
