<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Hosptail;
use App\models\Patien;
use App\models\patient_analzes;
use App\models\Doctor;
use App\models\patient_rays;
use App\models\Result;
// use App\models\patient_rays;
use App\models\Raoucheh;
use App\models\API\analyzes;
use App\models\API\Rays;
use App\Http\Requests\backEnd\hosptail\Store;
use App\Http\Requests\backEnd\doctor\StoreDoctor;
use App\Http\Requests\backEnd\hosptail\Update;
use App\Http\Requests\backEnd\hosptail\StoreAnalaz;
use App\Http\Requests\backEnd\hosptail\StoreRays;
use App\Http\Requests\backEnd\hosptail\StoreRaoucata;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifyHosptail;
use Auth;
use Image;
use Storage;
use Validator;

class hosptailController extends Controller
{
    public function register(){
        return view('backEnd.hosptail.register');
    }
    public function postRegister(Store $request){
        $request_data = $request->all();
        /* upload img */
        if($request->image){
            $img = Image::make($request->image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/hosptail/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }
        /* upload hosptail */
        if($request->Hosptail_License){
            $img = Image::make($request->Hosptail_License)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/hosptail/' . $request->Hosptail_License->hashName()));
            $request_data['Hosptail_License'] = $request->Hosptail_License->hashName();
        }
        /* secure password */
        $request_data['password'] = bcrypt($request->password);
        // role = patient //
        $request_data['role'] = 'hosptail';
        $request_data['phoneNumber'] = $request->countryCode . $request->phoneNumber;
        $request_data['is_active'] = false;
        /* insert data */
        $hosptail_create = Hosptail::create($request_data);

        return redirect()->route('hosptail_verify',compact('hosptail_create'));


        // /* send mail */
        //  Mail::to($hosptail_create->email)->send(new verifyHosptail($hosptail_create));
        // return redirct //
        return redirect()->back()->with(['verifyMsg'=>'Check Your Email']);
    }
    /* function hosptail */
    /* function send email */
    public function sendEmail($id){
        $hosptail = Hosptail::findOrFail($id);
        Mail::to($patient->email)->send(new verifyHosptail($hosptail));
        return redirect()->back()->with(['EmailMsg'=>'Check Your Email']);
    }
    /* end of function send email */
    /* function verify hosptail */
    public function verifyHosptail($id){
        $hosptail = Hosptail::findOrFail($id);
        $hosptail->verify = 1;
        $hosptail->save();
        auth()->guard('hosptail')->login($hosptail);
        return redirect()->route('hosptail.edit.profile',$hosptail->id);
    }
    /* edit profile */
    public function editProfile($id){
        $hosptail = Hosptail::findOrFail($id);
        return view('backEnd.hosptail.edit',compact('hosptail'));
    }
    /* edit profile */
    public function updateProfile($id, Update $request){
        // return dd($request_data = $request->all());
        $hosptail = Hosptail::findOrFail($id);
        $request_data = $request->all();
        /* update image */
        if($request->image){
            // if($request->image != 'default.jpeg'){
            //     Storage::disk('public_path')->delete('hosptail/' . $hosptail->image);
            // }
            $img = Image::make($request->image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/hosptail/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }
        /* update image */
        $hosptail->update($request_data);
        return redirect()->back()->with(['msgUpdate'=>'Data Updated Successfuly']);
    }
    public function profile($id){
        $hosptail = Hosptail::find($id);
        return view('backEnd.hosptail.profile',compact('hosptail'));
    }
    /* function search patient form phone number */
    public function search($id,Request $request){
        $hosptail = Hosptail::findOrFail($id);
        $analyzes = analyzes::get();
        $rays = Rays::get();
        $patient = Patien::with(['patient_analzes','patient_rays','Raoucheh'])->where('phoneNumber','like','%' . $request->search . '%')->first();
        if($patient){
            return view('backEnd.hosptail.search-patient',compact('patient','hosptail','analyzes','rays'));
        }else{
            return redirect()->back()->withErrors(['msgSearchError'=>'No Result']);
        }
    }
    /* function search patient form phone number */
    /* end of function */
    /* function logout */
    public function logout(){
        Auth::guard('hosptail')->logout();
        return redirect()->route('indexRoute');
    }
    /* end of function */
    /* function store raoucata */
    public function storeRaoucata($id,StoreRaoucata $request){
        $hosptail = Hosptail::findOrFail($id);
        $request_data = $request->all();
        if(count($request->medication_name) > 0){
            foreach($request->medication_name as $item => $v){
                $roaucata_data = [
                    'prescription'  => $request->prescription,
                    'weight'        => $request->weight,
                    'temperature'   => $request->temperature,
                    'blood_pressure'=> $request->blood_pressure,
                    'diabetics'     => $request->diabetics,
                    'jaw_type'      => $request->jaw_type,
                    'jaw_direction' => $request->jaw_direction,
                    'teeth_type'    => $request->teeth_type,
                    'eye_type'      => $request->eye_type,
                    'medication_name'=> json_encode($request->medication_name),
                    'times_day'     => json_encode($request->times_day),
                    'time'          => json_encode($request->time),
                    'patient_id'    => $request->patient_id,

                ];
            }
        }
        $roaucataCreate = Raoucheh::create($roaucata_data);

        return redirect()->route('hosptail.patient.search',$hosptail->id)->with(['roacataMsg'=>'Roacata Added Successfuly']);
    }

    /* end of function */
    public function patient_hosptail_add_analzes($id,StoreAnalaz $request){
         //dd($request->all());
        $request_data = $request->all();
        $hosptail = Hosptail::findOrFail($id);
        // if(count($request->name) > 0){
        //     foreach($request->name as $item=> $v){
        //         $data = [
        //             'name' => json_encode($request->name),
        //             'description'   => $request->description,
        //             'patient_id'    => $request->patient_id
        //         ];
        //     }
        // }
        $request_data['patient_id'] = $request->patient_id;
        // dd($request->all());
        $request_create = patient_analzes::create($request_data);
        // dd('done');
        return redirect()->route('hosptail.patient.search',$hosptail->id);
    }

    public function patient_hosptail_add_rays($id,StoreRays $request){
        // dd($request->all());
        $request_data = $request->all();
        $hosptail = Hosptail::findOrFail($id);
        // if(count($request->name) > 0){
        //     foreach($request->name as $item=> $v){
        //         $data = [
        //             'name' => json_encode($request->name),
        //             'description'   => $request->description,
        //             'patient_id'    => $request->patient_id
        //         ];
        //     }
        // }
        $request_data['patient_id'] = $request->patient_id;
        // dd($request->all());
        $request_create = patient_rays::create($request_data);
        // dd('done');
        return redirect()->route('hosptail.patient.search',$hosptail->id);
    }

    public function as_a_doctor($id){
        $hosptail = Hosptail::findOrFail($id);
        return view('backEnd.hosptail.as_a_doctor',compact('hosptail'));
    }
    public function get_search_lab($id){
        $hosptail = Hosptail::findOrFail($id);
        return view('backEnd.hosptail.hosptail_lab_profile',compact('hosptail'));
    }
    public function post_search_lab($id,Request $request){
        $hosptail = Hosptail::findOrFail($id);
        $patient = Patien::with(['patient_analzes'])->where('phoneNumber','like','%' . $request->search . '%')->first();
        if($patient){
            return view('backEnd.hosptail.search_lab_hosptail',compact('patient','hosptail'));
        }else{
            return redirect()->back()->withErrors(['msgSearchError'=>'No Result']);
        }
    }

    public function get_search_xray($id){
        $hosptail = Hosptail::findOrFail($id);
        return view('backEnd.hosptail.hosptail_xray_profile',compact('hosptail'));
    }
    public function post_search_xray($id,Request $request){
        $hosptail = Hosptail::findOrFail($id);
        $patient = Patien::with(['patient_rays'])->where('phoneNumber','like','%' . $request->search . '%')->first();
        if($patient){
            return view('backEnd.hosptail.search_xray_hosptail',compact('patient','hosptail'));
        }else{
            return redirect()->back()->withErrors(['msgSearchError'=>'No Result']);
        }
    }



    public function get_search_pharmacy($id){
        $hosptail = Hosptail::findOrFail($id);
        return view('backEnd.hosptail.hosptail_pharmacy_profile',compact('hosptail'));
    }
    public function post_search_pharmacy($id,Request $request){
        $hosptail = Hosptail::findOrFail($id);
        $patient = Patien::with(['Raoucheh'])->where('phoneNumber','like','%' . $request->search . '%')->first();
        if($patient){
            return view('backEnd.hosptail.search_pharmacy_hosptail',compact('patient','hosptail'));
        }else{
            return redirect()->back()->withErrors(['msgSearchError'=>'No Result']);
        }
    }

    public function hosptail_add_doctor($id,StoreDoctor $request){
        $doctor_data = $request->all();
        /* upload img */
        // doctor image
        if($request->image){
            $img = Image::make($request->image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/doctor/hosptail/' . $request->image->hashName()));
            $doctor_data['image'] = $request->image->hashName();
        }
        // national id front image
        if($request->national_id_front_side){
            $national_id_front = Image::make($request->national_id_front_side)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/doctor/hosptail/' . $request->image->hashName()));
            $doctor_data['national_id_front_side'] = $request->national_id_front_side->hashName();
        }
        // national id back image
        if($request->national_id_back_side){
            $national_id_back_side = Image::make($request->national_id_back_side)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/doctor/hosptail/' . $request->national_id_back_side->hashName()));
            $doctor_data['national_id_back_side'] = $request->national_id_back_side->hashName();
        }
        $doctor_data['password'] = bcrypt($request->password);
        $doctor_data['phoneNumber'] = 'D' . $request->phoneNumber;
        $hosptail = Hosptail::findOrFail($id);
        $doctor_create = Doctor::create($doctor_data);
        return redirect()->route('hosptail.profile',$hosptail->id);
    }
    // add result to rays
    public function addResult_rays($id,Request $request){
        $request_data = $request->all();
        if($request->file('name')){
            $file = $request->file('name');
            $fileName = time() . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/pdf_file/result/rays/'),$fileName);
            $request_data['name'] = $fileName;
        }
        $request_data['rays_id'] = $request->rays_id;
        $hosptail = Hosptail::findOrFail($id);
        $result = Result::create($request_data);
        return redirect()->back();
    }
    // add result to analzes
    public function addResult_analzes($id,Request $request){
        $request_data = $request->all();
        if($request->file('name')){
            $file = $request->file('name');
            $fileName = time() . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/pdf_file/result/analzes/'),$fileName);
            $request_data['name'] = $fileName;
        }
        $request_data['analzes_id'] = $request->analzes_id;
        $hosptail = Hosptail::findOrFail($id);
        $result = Result::create($request_data);
        return redirect()->back();
    }
    public function loginDoctor($id){
        $hosptail = Hosptail::findOrFail($id);
        return view('backEnd.hosptail.doctor.login',compact('hosptail'));
    }

    public function post_loginDoctor($id,Request $request){
        $hosptail = Hosptail::findOrFail($id);
        $arr = [
            'name' => 'required',
            'password'  => 'required',
        ];
        $vaild = Validator::make($request->all(),$arr);
        if($vaild->fails()){
            return redirect()->back();
        }
        $attmp = $request->only('name','password');
        if(! Auth::guard('doctor')->attempt($attmp)){
            return redirect()->back()->with('msg','nanme or password incorrect');
        }
        return redirect()->route('hosptail.profile',$hosptail->id);
    }
    // delete doctor //
     public function hosptail_delete_doctor($id,$doctor_id){
         $hosptail = Hosptail::findOrFail($id);
         $hosptail->doctors()->where('id',$doctor_id)->delete();
//         dd('done delete');
         return redirect()->route('loginDoctor',$hosptail->id);
      }
      // delete doctor //

}
