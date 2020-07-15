@extends('backEnd.layoutes.mastar')
@section('title','Forgot password')
@section('content')
@include('backEnd.layoutes.navbar')
<div class="back-ground paddingB paddingT ">
<div class="container text-center">
    @if(session('errorEmailMsg'))
        <div style = "margin-top:100px" class="alert alert-danger">{{session('errorEmailMsg')}}</div>
    @endif
    <form action="{{route('post_forgot_password')}}" method="POST" class="mt-4">
        {{ csrf_field() }}
        <h5>Forgot Password</h5>
        <div class="form-group">
            <img src="{{url('imgs/restpassword.png')}}">
            <h4 class="h3 mt-5 mb-5">Please Enter Your id code </h4>
            <input type="text" name="code" class="form-control col-8" placeholder="Enter Your Code Id" required="required">
        </div>
        <div class="form-group">
            <input type="submit" value="Enter" class="text-center">
        </div>

    </form>
</div>
</div>


@stop




