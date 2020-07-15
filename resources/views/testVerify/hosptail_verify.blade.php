@extends('backEnd.layoutes.mastar')
@section('title',' verify')
@section('content')
@include('backEnd.layoutes.navbar')
<!--Start-Login-->
<div class="back-ground">
    <div class="container-fluid row no-gutters mt-5 mb-3 bg-message">
        <div class="col-lg-6 order-lg-2 mt-5 text-center">
        <img src="{{url('imgs/messege.png')}}" class="img-fluid float-left order-lg-2 mb-lg-5 mt-5 paddingT" alt="Responsive image" height="500" width="600">
        </div>
        <div class="col-lg-6 paddingT order-lg-1 mt-5 mb-5">
            <h2 class="ml-auto mr-auto col-6 mb-5 font-weight-bold">Verify Your Phone Number</h2>
            <h5 class="ml-auto mr-auto col-6">For your security Patient History wants to make sure its really you. Patient History will send a text message with a 6-digit verification code.</6>
            <div class="reca-div mt-3">
                <div id="mobile-number" class="ml-auto mr-auto col-6 mt-2 mb-4 verify h5"><i class="fa fa-phone ml-3 mr-3 text-success"></i> {{$hosptail['phoneNumber']}}</div>
                <div class="mt-2 font-weight-bold">Get a Verification code to</div>
                <div id="mobile-number" class="mt-2">Patient History Will Send a Verification code to {{$hosptail['phoneNumber']}}</div>
                <button class="btn btn-success mt-5 mb-3" onclick="phoneAuth();">Send Mobile</button>
                <div id="recaptcha-container"></div>
            </div>
            <p class="alert alert-danger danger-Reg" style="display: none"></p>
            <p style="display:none" class="mt-3 alert alert-success suc-Reg">Success Reigster <a href="{{route('hosptail_verifcationCode',$hosptail['id'])}}">Please Login your Activate .. </a></p>
            <div class = "show-verify" style="display: none">
                <input  class="form-control col-6 mt-5" type="text" id="verify-code">
                <button class="btn btn-success mt-3 mb-3" onclick="codevervcation();" id="send-verify" type="submit">Send Verify</button>
            </div>
            <div class="verfy-email mt-5">
                @if(session('EmailMsg'))
                <p class="alert alert-success">{{session('EmailMsg')}}</p>
                @endif
                <a class="col-6 mt-3 btn btn-primary" href="{{route('hosptail_send_email',$hosptail['id'])}}"><i class="fa fa-envelope mr-2" aria-hidden="true"> Verify Email</a>
                {{-- <div>
                    <img class = "rounded" wit src="{{url('imgs/email_icon.png')}}" alt="">
                </div> --}}
            </div>

        </div>
</div>
  <!--End-Login-->


@include('backEnd.layoutes.footer')
@endsection