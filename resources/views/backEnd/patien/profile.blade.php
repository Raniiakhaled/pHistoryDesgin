@extends('backEnd.layoutes.mastar')
@section('title','Profile')
@section('content')
@include('backEnd.patien.slidenav')
<!-- profile patient -->
  <!-- Main content -->
  @php
  $count = $patient->patinets_data->count();
  @endphp
  @if($count > 0)
  <div class="d-flex bg-page" id="wrapper">
    <div id="page-content-wrapper">
    <!-- Topnav -->
    <nav class="navbarp navbar-top navbar-expand navbar-dark border-bottom">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar links -->
            <button class="btn btn-primary d-lg-none ml-2" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <!-- Search form -->
            <h6 class="h5 text-white">{{$patient->patinets_data->online == 1 ? 'online' : 'Ofline'}}</h6>
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
                          <img alt="Image placeholder" src="imgs/team-1.jpg" class="avatar rounded-circle">
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
                      <img alt="Image placeholder" src="{{url('uploads/patien/' . $patient->image)}}">
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
    <div class="container-fluid">
        <div class="header img-header pb-6">
            <div class="container-fluid">
              <div class="header-body">
                <div class="row pt-5">
                  <div class="col-xl-4 col-md-4 col-xs-12">
                    <div class="card card-stats">
                      <!-- Card body -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-3">Height</h5>
                            <span class="h2 font-weight-bold mb-0">{{$patient->patinets_data->height}} Cm</span>
                          </div>
                          <div class="col-auto">
                            <div>
                              <img src="{{url('imgs/height.png')}}" width="60" alt="...">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-md-4">
                    <div class="card card-stats">
                      <!-- Card body -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-3">Weight</h5>
                            <span class="h2 font-weight-bold mb-0">{{$patient->patinets_data->width}}</span>
                          </div>
                          <div class="col-auto">
                            <div>
                              <img src="{{url('imgs/Wight.png')}}" width="50" alt="...">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-md-4">
                    <div class="card card-stats">
                      <!-- Card body -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-3">Blood</h5>
                            <span class="h2 font-weight-bold mb-0">{{$patient->patinets_data->blood}}</span>
                          </div>
                          <div class="col-auto">
                            <div>
                              <img src="{{url('imgs/blood.png')}}" width="50" alt="...">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6">
                      <!-- female div -->
                      @if($patient->gender == 'female')
                    <div class="card card-stats female-bg">
                      <!-- Card body -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col-auto">
                            <div>
                              <img src="{{url('imgs/clender.png')}}" width="40" alt="...">
                            </div>
                          </div>
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Female</h5>
                            <span class="h2 font-weight-bold mb-0"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    <!-- female div -->
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Information -->
        <div class="nav row testimonial-group nav-pills menu-info ml-5 mb-4" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
            <a class="nav-link col-xs-4 p-1 mr-1 active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">
                <li>Diseases</li>
            </a>
            <a class="nav-link col-xs-4 p-1 mr-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">
                <li>Medication</li>
            </a>
            <a  class="nav-link col-xs-4 p-1 mr-1" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">
                <li>Allergies</li>
            </a>
            <a  class="nav-link col-xs-4 p-1 mr-1" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">
                <li>Surgeries</li>
            </a>
            <a class="nav-link col-xs-4 p-1 mr-1" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">
                <li>Somking</li>
            </a>
            <a class="nav-link col-xs-4 p-1 mr-1" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">
                <li>Screening</li>
            </a>
            <a class="nav-link col-xs-4 p-1 mr-1" id="v-pills-7-tab" data-toggle="pill" href="#v-pills-7" role="tab" aria-controls="v-pills-7" aria-selected="false">
                <li>files</li>
            </a>
        </div>
        <div class="col-md-10 p-4 align-items-center js-fullheight animated">
        <div class="tab-content mr-auto ml-auto" id="v-pills-tabContent">
            <div class="tab-pane animated bounce slow py-0" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                <h2 class="col-12 ml-xl-8 mb-4">Diseases</h2>
                @php
                    $agree_name = json_decode($patient->patinets_data->agree_name);
                @endphp
                @foreach($agree_name as $agree)
                    <div class="pills-main col-xl-8 col-md-4 col-xs-12 row row-text mb-3 mr-auto ml-auto">
                        <div class="col-2">
                            <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                        </div>
                        <div class="col-8">
                            <h4 class="mt-3">
                                {{$agree}}
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="tab-pane animated bounce slow py-0" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
            <h2 class="col-12 ml-xl-8 mb-4">Medication</h2>
                @php
                    $medication_name = json_decode($patient->patinets_data->medication_name);
                @endphp
                @foreach($medication_name as $medication)
                    @if($medication)
                    <div class="col-xl-8 col-md-4 col-xs-12 row row-text mb-3 mr-auto ml-auto">
                        <div class="col-2">
                            <img src="{{url('imgs/02.png')}}" width="60" alt="...">
                        </div>
                        <div class="col-8">
                            <h4 class="mt-3">
                                {{$medication}}
                            </h4>
                        </div>
                    </div>

                    @endif
                @endforeach
            </div>
            <div class="tab-pane animated bounce slow py-0" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
            <h2 class="col-12 ml-xl-8 mb-4">Allergies</h2>
            @foreach(json_decode($patient->patinets_data->allergi_data) as $array)
            <div class="col-xl-8 col-md-4 col-xs-12 row row-text mb-3 mr-auto ml-auto">
{{--                <div class="col-2">--}}
{{--                    <img src="{{url('imgs/02.png')}}" width="60" alt="...">--}}
{{--                </div>--}}
                <div class="col-8">
                    @if($array->allergi_name)
                    <h3 class="mt-3 pl-4">{{$array->allergi_name}}</h3>
                    @endif
                    @if($array->severity)
                    <h3 class="mt-3 pl-4">{{$array->severity}}</h3>
                    @endif
                    @if($array->reaction)
                    <h3 class="mt-3 pl-4">{{$array->reaction}}</h3>
                    @endif
                </div>
                </div>
                @endforeach
            </div>

            <div class="tab-pane animated bounce slow py-0" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
            <h2 class="col-12 ml-xl-8 mb-4">Surgeries</h2>
                @foreach(json_decode($patient->patinets_data->surgery_data) as $array_su)
                    <div class="pills-main col-xl-8 col-md-4 col-xs-12 row row-text mb-3 mr-auto ml-auto">
                    <div class="col-8">
                        @if($array_su->surgery_name)
                            <h3 class="mt-3 pl-4">{{$array_su->surgery_name}}</h3>
                        @endif
                        @if($array_su->surgery_date)
                            <h3 class="mt-3 pl-4">{{$array_su->surgery_date}}</h3>
                        @endif
                    </div>
                    </div>
                @endforeach
            </div>


            <div class="tab-pane animated bounce slow py-0" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
            <h2 class="col-12 ml-xl-8 mb-4">Somking</h2>
            <div class="pills-main col-xl-8 col-md-4 col-xs-12 row row-text mb-3 mr-auto ml-auto">
                <div class="col-8">
                <h2 class="mt-3 pl-4">Alcohol</h2>
                <h4 class="pl-3 pl-6">{{$patient->patinets_data->alcohol_type}}</h4>
                <h4 class="mt--3 pl-4"><img src="{{url('imgs/lavel.png')}}" width="50" alt="...">{{$patient->patinets_data->alcohol_severity}}</h4>
                </div>
            </div>
            <div class="col-xl-8 col-md-4 col-xs-12 row row-text mb-3 mr-auto ml-auto">
                <div class="col-8">
                <h3 class="mt-3 pl-4">Cigarette</h3>
                <h4 class="pl-3 pl-6">E-Cigar</h4>
                <h4 class="mt--3 pl-4"><img src="{{url('imgs/date.png')}}" width="50" alt="...">{{$patient->patinets_data->cigarettes}}</h4>
                </div>
            </div>
            <div class="col-xl-8 col-md-4 col-xs-12 row row-text mb-3 mr-auto ml-auto">
                <div class="col-8">
                <h3 class="mt-3 pl-4">Tobacco</h3>
                <h4 class="pl-3 pl-6">Pipe</h4>
                <h4 class="mt--3 pl-4"><img src="{{url('imgs/lavel.png')}}" width="50" alt="...">{{$patient->patinets_data->tobacco}}</h4>
                </div>
            </div>
            <div class="col-xl-8 col-md-4 col-xs-12 row row-text mb-3 mr-auto ml-auto">
                <div class="col-8">
                <h3 class="mt-3 pl-4">Drug</h3>
                <h4 class="pl-3 pl-6">Wine</h4>
                <h4 class="mt--3 pl-4"><img src="{{url('imgs/date.png')}}" width="50" alt="...">{{$patient->patinets_data->drug}}</h4>
                </div>
            </div>
            </div>


            <div class="tab-pane animated bounce py-0" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
            <h2 class="col-12 ml-xl-8 mb-4">Screening</h2>
            <div class="pills-main col-xl-8 col-md-4 col-xs-12 row row-text mb-3 mr-auto ml-auto">
                <div class="col-8">
                <h3 class="mt-3 pl-4">Colonscopy</h3>
                <h4 class="mt--2 pl-3"><img src="{{url('imgs/date.png')}}" width="60" alt="...">@if($patient->patinets_data->colonscopy == 1) {{$patient->patinets_data->colonscopy_data}} @else No Date @endif</h4>
                </div>
            </div>
            <div class="col-xl-8 col-md-4 col-xs-12 row row-text mb-3 mr-auto ml-auto">
                <div class="col-8">
                <h3 class="mt-3 pl-4">Mmamogram</h3>
                <h4 class="mt--2 pl-3"><img src="{{url('imgs/date.png')}}" width="60" alt="...">@if($patient->patinets_data->mammogram == 3) {{$patient->patinets_data->mammogram_date}} @else No Date @endif</h4>
                </div>
            </div>
            </div>
            <div class="tab-pane animated bounce py-0" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab">
                <h2 class="col-12 ml-xl-8 mb-4">Files</h2>
                <div class="pills-main col-xl-8 col-md-4 col-xs-12 row row-text mb-3 mr-auto ml-auto">
                    <div class="col-8">
{{--                        <h3 class="mt-3 pl-4">Pescription file</h3>--}}
{{--                        <h4 class="mt--2 pl-3"><a href = "{{public_path('uploads/pdf_file/rocata/' . $patient->patinets_data->rocata_file)}}" target = "_blank">{{$patient->patinets_data->rocata_file}}</a></h4>--}}
{{--                        <br>--}}
{{--                        <h3 class="mt-3 pl-4">Test file</h3>--}}
{{--                        <h4 class="mt--2 pl-3"><a href = "#">{{$patient->patinets_data->rays_file}}</a></h4>--}}
{{--                        <br>--}}
{{--                        <h3 class="mt-3 pl-4">Ridelogy file</h3>--}}
{{--                        <h4 class="mt--2 pl-3"><a href = "#">{{$patient->patinets_data->analzes_file}}</a></h4>--}}
                    </div>
                </div>
                <table class = "table">
                    <tr>

                        <th>Name</th>
                        <th>Show</th>
                        <th>Download</th>
                    </tr>
                    @if($patient->patinets_data->rocata_file)
                    <tr>
                        <td>{{$patient->patinets_data->rocata_file}}</td>
                        <td><a target="_blank" href = "{{url('uploads/pdf_file/rocata/' . $patient->patinets_data->rocata_file)}}">Show</a></td>
                        <td><a href = "{{route('download_pdf',$patient->id)}}">Download</a></td>
                    </tr>
                    @endif
                    @if($patient->patinets_data->rays_file)
                    <tr>
                        <td>{{$patient->patinets_data->rays_file}}</td>
                        <td><a target="_blank" href = "{{url('uploads/pdf_file/rays/' . $patient->patinets_data->rays_file)}}">Show</a></td>
                        <td><a href = "{{route('download_pdf',$patient->id)}}">Download</a></td>
                    </tr>
                    @endif
                    @if($patient->patinets_data->analzes_file)
                    <tr>
                        <td>{{$patient->patinets_data->analzes_file}}</td>
                        <td><a target="_blank" href = "{{url('uploads/pdf_file/analzes/' . $patient->patinets_data->analzes_file)}}">Show</a></td>
                        <td><a href = "{{route('download_pdf',$patient->id)}}">Download</a></td>
                    </tr>
                    @endif
                </table>

            </div>
        </div>
        </div>
        <!-- HistoryFamilyContent -->
        <div class="nav row testimonial-group nav-pills menu-history mb-4 ml-auto mr-auto" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
            <a class="nav-link col-xs-4 p-1 active" id="v-pills-01-tab" data-toggle="pill" href="#v-pills-01" role="tab" aria-controls="v-pills-01" aria-selected="true">
                <li class="pills-his-yellow"><h6 class="text-center font-weight-bold">Mother</h6></li>
            </a>
            <a class="nav-link col-xs-4 p-1" id="v-pills-02-tab" data-toggle="pill" href="#v-pills-02" role="tab" aria-controls="v-pills-02" aria-selected="false">
                <li class="pills-his-orange"><h6 class="text-center font-weight-bold">Father</h6></li>
            </a>
            <a  class="nav-link col-xs-4 p-1" id="v-pills-03-tab" data-toggle="pill" href="#v-pills-03" role="tab" aria-controls="v-pills-03" aria-selected="false">
                <li class="pills-his-green"><h6 class="text-center font-weight-bold">Sister</h6></li>
            </a>
            <a class="nav-link col-xs-4 p-1" id="v-pills-04-tab" data-toggle="pill" href="#v-pills-04" role="tab" aria-controls="v-pills-04" aria-selected="false">
                <li class="pills-his-teal"><h6 class="text-center font-weight-bold">Brother</h6></li>
            </a>
            <a class="nav-link col-xs-4 p-1" id="v-pills-05-tab" data-toggle="pill" href="#v-pills-05" role="tab" aria-controls="v-pills-05" aria-selected="false">
                <li class="pills-his-yellow"><h6 class="text-center font-weight-bold">Grandma</br>M</h6></li>
            </a>
            <a class="nav-link col-xs-4 p-1" id="v-pills-06-tab" data-toggle="pill" href="#v-pills-06" role="tab" aria-controls="v-pills-06" aria-selected="false">
                <li class="pills-his-orange"><h6 class="text-center font-weight-bold">Grandma</br>F</h6></li>
            </a>
            <a class="nav-link col-xs-4 p-1 mr-1" id="v-pills-07-tab" data-toggle="pill" href="#v-pills-07" role="tab" aria-controls="v-pills-07" aria-selected="false">
                <li class="pills-his-green"><h6 class="text-center font-weight-bold">Grandpa</br>M</h6></li>
            </a>
            <a class="nav-link col-xs-4 p-1 mr-1" id="v-pills-08-tab" data-toggle="pill" href="#v-pills-08" role="tab" aria-controls="v-pills-08" aria-selected="false">
                <li class="pills-his-teal"><h6 class="text-center font-weight-bold">Grandpa</br>F</h6></li>
            </a>
        </div>
        <div class="pill-box-f p-4 align-items-center js-fullheight animated">
            <div class="tab-content mr-auto ml-auto" id="v-pills-tabContent">
                <div class="tab-pane animated bounce slow py-0 mb-4 mt-4 show active" id="v-pills-01" role="tabpanel" aria-labelledby="v-pills-01-tab">
                  @php
                    $mother = json_decode($patient->patinets_data->mother);
                    $father = json_decode($patient->patinets_data->father);
                    $sister = json_decode($patient->patinets_data->sister);
                    $brother = json_decode($patient->patinets_data->mother);
                    $grandpaf = json_decode($patient->patinets_data->grnadpaF);
                    $grandpam = json_decode($patient->patinets_data->grnadpaM);
                    $grandmaf = json_decode($patient->patinets_data->grandmaF);
                    $grandmam = json_decode($patient->patinets_data->grnadmaM);
                    @endphp
                    @if($mother > 0)
                    @foreach($mother as $mother)
                    <div class="pills-main pills-main-yellow col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                        <div class="col-2">
                            <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                        </div>
                        <div class="col-8">
                          <h6 class="mt-4">{{$mother}}</h6>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="pills-main pills-main-yellow col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                        <div class="col-2">
                            <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                        </div>
                        <div class="col-8">
                          <h6 class="mt-4">No Data</h6>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="tab-pane animated bounce slow py-0 mb-4 mt-4" id="v-pills-02" role="tabpanel" aria-labelledby="v-pills-02-tab">
                  @if($father > 0)
                  @foreach($father as $father)
                  <div class="pills-main pills-main-orange col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                      <div class="col-2">
                        <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                      </div>
                      <div class="col-8">
                        <h6 class="mt-4">{{$father}}</h6>
                      </div>
                    </div>
                    @endforeach
                    @else
                    <div class="pills-main pills-main-orange col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                      <div class="col-2">
                        <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                      </div>
                      <div class="col-8">
                        <h6 class="mt-4">No Data</h6>
                      </div>
                    </div>
                    @endif
                </div>


                <div class="tab-pane animated bounce slow py-0 mb-4 mt-4" id="v-pills-03" role="tabpanel" aria-labelledby="v-pills-03-tab">
                @if($sister > 0)
                @foreach($sister as $sister)
                <div class="pills-main pills-main-green col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                      <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                    <h6 class="mt-4">{{$sister}}</h6>
                    </div>
                </div>
                @endforeach
                @else
                <div class="pills-main pills-main-green col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                      <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                    <h6 class="mt-4">No Data</h6>
                    </div>
                </div>
                @endif
                </div>


                <div class="tab-pane animated bounce slow py-0 mb-4 mt-4" id="v-pills-04" role="tabpanel" aria-labelledby="v-pills-04-tab">
                @if($brother > 0)
                @foreach($brother as $brother)
                <div class="pills-main pills-main-teal col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                      <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                    <h6 class="mt-4">{{$brother}}</h6>
                    </div>
                </div>
                @endforeach
                @else
                <div class="pills-main pills-main-teal col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                      <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                    <h6 class="mt-4">No Data</h6>
                    </div>
                </div>
                @endif
                </div>


                <div class="tab-pane animated bounce slow py-0 mb-4 mt-4" id="v-pills-05" role="tabpanel" aria-labelledby="v-pills-05-tab">
                  @if($grandmam >0)
                  @foreach($grandmam as $grandmam)
                  <div class="pills-main pills-main-yellow col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                      <div class="col-2">
                          <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                      </div>
                      <div class="col-8">
                          <h6 class="mt-4">{{$grandmam}}</h6>
                      </div>
                  </div>
                  @endforeach
                  @else
                   <div class="pills-main pills-main-yellow col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                      <div class="col-2">
                          <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                      </div>
                      <div class="col-8">
                          <h6 class="mt-4">No Data</h6>
                      </div>
                  </div>
                  @endif
                </div>
                <div class="tab-pane animated bounce slow py-0 mb-4 mt-4" id="v-pills-06" role="tabpanel" aria-labelledby="v-pills-06-tab">
                @if($grandmaf > 0)
                @foreach($grandmaf as $grandmaf)
                <div class="pills-main pills-main-green col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                        <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                        <h6 class="mt-4">{{$grandmaf}}/h6>
                    </div>
                </div>
                @endforeach
                @else
                <div class="pills-main pills-main-green col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                        <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                        <h6 class="mt-4">No Data </h6>
                    </div>
                </div>
                @endif
                </div>
                <div class="tab-pane animated bounce slow py-0 mb-4 mt-4" id="v-pills-06" role="tabpanel" aria-labelledby="v-pills-06-tab">
                @if($grandmaf > 0)
                @foreach($grandmaf as $grandmaf)
                <div class="pills-main pills-main-green col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                        <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                        <h6 class="mt-4">{{$grandmaf}}/h6>
                    </div>
                </div>
                @endforeach
                @else
                <div class="pills-main pills-main-green col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                        <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                        <h6 class="mt-4">No Data </h6>
                    </div>
                </div>
                @endif

                </div>
                <div class="tab-pane animated bounce slow py-0 mb-4 mt-4" id="v-pills-07" role="tabpanel" aria-labelledby="v-pills-07-tab">
                @if($grandpam > 0)
                @foreach($grandpam as $grandpam)
                <div class="pills-main pills-main-teal col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                    <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                    <h6 class="mt-4">{{$grandpam}}</h6>
                    </div>
                </div>
                @endforeach
                @else
                <div class="pills-main pills-main-teal col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                    <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                    <h6 class="mt-4">No Data</h6>
                    </div>
                </div>
                @endif
                </div>
                <div class="tab-pane animated bounce slow py-0 mb-4 mt-4" id="v-pills-08" role="tabpanel" aria-labelledby="v-pills-08-tab">
                @if($grandpaf > 0)
                @foreach($grandpaf as $grandpaf)
                <div class="pills-main pills-main-teal col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                    <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                    <h6 class="mt-4">{{$grandpaf}}</h6>
                    </div>
                </div>
                @endforeach
                @else
                <div class="pills-main pills-main-teal col-xl-8 col-md-4 col-xs-12 row mb-3 mr-auto ml-auto">
                    <div class="col-2">
                    <img src="{{url('imgs/01.png')}}" width="60" alt="...">
                    </div>
                    <div class="col-8">
                    <h6 class="mt-4">No Data</h6>
                    </div>
                </div>
                @endif
                </div>
            </div>
        </div>
    <!-- female -->
{{--        @if(auth())--}}
        @if($patient->gender == 'female')
        <div class="">
            <h2 class="row mt-4 ml-5 mb-5">Female History</h2>
            <div><h5 class="card-title mt-4 ml-5 mb-5 text-uppercase text-muted mb-3">Female Mother</h5></div>
            <div class="row mt-2 mr-auto ml-auto">
                @if($patient->patinets_data->mother_Period_Cycle != null || $patient->patinets_data->mother_pregnency != null || $patient->patinets_data->mother_abotion != null)
                <div class="col-xl-6 col-md-2 col-xs-12 mb-4">
                    <div class="pills-main pills-main-pink card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div>
                                        <img src="imgs/prng.png" width="60" alt="...">
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-3">Pregnency</h5>
                                    <span class="h5 font-weight-bold mb-0">Yes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-2 col-xs-12 mb-5">
                    <div class="pills-main pills-main-pink card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div>
                                        <img src="imgs/beby.png" width="60" alt="...">
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-3">Abortion</h5>
                                    <span class="h5 font-weight-bold mb-0">Yes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-2 col-xs-12 mb-5">
                    <div class="pills-main pills-main-pink  card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div>
                                        <img src="imgs/noPreg.png" width="60" alt="...">
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-3">Contraceptives</h5>
                                    <span class="h5 font-weight-bold mb-0">Anjection</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($patient->patinets_data->wife_Period_Cycle != null || $patient->patinets_data->wife_Abotion != null || $patient->patinets_data->wife_Contraceptive != null)
                <div class="col-xl-4 col-md-2 col-xs-12 mb-5">
                    <div class="pills-main pills-main-pink card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div>
                                        <img src="imgs/delivery.png" width="60" alt="...">
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-3">Types of Deliveries</h5>
                                    <span class="h5 font-weight-bold mb-0">Normal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-2 col-xs-12 mb-4">
                    <div class="pills-main pills-main-pink card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div>
                                        <img src="imgs/pain.png" width="60" alt="...">
                                    </div>
                                </div>
                               @if($patient->state == 'single')
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-3">Complicetion in Deliveries</h5>
                                    <span class="h5 font-weight-bold mb-0">No</span>
                                </div>
                                   @endif
                            </div>
                        </div>
                    </div>
                </div>
                    @endif
            </div>
        </div>
        @endif
        <!-- female -->

    </div>
    <!-- Footer -->
    @include('backEnd.layoutes.footer')
    <!-- footer -->
    </div>
  </div>
  @else
  <!-- container -->
  <div class="container">
    <p class="alert alert-danger mb-4">Sorry, there is no data</p>
  </div>
  <!-- container -->
  @endif




<!-- profiel patient -->



@stop
