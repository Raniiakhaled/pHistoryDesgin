@extends('backEnd.layoutes.mastar')
@section('title','Edit Basic Data')
@section('content')
<!-- Sidenav -->
@include('backEnd.patien.slidenav')
<!-- Sidenav -->
<!-- start account patien -->
<div class="p-5 back-ground">
    <section class="signup-step-container container col-md-6 bg-registr">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    @if(session('msgUpdateData'))
                    <div class="alert alert-success">{{session('msgUpdateData')}}</div>
                    @endif
                    <form enctype="multipart/form-data" role="form" action="{{route('update.data.profile',$patient->id)}}" method="POST" class="login-box">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="role">
                        <div class="row">
                            <div class="container col-md-12 mb-5">
                                <div class="avatar-wrapper">
                                    <img class="profile-pic" src="" />
                                    <div class="upload-button">
                                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                    </div>
                                    <input name = "image" class="file-upload" type="file" accept="image/*"/>
                                </div>
                            </div>
                            <div class="col-md-4 mb-xl-3">
                                <div class="form-group">
                                    <label class="h5 font-weight-bold">First Name</label>
                                    <input value = "{{$patient->firstName}}" class="form-control" type="text" name="firstName" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-4 mb-xl-3">
                                <div class="form-group">
                                    <label class="h5 font-weight-bold">Middle Name</label>
                                    <input value = "{{$patient->middleName}}" class="form-control" type="text" name="middleName" placeholder="Middle Name">
                                </div>
                            </div>
                            <div class="col-md-4 mb-xl-3">
                                <div class="form-group">
                                    <label class="h5 font-weight-bold">Last Name</label>
                                    <input value = "{{$patient->lastName}}" class="form-control" type="text" name="lastName" placeholder="Last name">
                                </div>
                            </div>
                            <div class="col-md-6 mb-xl-3">
                                <div class="form-group">
                                    <label class="h5 font-weight-bold">Birth date</label>
                                    <input value = "{{$patient->BirthDate}}" class="form-control" type="date" placeholder="BIRTHDATE" name="BirthDate">
                                </div>
                            </div>
                            <div class="col-md-6 mb-xl-3">
                                <label class="h5 font-weight-bold" for="gender">Gender</label>
                                <div class="form-flex row">
                                    <div class="col-4">
                                        <input type="radio" name="gender" value="male" {{$patient->gender == 'male' ? 'checked' : ''}}  id="male" />
                                        <label for="male" class="ml-2">Male</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="radio" name="gender" value="female" {{$patient->gender == 'female' ? 'checked' : ''}} id="female" />
                                        <label for="female" class="ml-2">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-xl-3">
                                <div class="form-group">
                                    <label class="h5 font-weight-bold">Email</label>
                                    <input value = "{{$patient->email}}" class="form-control" type="email" name="email" placeholder="Mohammed0012@gmail.com">
                                </div>
                            </div>
                            <div class="col-md-6 mb-xl-3">
                                <div class="form-group">
                                    <label class="h5 font-weight-bold">Phone Number</label>
                                    <input value = "{{$patient->phoneNumber}}" class="form-control" type="text" name="phoneNumber" placeholder="Phone Number">
                                </div>
                            </div>
                            {{-- <div class="col-md-6 mb-xl-3">
                                <div class="form-group">
                                    <label class="h5 font-weight-bold">Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6 mb-xl-3">
                                <div class="form-group">
                                    <label class="h5 font-weight-bold">Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div> --}}
                            <div class="col-md-12 mb-xl-3">
                                <label class="h6 font-weight-bold" for="state">State</label>
                                <div class="form-flex row">
                                    <div class="col-2"> 
                                        <input value = "single" {{$patient->state == 'single'? 'checked' : ''}} type="radio" name="state" value="single" id="single" />
                                        <label for="single" class="ml-2">Single</label>
                                    </div>
                                    <div class="col-2"> 
                                        <input value = "married" {{$patient->state == 'married'? 'checked' : ''}} type="radio" name="state" value="married" id="married" />
                                        <label for="married" class="ml-2">Married</label>
                                    </div>
                                    <div class="col-2"> 
                                        <input value = "divorce" {{$patient->state == 'divorce'? 'checked' : ''}} type="radio" name="state" value="divorce" id="divorce" />
                                        <label for="divorce" class="ml-2">Divorce</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mb-5 mt-5">
                                <button type="submit" class="h5 col-9 btn btn-primary font-weight-400 mr-auto ml-auto">Submite</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- end account patien -->
<!-- footer -->
@include('backEnd.layoutes.footer')
<!-- footer -->



@stop
