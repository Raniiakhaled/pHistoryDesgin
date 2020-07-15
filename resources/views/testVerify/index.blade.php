@extends('backEnd.layoutes.mastar')
@section('title',' verify')
@section('content')
@include('backEnd.layoutes.navbar')

<!--Start-Login-->
<div class="back-ground" style="padding-top:50px;">
    <div class="container row no-gutters bg-message card ml-auto mr-auto mb-5" style="flex-direction: row; margin-top:120px">
        <div class="col-lg-5 order-lg-1 mt-5 text-center">
        <img src="{{url('imgs/messege.png')}}" class="img-fluid float-left order-lg-2 mb-lg-5 mt-5" alt="Responsive image" height="400" width="500">
        </div>
        <div class="col-lg-6 order-lg-2 mt-5 pt-5 mb-5">
            <h4 class="ml-auto mr-auto col-10 mb-3 font-weight-bold">Verify Your Phone Number</h4>
            <h6 class="ml-auto mr-auto col-10">For your security Patient History wants to make sure its really you. Patient History will send a text message with a 6-digit verification code.</6>
            <div class="reca-div mt-4">
                <div id="mobile-number" class="ml-auto mr-auto col-8 mb-5 verify h5"><i class="fa fa-phone ml-3 mr-3 text-success"></i> {{$patient['phoneNumber']}}</div>
                <div class="mt-2 font-weight-bold">Get a Verification code to</div>
                <div id="mobile-number" class="mt-2 mb-2">Patient History Will Send a Verification code to {{$patient['phoneNumber']}}</div>
                <div id="recaptcha-container" class="mt-3 mb-3"></div>
                <button class="btn btn-success mb-3 mt-3 text-center text-weight-bold" onclick="phoneAuth();">Send Mobile</button>
            </div>
            <p class="alert alert-danger danger-Reg" style="display: none"></p>
            <p style="display:none" class="mt-3 alert alert-success suc-Reg">Success Reigster <a href="{{route('patient_verifcationCode',$patient['id'])}}">Please Login your Activate .. </a></p>
            <div class="row">
                <div class="col-12 show-verify" style="display: none">
                    <input class="form-control col-6 mt-5" type="text" id="verify-code" maxLength="6" size="1" min="0" max="9" pattern="[0-9]" />

                    <button class="btn btn-success mt-3 mb-3" onclick="codevervcation();" id="send-verify" type="submit"><i class="fa fa-chav mr-2" aria-hidden="true"></i>Send Verify</button>
                </div>
                <div class="col-12 verfy-email">
                    @if(session('EmailMsg'))
                    <p class="alert alert-success">{{session('EmailMsg')}}</p>
                    @endif
                    <a class=" float-right mt-3 btn btn-primary" href="{{route('patient_send_email',$patient['id'])}}"><i class="fa fa-envelope mr-2" aria-hidden="true"></i> Verify Email</a>
                    {{-- <div>
                        <img class = "rounded" wit src="{{url('imgs/email_icon.png')}}" alt="">
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

  <!--End-Login-->


@include('backEnd.layoutes.footer')
@endsection
