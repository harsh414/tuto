@extends('layouts.app');

@section('content')
    <div class="alert alert-primary" id="msg" role="alert" style="display: none">
    </div>
<form  method="post" id="myform">
    {{csrf_field()}}
<input type="text" name="name" id="name" placeholder="name">
<input type="email" name="email" id="email" placeholder="email"><br>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Other</label>
    <input type="submit" value="submit">

    <script src="{{asset('js/ajax.js')}}" type="text/javascript"></script>
</form>

@endsection
