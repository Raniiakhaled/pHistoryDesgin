@extends('backEnd.layoutes.mastar')
@section('title','Login Doctor')
@section('content')
    <div class="d-flex bg-page" id="wrapper">
        <!-- Sidebar -->
    @include('backEnd.hosptail.sidenav')
    <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbarp navbar-top navbar-expand navbar-dark border-bottom">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Navbar links -->
                        <button class="btn btn-primary d-lg-none ml-2" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
                        <!-- Search form -->
                        {{-- <ul class="float-lg-right pr-5">
                          <div class="toggle toggle__wrapper">
                            <div id="toggle-example-1" role="switch" aria-checked="false" class="toggle__button">
                              <div class="toggle__switch"></div>
                            </div>
                          </div>
                        </ul> --}}
                        <ul class="navbar-nav align-items-center ml-md-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ni ni-bell-55 mr-lg-3 mt-lg-1" style="font-size: 15pt;"></i>
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
                                                    <img alt="Image placeholder" src="{{url('imgs/team-1.jpg')}}" class="avatar rounded-circle">
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
                                            <h6 class="mb-0 font-weight-bold text-white">Mohamed Ahmed</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- informationContent -->
            <div class="container-fluid" style="margin-top: 160px; margin-bottom: 220px;">
                <div class="header">
                    <div class="container">
                        <h4 class="text-center">Login By Doctor</h4>
                        @if(session('msg'))
                            <div class="alert alert-danger">{{session('msg')}}</div>
                        @endif
                        <form action = "#" method="POST">
                            {{@csrf_field()}}
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="name" class="form-control" required = "required">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required = "required">
                            </div>
                            <input type="submit" value="login" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
            <!-- add new doctor -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add New Doctor <i class="fa fa-plus fa-fw"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new doctor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('hosptail_add_doctor',$hosptail->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="hosptail_id" value="{{$hosptail->id}}">
                                <div class="avatar-wrapper">
                                    <img class="profile-pic" src="" name = "image"/>
                                    <div class="upload-button">
                                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                    </div>
                                    <input class="file-upload" type="file" accept="image/*" name="image">
                                </div>
                                <div class="form-group">
                                    <label>Doctor Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label>Degree</label>
                                    <select class="form-control" placeholder="drgree" name="degree">
                                        <option value="">Chosse .. </option>
                                        <option value="MD">MD</option>
                                        <option value="BSC">BSC</option>
                                        <option value="MSC">MSC</option>
                                        <option value="PsyD">PsyD</option>
                                        <option value="PhD">PhD</option>
                                        <option value="MDCM">MDCM</option>
                                        <option value="DO">DO</option>
                                        <option value="MBBS">MBBS</option>
                                        <option value="MBChB">MBChB</option>
                                        <option value="DDS">DDS</option>
                                        <option value="DPM">DPM</option>
                                        <option value="EdD">EdD</option>
                                        <option value="PharmD">PharmD</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Medical Description</label>
                                    <textarea class="form-control" row = "4" cols="10" name="information" style="resize: none">{{old('information')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>phone Number</label>
                                    <input type="text" name="phoneNumber" class="form-control" value="{{old('phoneNumber')}}">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="Password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Primary Speciality</label>
                                    <select class="form-control" type="text" name="Primary_Speciality">
                                        <option value="0">Chosse ..</option>
                                        <option value="Audiologist">Audiologist</option>
                                        <option value="Audiologist">Allergist</option>
                                        <option value="Audiologist">Anesthesiologist </option>
                                        <option value="Audiologist">Andrologists </option>
                                        <option value="Audiologist">Cardiologist </option>
                                        <option value="Audiologist">Cardiovascular </option>
                                        <option value="Audiologist">Cardiovascular Surgery</option>
                                        <option value="Audiologist">Neurologist </option>
                                        <option value="Audiologist">Dentist </option>
                                        <option value="Audiologist">dermatologist </option>
                                        <option value="Audiologist">Emergency Doctors</option>
                                        <option value="Audiologist">Endocrinologist  </option>
                                        <option value="Audiologist">gynecologist  </option>
                                        <option value="Audiologist">Psychiatrist  </option>
                                        <option value="Audiologist">hematology  </option>
                                        <option value="Audiologist">Hepatologists   </option>
                                        <option value="Audiologist">Immunologist   </option>
                                        <option value="Audiologist">Internists Gastroenterology Neonatologist </option>
                                        <option value="Audiologist">Orthopdist   </option>
                                        <option value="Audiologist">Pediatrician   </option>
                                        <option value="Audiologist">Plastic Surgeon </option>
                                        <option value="Audiologist">Surgeon   </option>
                                        <option value="Audiologist">Urologist     </option>
                                        <option value="Audiologist">Rheumatologist    </option>
                                        <option value="Audiologist">Ophthalmologist    </option>
                                        <option value="Audiologist">General Practitioner </option>
                                        <option value="Audiologist">Ear , Nose and Throat </option>
                                        <option value="Audiologist">Endoscopic Surgeon </option>
                                        <option value="Audiologist">Radiologist     </option>
                                        <option value="Audiologist">Laboratory & Analytical </option>
                                        <option value="Audiologist">Pharmacist      </option>
                                        <option value="Audiologist">Oncologist     </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <input type="text" name="Nationality" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>National Id </label>
                                    <input type="text" name="national_id" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>National Id Front Side</label>
                                    <input type="file" name="national_id_front_side" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>National Id Back Side</label>
                                    <input type="file" name="national_id_back_side" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>phone Number</label>
                                    <input type="text" name="phoneNumber" class="form-control" value="{{old('phoneNumber')}}">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="Password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Branch</label>
                                    <input type="text" name="branch" class="form-control" value="{{old('branch')}}">
                                </div>
                                <input type="submit" value="Add" class="btn btn-primary">
                            </form>
                        </div>
                        {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- ad new doctor -->
            <!-- get All Doctor -->
            <!-- Button trigger modal -->
{{--            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#getAllDoctor">--}}
{{--                Get All Doctor--}}
{{--            </button>--}}

{{--            <!-- Modal -->--}}
{{--            <div class="modal fade" id="getAllDoctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                <div class="modal-dialog modal-lg" role="document" >--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="exampleModalLabel">Get All Doctor</h5>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            <table class="table table-striped">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col">#</th>--}}
{{--                                    <th scope = "col">Image</th>--}}
{{--                                    <th scope="col">Doctor Name</th>--}}
{{--                                    <th scope="col">Primary Speciality</th>--}}
{{--                                    <th scope="col">Degree</th>--}}
{{--                                    <th>Control</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @php--}}
{{--                                    $doctor_count = $hosptail->doctors->count();--}}
{{--                                @endphp--}}
{{--                                @if($doctor_count > 0)--}}
{{--                                    @foreach($hosptail->doctors as $doctor)--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">{{$doctor->id}}</th>--}}
{{--                                            <td><img src="{{url(public_path('uploads/doctor/hosptail/' . $doctor->image))}}"></td>--}}
{{--                                            <td>{{$doctor->name}}</td>--}}
{{--                                            <td>{{$doctor->Primary_Speciality}}</td>--}}
{{--                                            <td>{{$doctor->degree}}</td>--}}
{{--                                            <td>--}}
{{--                                                <form action="{{route('hosptail_delete_doctor',[$hosptail->id,$doctor->id])}}" method="POST">--}}
{{--                                                    {{csrf_field()}}--}}
{{--                                                    <input type="hidden" name="_method" value="DELETE">--}}
{{--                                                    <button class="btn btn-danger">Delete</button>--}}
{{--                                                </form>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                @else--}}
{{--                                    <div class="alert alert-danger">Sory Doctors Not Found</div>--}}
{{--                                @endif--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        --}}{{-- <div class="modal-footer">--}}
{{--                          <button type="button" class="btn btn-primary">Get</button>--}}
{{--                        </div> --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- get All Doctor -->
            <!--Start-Footer-->
        @include('backEnd.layoutes.footer')
        <!--End-Footer-->
        </div>
    </div>




@stop
