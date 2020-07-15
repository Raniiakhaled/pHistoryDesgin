@extends('backEnd.layoutes.mastar')
@section('title','Compleate profile ')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="d-flex bg-page" id="wrapper">
    @include('backEnd.patien.slidenav')
    <div id="page-content-wrapper">
        <!-- main content -->
        <div class="main-content" id="panel">
            <!-- Topnav -->
            <nav class="navbarp navbar-top navbar-expand navbar-dark border-bottom">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Navbar links -->
                        <button class="btn btn-primary d-lg-none ml-5" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
                        <!-- Search form -->
                        <!-- form edit profile -->
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                        @if(session('msgUpdate'))
                        <div class="alert alert-success">{{session('msgUpdate')}}</div>
                        @endif
                        <ul class="float-lg-right pr-3">
                            <form action="{{route('update.profile',$patient->id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="patient_id" value="{{$patient->id}}">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="online" class="onoffswitch-checkbox" id="myonoffswitch" value="0" >
                                    <label class="onoffswitch-label" for="myonoffswitch">
                                        <script>
                                            $('#myonoffswitch').on('change', function() {
                                                this.value = this.checked ? 1 : 0;
                                            }).change;

                                        </script>
                                        <div class="onoffswitch-inner"></div>
                                        <div class="onoffswitch-switch"></div>
                                    </label>
                                </div>
                        </ul>
                        <h6 class="h5 text-white">Privacy</h6>
                        <ul class="navbar-nav align-items-center ml-md-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell fa-fw mr-lg-3 mt-lg-1" style="font-size: 15pt;"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                                    <!-- Dropdown header -->
                                    <div class="px-3 py-3">
                                        <p class="text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</p>
                                    </div>
                                    <!-- List group -->
                                    <div class="list-group-noti list-group-flush">
                                        <a href="#!" class="list-group-item list-group-item-action">
                                            <div class="row align-items-center">
                                                <div class="col-auto mb-3">
                                                    <!-- Avatar -->
                                                    <img alt="Image placeholder" src="{{url('imgs/team-1.jpg')}}" class="avatar rounded-circle">
                                                </div>
                                                <div class="col ml--2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h6 class="text-gray-d">John Snow</h6>
                                                        </div>
                                                        <div class="text-right text-muted">
                                                            <small class="text-primary">2 hrs ago</small>
                                                        </div>
                                                    </div>
                                                    <p class="">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="list-group-item list-group-item-action">
                                            <div class="row align-items-center">
                                                <div class="col-auto mb-3">
                                                    <!-- Avatar -->
                                                    <img alt="Image placeholder" src="imgs/team-1.jpg" class="avatar rounded-circle">
                                                </div>
                                                <div class="col ml--2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h6 class="text-gray-d">John Snow</h6>
                                                        </div>
                                                        <div class="text-right text-muted">
                                                            <small class="text-primary">3 hrs ago</small>
                                                        </div>
                                                    </div>
                                                    <p class="">A new issue has been reported for Argon.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- View all -->
                                    <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav align-items-center ml-auto ml-md-0 ">
                            <li class="nav-item dropdown">
                                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="media align-items-center">
                                        <span class="avatar avatar-sm rounded-circle">
                                            <img alt="Image placeholder" src="{{url('imgs/team-1.jpg')}}">
                                        </span>
                                        <div class="media-body ml-3 mr-3 d-lg-block">
                                            <h6 class="mb-0 font-weight-bold text-white">{{$patient->firstName . ' ' . $patient->middleName}}</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header -->
            <!-- Header -->
            <div class="col-11 ml-auto mr-auto mt-5 mb-5 align-items-center coveredit">
                <!-- Mask -->
                <span class="mask bg-gradient-white opacity-1"></span>
            </div>
            <!-- Page content -->
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-xl-4 order-xl-2">
                        <div class="card card-profile">
                            <img src="{{url('/imgs/BgLogin.jpg')}}" height="150" alt="Image placeholder" class="card-img-top">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image">
                                        <a href="#">
                                            <img src="{{url('uploads/patien/' . $patient->image)}}" class="rounded-circle">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('edit.data.profile',$patient->id)}}" class="float-lg-left"><i class="fas fa-edit mr-1"></i>Edit</a>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-profile-stats d-flex justify-content-center">
                                            <div class="text-center mr-4">
                                                <span class="heading">22</span>
                                                <h2 class="h6 text-gray">Doctor</h2>
                                            </div>
                                            <div class="text-center mr-4">
                                                <span class="heading">10</span>
                                                <h2 class="h6 text-gray">Ridology</h2>
                                            </div>
                                            <div class="text-center mr-4">
                                                <span class="heading">89</span>
                                                <h2 class="h6 text-gray">Test</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <P class="h5 font-weight-700 text-center mt-4">{{$patient->firstName . ' ' . $patient->middleName}}</P>
                                <h5 class="h5 font-weight-700 mb-5 text-center">{{$patient->phoneNumber}}</h5>
                                <div class="">
                                    <h5 class="h6 mt-3"><i class="fas fa-male mr-4 text-primary"></i>{{$patient->gender}}</h5>
                                    <h5 class="h6"><i class="fa fa-calendar-check mr-3 text-primary" aria-hidden="true"></i> {{$patient->age}} Age</h5>
                                    <h5 class="h6 mt-3"><i class="fas fa-location-arrow mr-3 text-primary"></i> Egypt</h5>
                                    <h5 class="h6 mt-3"><i class="fas fa-mail-bulk mr-3 text-primary"></i> {{$patient->email}}</h5>
                                    <h5 class="h6 mt-3 mb-5"><i class="fa fa-phone mr-3 text-primary" aria-hidden="true"></i>  {{str_replace('p2','+2',$patient->phoneNumber)}}</h5>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary">
                                        <h6 class="mt-2 h6">Login with other Account</h6>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 order-xl-1 mb-5">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Edit Profile</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="title-sub text-uppercase text-muted mb-4">User information</h3>
                                <div class="pl-lg-4 mb-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <label class="title-label ml-lg-3">Height</label>
                                                            <div class="ui input col-12">
                                                                <input class="" type="text" name="height" placeholder="170 Cm">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="title-label ml-lg-3">Weight</label>
                                                            <div class="width">
                                                                <select name="width_type" class="col-12 ui selection dropdown zindex">
                                                                    <option value="pound">Lbs</option>
                                                                    <option value="kg">KG</option>
                                                                </select>
                                                                <div class="ui input margin-select">
                                                                    <input name="width" type="text" class="pl-20" placeholder="80" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="title-label d-block ">Blood</label>
                                                            <select class="ui selection dropdown" name="blood">
                                                                <option value="A+">A+</option>
                                                                <option value="A-">A-</option>
                                                                <option value="B+">B+</option>
                                                                <option value="B-">B-</option>
                                                                <option value="o+">O+</option>
                                                                <option value="o-">O-</option>
                                                                <option value="AB+">AB+</option>
                                                                <option value="AB-">AB-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <!-- Patient History -->
                                <h3 class="title-sub text-uppercase text-muted mb-4">Patient History</h3>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="title-info">Check any Conditions you Currently Being Treated for or have had in the past: </label>
                                                <div class="form-flex">
                                                    <div class="form-group row">
                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-one">
                                                                    <label class="h4">Heart disease</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">High blood pressure </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">High cholesterol </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Lung disease</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input"> Diabetes</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Neck pain</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Severe headaches </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Back pain</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Seizures </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Thyroid disease </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Stroke Sleep apnea </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Stomach disease </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Kidney , bladder or prostate disease </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Blood clots </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Depression </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->

                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Anemia or other blood disease</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->
                                                        <!-- col -->
                                                        <div class="col-sm-3">
                                                            <div class="field">
                                                                <div class="ui checkbox">
                                                                    <input name="agree_name[]" type="checkbox" tabindex="0" class="hidden" value="agree-two">
                                                                    <label class="label-input">Cancer ( past or present ) </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- col -->
                                                        <div class="col-md-6 mr-auto ml-auto mt-4">
                                                            {{-- <div class="ui input col-12">
                                                            <input class="" type="text" name="name" placeholder="Other Diseases">
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                        <hr class="my-4" />
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="title-info">Allergies (incloud medication, food and environmental allergies)</label>
                                                <ul class="list-unstyled read-more-wrap">
                                                    <li>
                                                        <div class="row mb-3">
                                                            <div class="col-md-4">
                                                                <label class="title-label ml-xl-3">Allergy</label>
                                                                <div class="ui input col-12">
                                                                    <input class="" type="text" name="allergi_data[0][allergi_name]" placeholder="Allergy">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="title-label d-block">Severity</label>
                                                                <select name="allergi_data[0][severity]" class="ui selection dropdown">
                                                                    <option value="0">Severity</option>
                                                                    <option value="Mild">Mild</option>
                                                                    <option value="Moderate">Moderate</option>
                                                                    <option value="Severe">Severe</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="title-label ml-xl-3">Reaction</label>
                                                                <div class="ui input col-12">
                                                                    <input class="" type="text" name="allergi_data[0][reaction]" placeholder="Reaction">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row mb-3">
                                                            <div class="col-md-4">
                                                                <label class="title-label ml-xl-3">Allergy</label>
                                                                <div class="ui input col-12">
                                                                    <input class="" type="text" name="allergi_data[1][allergi_name]" placeholder="Allergy">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="title-label d-block">Severity</label>
                                                                <select name="allergi_data[1][severity]" class="ui selection dropdown">
                                                                    <option value="0">Severity</option>
                                                                    <option value="Mild">Mild</option>
                                                                    <option value="Moderate">Moderate</option>
                                                                    <option value="Severe">Severe</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="title-label ml-xl-3">Reaction</label>
                                                                <div class="ui input col-12">
                                                                    <input class="" type="text" name="allergi_data[1][reaction]" placeholder="Reaction">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row mb-3">
                                                            <div class="col-md-4">
                                                                <label class="title-label ml-xl-3">Allergy</label>
                                                                <div class="ui input col-12">
                                                                    <input class="" type="text" name="allergi_data[2][allergi_name]" placeholder="Allergy">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="title-label d-block">Severity</label>
                                                                <select name="allergi_data[2][severity]" class="ui selection dropdown">
                                                                    <option value="0">Severity</option>
                                                                    <option value="Mild">Mild</option>
                                                                    <option value="Moderate">Moderate</option>
                                                                    <option value="Severe">Severe</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="title-label ml-xl-3">Reaction</label>
                                                                <div class="ui input col-12">
                                                                    <input class="" type="text" name="allergi_data[2][reaction]" placeholder="Reaction">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr />
                                        </div>
                                        <hr class="my-4" />
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="title-info">Surgeries</label>
                                                <ul class="list-unstyled read-more-wrap">
                                                    <li>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label class="title-label ml-xl-3">Surgery</label>
                                                                <div class="ui input large col-12">
                                                                    <input class="" type="text" name="surgery_data[0][surgery_name]" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="title-label ml-xl-3">Date</label>
                                                                <div class="ui input col-12">
                                                                    <input class="" type="date" name="surgery_data[0][surgery_date]" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label class="title-label ml-xl-3">Surgery</label>
                                                                <div class="ui input large col-12">
                                                                    <input class="" type="text" name="surgery_data[1][surgery_name]" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="title-label ml-xl-3">Date</label>
                                                                <div class="ui input col-12">
                                                                    <input class="" type="date" name="surgery_data[1][surgery_date]" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label class="title-label ml-xl-3">Surgery</label>
                                                                <div class="ui input large col-12">
                                                                    <input class="" type="text" name="surgery_data[2][surgery_name]" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="title-label ml-xl-3">Date</label>
                                                                <div class="ui input col-12">
                                                                    <input class="" type="date" name="surgery_data[2][surgery_date]" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr />
                                        </div>
                                        <hr class="my-4" />
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="title-info">Current Medication</label>
                                                <ul class=" list-unstyled read-more-wrap">
                                                    <li class="">
                                                        <div class="row">
                                                            <div class="col-md-6 ui input col-6 mb-3">
                                                                <input class="" type="text" name="medication_name[]" placeholder="Medication">
                                                            </div>
                                                            <div class="col-md-6 ui input col-6 mb-3">
                                                                <input class="" type="text" name="medication_name[]" placeholder="Medication">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="row">
                                                            <div class="col-md-6 ui input col-6 mb-3">
                                                                <input class="" type="text" name="medication_name[]" placeholder="Medication">
                                                            </div>
                                                            <div class="col-md-6 ui input col-6 mb-3">
                                                                <input class="" type="text" name="medication_name[]" placeholder="Medication">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="row">
                                                            <div class="col-md-6 ui input col-6 mb-3">
                                                                <input class="" type="text" name="medication_name[]" placeholder="Medication">
                                                            </div>
                                                            <div class="col-md-6 ui input col-6 mb-3">
                                                                <input class="" type="text" name="medication_name[]" placeholder="Medication">
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr />
                                        </div>
                                        <hr class="my-4" />
                                        <div class="col-md-8 mb-3 mt-3">
                                            <label class="title-info">Adding pescrption</label>
                                            <input type="file" name="rocata_file" class="form-control">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label class="title-info">Adding Rays</label>
                                            <input type="file" name="rays_file" class="form-control">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label class="title-info">Adding Test</label>
                                            <input type="file" name="analzes_file" class="form-control">
                                        </div>
                                        <div class="col-md-12 mt-5">
                                            <label class="title-info">Preventative Screening</label>
                                            <div class="">
                                                <div id="myRadioGroup">
                                                    <div class="row">
                                                        <label class="col-5 ml-4 mb-3 title-label">Have you had a colonscopy</label>
                                                        <div class="col-3">
                                                            <input class="ui radio checkbox" type="radio" name="colonscopy" value="1" />&nbsp; <label class="font-weight-600">Yes</label> &nbsp;&nbsp;
                                                            <input class="ui radio checkbox" type="radio" name="colonscopy" value="2" /> &nbsp; <label class="font-weight-600">No</label>
                                                        </div>
                                                        <div id="types1" class="desc col-8 ml-3 mb-3" style="display: none;">
                                                            <input class="form-control" type="date" name="colonscopy_data">
                                                        </div>
                                                        <div id="types2" class="desc" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div id="myRadioGroup">
                                                    <div class="row">
                                                        <label class="h5 col-5 ml-4 mb-3 title-label">Have you had a Mammogram</label>
                                                        <div class="col-3">
                                                            <input class="ui radio checkbox" type="radio" name="mammogram" value="3" />&nbsp; <label class="font-weight-600">Yes</label> &nbsp;&nbsp;
                                                            <input class="ui radio checkbox" type="radio" name="mammogram" value="4" />&nbsp;&nbsp; <label class="font-weight-600">No</label>
                                                        </div>
                                                        <div id="type3" class="des col-8 ml-3 mb-3" style="display: none;">
                                                            <input class="form-control" type="date" name="mammogram_data">
                                                        </div>
                                                        <div id="type4" class="des" style="display: none;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div id="myRadioGroup">
                                                    <div class="row">
                                                        <label class="col-5 ml-4 title-label">Have you had a PRC</label>
                                                        <div class="col-3">
                                                            <input class="ui radio checkbox" type="radio" name="prc" value="5" />&nbsp; <label class="font-weight-600">Yes</label> &nbsp;&nbsp;
                                                            <input class="ui radio checkbox" type="radio" name="prc" value="6" />&nbsp;&nbsp; <label class="font-weight-600">No</label>                                                   
                                                        </div>
                                                        <div id="prct5" class="dese col-8 ml-3 mb-3" style="display: none;">
                                                            <input class="form-control" type="date" name="prc_data">
                                                        </div>
                                                        <div id="prct6" class="dese" style="display: none;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-4 mt-5 mb-5" />
                                        </div>
                                        <hr class="my-4" />
                                        <div class="col-12">
                                        
                                            <div class="nav flex-row nav-pills row offset-xl-1 col-12" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                                                <a class="nav-link col-xl-2 col-md-2 col-4 p-2 mr-1 active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">
                                                    <div class="row">
                                                        <h4 class="text-pills m-auto" style="font-size: 11pt;padding-top:3px;">Alcohol</h4>
                                                    </div>
                                                </a>
                                                <a class="nav-link col-xl-2 col-md-2 col-4 p-2 mr-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="true">
                                                    <div class="row">
                                                        <h4 class="text-pills m-auto" style="font-size: 11pt;padding-top:3px;">Cigarettes</h4>
                                                    </div>
                                                </a>
                                                <a class="nav-link col-xl-2 col-md-2 col-4 p-2 mr-1" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="true">
                                                    <div class="row">
                                                        <h4 class="text-pills m-auto" style="font-size: 11pt;padding-top:3px;">Tobacco</h4>
                                                    </div>
                                                </a>
                                                <a class="nav-link col-xl-2 col-md-2 col-4 p-2 mr-1" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="true">
                                                    <div class="row">
                                                        <h4 class="text-pills m-auto" style="font-size: 11pt;padding-top:3px;">Drug</h4>
                                                    </div>
                                                </a>
                                            </div> 
                                            <div class="col-md-12 p-4 align-items-center js-fullheight animated">
                                                <div class="tab-content mr-auto ml-auto" id="v-pills-tabContent">
                                                    <div class="tab-pane animated bounce slow py-0 show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                                                        <div class="row mb-3 mt-3">
                                                            <div class="col-xl-9 mb-4 mr-auto ml-auto">
                                                                    <div class="inline field">
                                                                        <label class="h6 font-weight-bold" style="font-size: 14pt; margin-bottom:20px;">Alcohol</label>
                                                                        <div class="col-6">
                                                                        <select name="alcohol_type" class="row col-6 label ui large selection fluid dropdown mb-4">
                                                                            <option value="0">Type of Alcohol</option>
                                                                            <option value="beer">Beer</option>
                                                                            <option value="wine">Wine</option>
                                                                            <option value="liquor">liquor</option>
                                                                        </select>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <select name="alcohol_severity" class="row col-6 label ui large selection fluid dropdown">
                                                                                <option value="0">Severity</option>
                                                                                <option value="high">High</option>
                                                                                <option value="middle">Middle</option>
                                                                                <option value="low">Low</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane animated bounce slow py-0 show" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                                                        <div class="row mb-3 mt-3">
                                                            <div class="col-xl-9 mb-4 mr-auto ml-auto">
                                                                <div class="ui form col-12">
                                                                    <div class="inline field">
                                                                        <label class="h6 font-weight-bold" style="font-size: 14pt; margin-bottom:20px;">Cigarettes</label>
                                                                        <select name="cigarettes" class="label ui large selection fluid dropdown mb-4">
                                                                            <option value="0">Severity</option>
                                                                            <option value="high">High</option>
                                                                            <option value="middle">Middle</option>
                                                                            <option value="low">Low</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane animated bounce slow py-0 show" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                                                        <div class="row mb-3 mt-3">
                                                            <div class="col-xl-9 mb-4 mr-auto ml-auto">
                                                                <div class="ui form col-12">
                                                                    <div class="inline field">
                                                                        <label class="h6 font-weight-bold" style="font-size: 14pt; margin-bottom:20px;">Tobacco</label>
                                                                        <select name="tobacco" class="label ui large selection fluid dropdown mb-4">
                                                                            <option value="0">Severity</option>
                                                                            <option value="high">High</option>
                                                                            <option value="middle">Middle</option>
                                                                            <option value="low">Low</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane animated bounce slow py-0 show" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                                                        <div class="row mb-3 mt-3">
                                                            <div class="col-xl-9 mb-4 mr-auto ml-auto">
                                                                <div class="ui form col-12">
                                                                    <div class="inline field">
                                                                        <label class="h6 font-weight-bold" style="font-size: 14pt; margin-bottom:20px;">Drug</label>
                                                                        <select name="drug" class="label ui large selection fluid dropdown mb-4">
                                                                            <option value="0">Severity</option>
                                                                            <option value="high">High</option>
                                                                            <option value="middle">Middle</option>
                                                                            <option value="low">Low</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Family History -->
                                <hr class="my-4" />
                                <h3 class="title-sub text-uppercase text-muted mb-4">Family History</h3>
                                <div class="pl-lg-4">
                                <h4 class="text-primary ml-5 mt-3 mb-5 font-weight-bold">Family Diseases</h4>
                                    <div class="col-12">
                                        <div class="nav flex-row nav-pills row ml-auto mr-auto" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                                            <a class="nav-link col-xl-3 col-md-2 col-4 active" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="true">
                                                <div class="text-center">
                                                    <img src="{{url('imgs/mother.png')}}" width="100">
                                                    <h4 class="text-pills m-auto" style="font-size:12pt;padding-top:15px;">Mother</h4>
                                                </div>
                                            </a>
                                            <a class="nav-link col-xl-3 col-md-2 col-4" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="true">
                                                <div class="text-center">
                                                    <img src="{{url('imgs/father.png')}}" width="100">
                                                    <h4 class="text-pills m-auto" style="font-size: 12pt;padding-top:15px;">Father</h4>
                                                </div>
                                            </a>
                                            <a class="nav-link col-xl-3 col-md-2 col-4" id="v-pills-7-tab" data-toggle="pill" href="#v-pills-7" role="tab" aria-controls="v-pills-7" aria-selected="true">
                                                <div class="text-center">
                                                    <img src="{{url('imgs/sis.png')}}" width="100">
                                                    <h4 class="text-pills m-auto" style="font-size: 12pt;padding-top:15px;">Sister</h4>
                                                </div>
                                            </a>
                                            <a class="nav-link col-xl-3 col-md-2 col-4" id="v-pills-8-tab" data-toggle="pill" href="#v-pills-8" role="tab" aria-controls="v-pills-8" aria-selected="true">
                                                <div class="text-center">
                                                    <img src="{{url('imgs/bro.png')}}" width="100">
                                                    <h4 class="text-pills m-auto" style="font-size:12pt;padding-top:15px;">Brother</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-12 p-4 align-items-center js-fullheight animated">
                                            <div class="tab-content tab-family-1 mr-auto ml-auto" id="v-pills-tabContent">
                                                <div class="tab-pane animated bounce slow py-0 show active" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
                                                    <div class="row mb-5 mt-3 ">
                                                        <div class="col-xl-9 mb-3 mr-auto ml-auto">
                                                            <div class="ui form col-12">
                                                                <div class="inline field">
                                                                    <label class="h6 font-weight-bold" style="font-size: 14pt; margin-bottom:20px;">Mother Diseases</label>
                                                                    <select name="mother[]" multiple="" class="label ui large selection fluid dropdown">
                                                                        <option value="">Choose</option>
                                                                        <option value="high-Blood-Pressure">High Blood Pressure</option>
                                                                        <option value="diabetes">Diabetes</option>
                                                                        <option value="cancer">Cancer (Past or Present)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                            <div class="ui input col-12">
                                                                <input name="other_mother" type="text" placeholder="Other Diseases">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane animated bounce slow py-0 show" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
                                                    <div class="row mb-5 mt-3">
                                                        <div class="col-xl-9 mb-3 mr-auto ml-auto">
                                                            <div class="ui form col-12">
                                                                <div class="inline field">
                                                                    <label class="h6 font-weight-bold" style="font-size: 14pt; margin-bottom:20px;">Father Diseases</label>
                                                                    <select name="father[]" multiple="" class="label ui large selection fluid dropdown">
                                                                        <option value="">Choose</option>
                                                                        <option value="high-Blood-Pressure">High Blood Pressure</option>
                                                                        <option value="diabetes">Diabetes</option>
                                                                        <option value="cancer">Cancer (Past or Present)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                            <div class="ui input col-12">
                                                                <input name="other_father" type="text" placeholder="Other Diseases">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane animated bounce slow py-0 show" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab">
                                                    <div class="row mb-5 mt-3">
                                                        <div class="col-xl-9 mb-4 mr-auto ml-auto">
                                                            <div class="ui form col-12">
                                                                <div class="inline field">
                                                                    <label class="h6 font-weight-bold" style="font-size: 14pt; margin-bottom:20px;">Sister Diseases</label>
                                                                    <select name="sister[]" multiple="" class="label ui large selection fluid dropdown">
                                                                    <option value="">Choose</option>
                                                                        <option value="high-Blood-Pressure">High Blood Pressure</option>
                                                                        <option value="diabetes">Diabetes</option>
                                                                        <option value="cancer">Cancer (Past or Present)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                            <div class="ui input col-12">
                                                                <input name="other_sister" type="text" placeholder="Other Diseases">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane animated bounce slow py-0 show" id="v-pills-8" role="tabpanel" aria-labelledby="v-pills-8-tab">
                                                    <div class="row mb-5 mt-3">
                                                        <div class="col-xl-9 mb-4 mr-auto ml-auto">
                                                            <div class="ui form col-12">
                                                                <div class="inline field">
                                                                    <label class="h2 font-weight-700" style="font-size: 14pt; margin-bottom:20px;">Brother Diseases</label>
                                                                    <select name="brother[]" multiple="" class="label ui large selection fluid dropdown">
                                                                        <option value="">Choose</option>
                                                                        <option value="high-Blood-Pressure">High Blood Pressure</option>
                                                                        <option value="diabetes">Diabetes</option>
                                                                        <option value="cancer">Cancer (Past or Present)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                            <div class="ui input col-12">
                                                                <input name="other_brother" type="text" placeholder="Other Diseases">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="nav flex-row nav-pills roW col-12 mt-3" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                                            <a class="nav-link col-xl-3 col-md-2 col-4 active" id="v-pills-9-tab" data-toggle="pill" href="#v-pills-9" role="tab" aria-controls="v-pills-5" aria-selected="true">
                                                <div class="text-center">
                                                    <img src="{{url('imgs/grandma.png')}}" width="100">
                                                    <h4 class="text-pills m-auto" style="font-size:12pt;padding-top:15px;">Grandma M</h4>
                                                </div>
                                            </a>
                                            <a class="nav-link col-xl-3 col-md-2 col-4" id="v-pills-10-tab" data-toggle="pill" href="#v-pills-10" role="tab" aria-controls="v-pills-10" aria-selected="true">
                                                <div class="text-center">
                                                    <img src="{{url('imgs/grandma.png')}}" width="100">
                                                    <h4 class="text-pills m-auto" style="font-size:12pt;padding-top:15px;">Grandma F</h4>
                                                </div>
                                            </a>
                                            <a class="nav-link col-xl-3 col-md-2 col-4" id="v-pills-11-tab" data-toggle="pill" href="#v-pills-11" role="tab" aria-controls="v-pills-11" aria-selected="true">
                                                <div class="text-center">
                                                    <img src="{{url('imgs/grandpa.png')}}" width="100">
                                                    <h4 class="text-pills m-auto" style="font-size:12pt;padding-top:15px;">Grandpa M</h4>
                                                </div>
                                            </a>
                                            <a class="nav-link col-xl-3 col-md-2 col-4" id="v-pills-12-tab" data-toggle="pill" href="#v-pills-12" role="tab" aria-controls="v-pills-12" aria-selected="true">
                                                <div class="text-center">
                                                    <img src="{{url('imgs/grandpa.png')}}" width="100">
                                                    <h4 class="text-pills m-auto"  style="font-size:12pt;padding-top:15px;">Grandpa F</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-12 p-4 align-items-center js-fullheight animated">
                                            <div class="tab-content tab-family-1 mr-auto ml-auto" id="v-pills-tabContent">
                                                <div class="tab-pane animated bounce slow py-0 show active" id="v-pills-9" role="tabpanel" aria-labelledby="v-pills-9-tab">
                                                    <div class="row mb-5 mt-3">
                                                        <div class="col-xl-9 mb-4 mr-auto ml-auto">
                                                            <div class="ui form col-12">
                                                                <div class="inline field">
                                                                    <label class="h6 font-weight-bold" style="font-size: 14pt; margin-bottom:20px;">Grandma M Diseases</label>
                                                                    <select name="grnadmaM[]" multiple="" class="label ui large selection fluid dropdown">
                                                                        <option value="">Choose</option>
                                                                        <option value="high-Blood-Pressure">High Blood Pressure</option>
                                                                        <option value="diabetes">Diabetes</option>
                                                                        <option value="cancer">Cancer (Past or Present)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                            <div class="ui input col-12">
                                                                <input type="text" placeholder="Other Diseases" name="other_grnadmaM">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane animated bounce slow py-0 show" id="v-pills-10" role="tabpanel" aria-labelledby="v-pills-10-tab">
                                                    <div class="row mb-5 mt-3">
                                                        <div class="col-xl-9 mb-4 mr-auto ml-auto">
                                                            <div class="ui form col-12">
                                                                <div class="inline field">
                                                                    <label class="h6 font-weight-bold" style="font-size: 14pt; margin-bottom:20px;">Grandma F Diseases</label>
                                                                    <select name="grnadmaF[]" multiple="" class="label ui large selection fluid dropdown">
                                                                        <option value="">Choose</option>
                                                                        <option value="high-Blood-Pressure">High Blood Pressure</option>
                                                                        <option value="diabetes">Diabetes</option>
                                                                        <option value="cancer">Cancer (Past or Present)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                            <div class="ui input col-12">
                                                                <input type="text" placeholder="Other Diseases" name="other_grandmaF">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane animated bounce slow py-0 show" id="v-pills-11" role="tabpanel" aria-labelledby="v-pills-11-tab">
                                                    <div class="row mb-5 mt-3">
                                                        <div class="col-xl-9 mb-4 mr-auto ml-auto">
                                                            <div class="ui form col-12">
                                                                <div class="inline field">
                                                                    <label class="h2 font-weight-700" style="font-size: 12pt; margin-bottom: 8px;">Granadpa M Diseases</label>
                                                                    <select name="grnadpaM[]" multiple="" class="label ui large selection fluid dropdown">
                                                                        <option value="">Choose</option>
                                                                        <option value="high-Blood-Pressure">High Blood Pressure</option>
                                                                        <option value="diabetes">Diabetes</option>
                                                                        <option value="cancer">Cancer (Past or Present)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                            <div class="ui input col-12">
                                                                <input type="text" placeholder="Other Diseases" name="other_grnadpaM">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane animated bounce slow py-0 show" id="v-pills-12" role="tabpanel" aria-labelledby="v-pills-12-tab">
                                                    <div class="row mb-5 mt-3">
                                                        <div class="col-xl-9 mb-4 mr-auto ml-auto">
                                                            <div class="ui form col-12">
                                                                <div class="inline field">
                                                                    <label class="h6 font-weight-bold" style="font-size: 14pt; margin-bottom:20px;">Granadpa F Diseases</label>
                                                                    <select name="grnadpaF[]" multiple="" class="label ui large selection fluid dropdown">
                                                                        <option value="">Choose</option>
                                                                        <option value="high-Blood-Pressure">High Blood Pressure</option>
                                                                        <option value="diabetes">Diabetes</option>
                                                                        <option value="cancer">Cancer (Past or Present)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                            <div class="ui input col-12">
                                                                <input type="text" placeholder="Other Diseases" name="other_grnadpaF">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- female -->
                                @if(auth()->guard('patien')->user()->gender == 'female' && auth()->guard('patien')->user()->state == 'single')
                                <h4 class="text-pink ml-5 mt-3 mb-4 font-weight-bold">Female Single</h4>
                                <div class="row tab-Female col-10 mr-auto ml-auto mb-3 mt-3">
                                    <div class="p-3 col-xl-9 mb-2 mt-3 mr-auto ml-auto">
                                        <label class="mr-7 col-6 title-label">Have you a Normal Period Cycle </label>
                                        <input class="ui radio checkbox col-1" type="radio" name="single_Period_Cycle" value="yes" /><label class="font-weight-600">Yes</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="ui radio checkbox col-1 ml-4" type="radio" name="single_Period_Cycle" value="no" /> <label class="font-weight-600">No</label>
                                    </div>
                                </div>
                                @endif
                                @if(auth()->guard('patien')->user()->gender == 'female' && auth()->guard('patien')->user()->state == 'married' || auth()->guard('patien')->user()->state == 'divorce')
                                <div class="col-12 ml-auto mr-auto">
                                <div class="nav flex-row nav-pills row offset-xl-1 col-12" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                                    <a class="nav-link col-md-4 p-2 mr-1 active" id="v-pills-01-tab" data-toggle="pill" href="#v-pills-01" role="tab" aria-controls="v-pills-01" aria-selected="true">
                                        <div class="text-center">
                                            <div><img src="../imgs/wife.png" width="120"></div>
                                            <div>
                                                <h4 class="text-pills mt-3">Wife</h4>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link col-md-4 p-2 mr-1" id="v-pills-02-tab" data-toggle="pill" href="#v-pills-02" role="tab" aria-controls="v-pills-02" aria-selected="true">
                                        <div class="text-center">
                                            <div><img src="../imgs/mother.png" width="120"></div>
                                            <div>
                                                <h4 class="text-pills mt-3">Mother</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-12 p-4 align-items-center js-fullheight animated">
                                    <div class="tab-content mr-auto ml-auto" id="v-pills-tabContent">
                                        <div class="tab-pane animated bounce slow py-0 show active" id="v-pills-01" role="tabpanel" aria-labelledby="v-pills-01-tab">
                                            <h5 class="text-pink ml-5 mt-3">Female Wife</h5>
                                            <div class="row mb-3 mt-3">

                                                <div class="col-xl-9 mb-3 mr-auto ml-auto">
                                                    <label class="mr-7 col-6 title-label">Have you a Normal Period Cycle </label>
                                                    <input class="ui radio checkbox col-1" type="radio" name="wife_Period_Cycle" value="yes" /><label class="font-weight-600">Yes</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="ui radio checkbox col-1 ml-4" type="radio" name="wife_Period_Cycle" value="no" /> <label class="font-weight-600">No</label>
                                                </div>
                                                <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                    <label class="mr-7 col-6 title-label">Abotion</label>
                                                    <input class="ui radio checkbox col-1" type="radio" name="wife_Abotion" value="yes" /><label class="font-weight-600">Yes</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="ui radio checkbox col-1 ml-4" type="radio" name="wife_Abotion" value="no" /><label class="font-weight-600">No</label>
                                                </div>
                                                <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto ">
                                                    <label class="title-label col-6">Contraceptive</label>
                                                    <select name="wife_Contraceptive" class="ui selection dropdown col-4">
                                                        <option>Severity</option>
                                                        <option value="Pill">Pill</option>
                                                        <option value="Implant">Implant</option>
                                                        <option value="Intrauterine">Intrauterine Device</option>
                                                        <option value="Injection">Injection</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- female mother -->
                                        <div class="tab-pane animated bounce slow py-0 show" id="v-pills-02" role="tabpanel" aria-labelledby="v-pills-02-tab">
                                            <h5 class="text-pink ml-5 mt-3">Female Mother</h5>
                                            <div class="row mb-3 mt-3">
                                                <div class="col-xl-9 mb-3 mr-auto ml-auto">
                                                    <label class="mr-7 col-6 title-label">Have you a Normal Period Cycle </label>
                                                    <input class="ui radio checkbox col-1" type="radio" name="mother_Period_Cycle" value="yes" /><label class="font-weight-600">Yes</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="ui radio checkbox col-1 ml-4" type="radio" name="mother_Period_Cycle" value="no" /> <label class="font-weight-600">No</label>
                                                </div>
                                                <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                    <label class="mr-7 col-6 title-label">Pregnency</label>
                                                    <input class="ui radio checkbox col-1" type="radio" name="mother_pregnency" value="yes" /><label class="font-weight-600">Yes</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="ui radio checkbox col-1 ml-4" type="radio" name="mother_pregnency" value="no" /><label class="font-weight-600">No</label>
                                                </div>
                                                <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                    <label class="mr-7 col-6 title-label">Abotion</label>
                                                    <input class="ui radio checkbox col-1" type="radio" name="mother_abotion" value="yes" /><label class="font-weight-600">Yes</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="ui radio checkbox col-1 ml-4" type="radio" name="mother_abotion" value="no" /><label class="font-weight-600">No</label>
                                                </div>
                                                <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                    <label class="mr-7 col-6 title-label">Types of Deliveries </label>
                                                    <input class="ui radio checkbox col-1" type="radio" name="mother_deliveries" value="normal" /><label class="font-weight-600">Normal</label>
                                                    <input class="ui radio checkbox col-1 ml-3" type="radio" name="mother_deliveries" value="c.s" /><label class="font-weight-600">C.S</label>
                                                </div>
                                                <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto">
                                                    <label class="mr-7 col-6 title-label">Complicetion in Deliveries </label>
                                                    <input class="ui radio checkbox col-1" type="radio" name="mother_complicetion" value="yes" /><label class="font-weight-600">Yes</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="ui radio checkbox col-1 ml-4" type="radio" name="mother_complicetion" value="no" /><label class="font-weight-600">No</label>
                                                </div>
                                                <div class="col-xl-9 col-md-4 mb-3 mr-auto ml-auto ">
                                                    <label class="title-label col-6">Contraceptive</label>
                                                    <select name="mother_Contraceptive" class="ui selection dropdown col-4">
                                                        <option>Severity</option>
                                                        <option value="Pill">Pill</option>
                                                        <option value="Implant">Implant</option>
                                                        <option value="Intrauterine">Intrauterine Device</option>
                                                        <option value="Injection">Injection</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- female -->
                            @endif
                            <div class="text-center mb-3 mt-5">
                                <input type="submit" value="submit" class="col-8 btn btn-success">
                            </div>
                            </form>
                            </div>
</div>
</div>
</div>
</div>
<!-- footer -->
@include('backEnd.layoutes.footer')
<!-- footer -->
</div>
</div>
</div>

<!-- main content -->



@stop
