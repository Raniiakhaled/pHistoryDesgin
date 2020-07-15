@extends('backEnd.layoutes.mastar')
@section('title','Home page')
@section('content')
    <!-- navbar file -->
    @include('backEnd.layoutes.navbar')
    <!-- navbarfile -->
    <!--Start-Content-->
      <div id="carouselExampleControls" class="carousel mt-5" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="{{url('imgs/c1.jpg')}}" class="w-100 img-fluid animated fadeIn" alt="...">
            <div class="hero-wrap" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="ml-2 col-md-12 pl-xl-0">
                        <h2 class="h2 animated fadeIn"> Welcome Doctor</h2>
                        <h3 class="h3 mb-4">Everywhere, Anytime, Everyday.</h3>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="carousel-item">
            <img src="{{url('imgs/c1.jpg')}}" class="w-100 img-fluid " alt="...">
            <div class="hero-wrap" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="ml-2 col-md-12 pl-xl-0">
                        <h2 class="h2 animated fadeIn"> Welcome Hospital and Clinic</h2>
                        <h3 class="h3 mb-4">Everywhere, Anytime, Everyday.</h3>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="carousel-item">
            <img src="{{url('imgs/c2.jpg')}}" class="w-100 img-fluid animated fadeIn" alt="...">
            <div class="hero-wrap" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="ml-2 col-md-12 pl-xl-0">
                        <h2 class="h2 animated fadeIn"> Welcome Patient</h2>
                        <h3 class="h3 mb-4">Everywhere, Anytime, Everyday.</h3>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="carousel-item">
            <img src="{{url('imgs/c4.jpg')}}" class="w-100 img-fluid animated fadeIn" alt="...">
            <div class="hero-wrap" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="ml-2 col-md-12 pl-xl-0">
                        <h2 class="h2 animated fadeIn"> Welcome Labs and X-rays</h2>
                        <h3 class="h3 mb-4">Everywhere, Anytime, Everyday.</h3>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="carousel-item">
            <img src="{{url('imgs/c5.jpg')}}" class="w-100 img-fluid animated fadeIn" alt="...">
            <div class="hero-wrap" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="ml-2 col-md-12 pl-xl-0">
                        <h2 class="h2 animated fadeIn"> Welcome Pharmacy</h2>
                        <h3 class="h3 mb-4">Everywhere, Anytime, Everyday.</h3>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
      <!--End-content-->
      <!--Start-Login-->
    <section class="bg-login text-center col-md-10 mb-5">
         <!-- form login -->
         @if(session('msg'))
            <div class="alert alert-danger">{{session('msg')}}</div>
        @elseif(session('activeMsg'))
            <div class="alert alert-success">{{session('activeMsg')}}</div>
         @endif
         <form action="{{route('loginRoute')}}" method="POST">
            {{ csrf_field() }}
            <!-- radio button -->
            <section class="radio-toolbar">
            <div class="row middle">
                <div class="col-lg-12 patein-radio">
                    <label class="m-2">
                    <input type="radio" name="guard" value="patien"/><div class="box patein-radio" checked >
                        <img class="mt-2" src="{{url('imgs/Patirnt.svg')}}" height="60" alt="...">
                        <span class="">Patient</span>
                    </div>
                    </label>
                    <label class="m-2">
                    <input type="radio" name="guard" value="clinic"/><div class="box">
                        <img class="mt-2" src="{{url('imgs/Clinic.svg')}}" height="60" alt="...">
                        <span>Clinic</span>
                    </div>
                    </label>
                    <label class="m-2">
                    <input type="radio" name="guard" value="hosptail"/><div class="box">
                        <img class="mt-2" src="{{url('imgs/Hospital.svg')}}" height="60" alt="...">
                        <span>Hospital</span>
                    </div>
                    </label>
                    <label class="m-2">
                    <input type="radio" name="guard" value="xray"/><div class="box">
                        <img class="mt-2" src="{{url('imgs/x-ray.svg')}}" height="60" alt="...">
                        <span>X-ray</span>
                    </div>
                    </label>
                    <label class="m-2">
                    <input type="radio" name="guard" value="labs"/><div class="box">
                        <img class="mt-2" src="{{url('imgs/labs.svg')}}" height="60" alt="...">
                        <span>Labs</span>
                    </div>
                    </label>
                    <label class="m-2">
                    <input type="radio" name="guard" value="pharmacy"/><div class="box">
                        <img class="mt-2" src="{{url('imgs/pharmacy.svg')}}" height="60" alt="...">
                        <span>Pharmacy</span>
                    </div>
                    </label>
                </div>
            </div>
            </section>
            <!-- radio button -->
        <div class="container row ml-auto mr-auto">
            <div class="col-md-6 form">
                <p class="group">
                <input id="name" type="text" required name="phoneNumber">
                <label for="name">ID</label>
                </p>
                <p class="group">
                <input id="Password" type="password" required name="password">
                <label for="name">Password</label>
                </p><br/>
                <a class="text-forget" href="{{route('forgot_password')}}">Forget Password?</a>
                <input type="submit" value="Submit">
            </form>
            <!-- form login -->
            {{-- @include('backEnd.formLogin') --}}
          </div>
        </div>
        <div class="text-account">
         <a href="{{url('login/facebook')}}"><img class="mt-2 mb-2 p-1" src="{{url('imgs/facebook.png')}}" width="260" alt="..."></a>
         <a href="{{url('login/google')}}"><img class="mt-2 mb-2 p-1" src="{{url('imgs/google.png')}}" width="260" alt="..."></a>
         <br>
          OR
          <br>
          <a class="" href="{{route('indexRegister')}}">Don't have an Account ?</a>
        </div>
    </section>
    <!--End-Login-->

    <!-- footer -->
    @include('backEnd.layoutes.footer')
@stop

@section('scripts')
    <script>
        var p = document.getElementsByClassName('patein-radio');
            p.onclick = function(){
                alert('clicken');
            }
    </script>


    @stop
