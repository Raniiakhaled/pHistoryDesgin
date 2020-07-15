<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Patien;
use App\models\patientData;
use App\models\verify_patient;
use App\Http\Requests\backEnd\patien\Store;
use App\Http\Requests\backEnd\patien\Update;
use App\Http\Requests\backEnd\patien\UpdateData;
use Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\patienWelcome;
use App\Mail\verify_patien;
use Auth;


class patienController extends Controller
{
    // use AuthenticatesUsers;
    // // protected $redirectTo = '/patien';
    // // protected $guard = 'patien';
    // public function username()
    //     {
    //         return 'phoneNumber';
    //     }
    public function register(){
        return view('backEnd.patien.register');
    }
    /* function register patient */
    public function postRegister(Store $request){
        $request_data = $request->all();
        // dd($request->all());
        /* upload img */
        if($request->image){
            $img = Image::make($request->image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/patien/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }
        /* secure password */
        $request_data['password'] = bcrypt($request->password);
        $request_data['phoneNumber'] = $request->countryCode . $request->phoneNumber;
        // role = patient //
        $request_data['role'] = 'patient';
        $request_data['is_active'] = false;
        // dd($request->all());
        // dd($request_data['code']);
        /* insert data */
        $patienData = Patien::create($request_data);
        // return redirect()->route();
        return redirect()->route('patient_verify',compact('patienData'));
    }
    /* end of function */
    /* function send email */
    public function sendEmail($id){
        $patient = Patien::findOrFail($id);
        Mail::to($patient->email)->send(new verify_patien($patient));
        return redirect()->back()->with(['EmailMsg'=>'Check Your Email']);
    }
    /* end of function send email */
    /* function verify email */
    public function verifyPatient($id){
        $patient = Patien::findOrFail($id);
        $patient->verify = 1;
        $patient->save();
        auth()->guard('patien')->login($patient);
        return redirect()->route('edit.profile',$patient->id);
    }
    /* function verify email */
    public function profile($id){
        $patient = Patien::with('patinets_data')->findOrFail($id);
        // dd($patient->with('patinets_data'));
        return view('backEnd.patien.profile',compact('patient'));
    }
    /* edit profile function */
    public function editProfile($id){
        $patient = Patien::findOrFail($id);
        return view('backEnd.patien.edit-profile',compact('patient'));
        // return dd(Patien::find(1)->first()->agrees());
    }
    /* end of function */
    public  function download_pdf($id){
        $patient = Patien::findOrFail($id);
        return response()->download(public_path('uploads/pdf_file/rocata/' . $patient->patinets_data->rocata_file));
    }
    /* compleate profile function */
    public function updateProfile($id,Update $request){
        /* patient find by id */
        $patient = Patien::findOrFail($id);
//        /* insert all request */
        $requestData = $request->all();

                // dd($requestData['allergi_data'],json_encode($requestData['allergi_data']));
//        /* check allergi name of count > 0 */
        if(isset($requestData['allergi_data']) && count($requestData['allergi_data']) > 0){
            /* foreach data and insert request */
            // $requestData['width'] = $request->width . $request->width_type;
            // dd($requestData);
            foreach($requestData['allergi_data'] as $item=> $v){
                $data2 = [
                    'width'                 => $request->width . $request->width_type ,
                    'height'                => $request->height,
                    'blood'                 => $request->blood,
                    'agree_name'            => json_encode($request->agree_name),
                    'allergi_data'          => json_encode($request->allergi_data),
                    'surgery_data'          => json_encode($request->surgery_data),
                    'medication_name' => json_encode($request->medication_name),
                    // 'rocata_file'       => $request->rocata_file->getClientOriginalName(),
                    // 'rays_file'         => $request->rays_file->getClientOriginalName(),
                    // 'analzes_file'      => $request->analzes_file->getClientOriginalName(),
                    'colonscopy'      => $request->colonscopy,
                    'colonscopy_data'=> $request->colonscopy_data,
                    'mammogram'     => $request->mammogram,
                    'mammogram_data'=> $request->mammogram_data,
                    'prc'           => $request->prc,
                    'prc_data'      => $request->prc_data,
                    'alcohol_type'  => $request->alcohol_type,
                    'alcohol_severity'=> $request->alcohol_severity,
                    'cigarettes'       => $request->cigarettes,
                    'tobacco'           => $request->tobacco,
                    'drug'              => $request->drug,
                    'mother'            => json_encode($request->mother),
                    'other_mother'      => $request->other_mother,
                    'father'            => json_encode($request->father),
                    'other_father'      => $request->other_father,
                    'sister'            => json_encode($request->sister),
                    'other_sister'      => $request->other_sister,
                    'brother'           => json_encode($request->brother),
                    'other_brother'     => $request->other_brother,
                    'grnadmaM'          => json_encode($request->grnadmaM),
                    'other_grnadmaM'    => $request->other_grnadmaM,
                    'grandmaF'          => json_encode($request->grandmaF),
                    'other_grandmaF'    => $request->other_grandmaF,
                    'grnadpaM'          => json_encode($request->grnadpaM),
                    'other_grnadpaM'    => $request->other_grnadpaM,
                    'grnadpaF'          => json_encode($request->grnadpaF),
                    'other_grnadpaF'    => $request->other_grnadpaF,
                    'wife_Period_Cycle' => $request->wife_Period_Cycle,
                    'wife_Abotion'      => $request->wife_Abotion,

                    'medication_name'       => json_encode($request->medication_name),
                    'rocata_file'           => $request->rocata_file,
                    'rays_file'             => $request->rays_file,
                    'analzes_file'          => $request->analzes_file,
                    'colonscopy'            => $request->colonscopy,
                    'colonscopy_data'       => $request->colonscopy_data,
                    'mammogram'             => $request->mammogram,
                    'mammogram_data'        => $request->mammogram_data,
                    'prc'                   => $request->prc,
                    'prc_data'              => $request->prc_data,
                    'alcohol_type'          => $request->alcohol_type,
                    'alcohol_severity'      => $request->alcohol_severity,
                    'cigarettes'            => $request->cigarettes,
                    'tobacco'               => $request->tobacco,
                    'drug'                  => $request->drug,
                    'mother'                => json_encode($request->mother),
                    'other_mother'          => $request->other_mother,
                    'father'                => json_encode($request->father),
                    'other_father'          => $request->other_father,
                    'sister'                => json_encode($request->sister),
                    'other_sister'          => $request->other_sister,
                    'brother'               => json_encode($request->brother),
                    'other_brother'         => $request->other_brother,
                    'grnadmaM'              => json_encode($request->grnadmaM),
                    'other_grnadmaM'        => $request->other_grnadmaM,
                    'grandmaF'              => json_encode($request->grandmaF),
                    'other_grandmaF'        => $request->other_grandmaF,
                    'grnadpaM'              => json_encode($request->grnadpaM),
                    'other_grnadpaM'        => $request->other_grnadpaM,
                    'grnadpaF'              => json_encode($request->grnadpaF),
                    'other_grnadpaF'        => $request->other_grnadpaF,
                    'wife_Period_Cycle'     => $request->wife_Period_Cycle,
                    'wife_Abotion'          => $request->wife_Abotion,
                    'wife_Contraceptive'    => $request->wife_Contraceptive,
                    'mother_Period_Cycle'   => $request->mother_Period_Cycle,
                    'mother_pregnency'      => $request->mother_pregnency,
                    'mother_abotion'        => $request->mother_abotion,
                    'mother_deliveries'     => $request->mother_deliveries,
                    'mother_complicetion'   => $request->mother_complicetion,
                    'mother_Contraceptive'  => $request->mother_Contraceptive,
                    'patient_id'              =>$request->patient_id,
                    'single_Period_Cycle'      => $request->single_Period_Cycle,
                    'online'                =>$request->online,
                ];
            }

        }

        if($rocata_file=$request->file('rocata_file')){
            $rocata_name= rand(100000,999999).$rocata_file->getClientOriginalName();
            $rocata_file->move(public_path('uploads/pdf_file/rocata/'),$rocata_name);
            $data2['rocata_file'] = $rocata_name;
        }

        if($request->file('rays_file')){
            $rays_file = $request->file('rays_file');
            $rays_name = rand(100000,999999).$rays_file->getClientOriginalName();
            $rays_file->move('uploads/pdf_file/rays/' , $rays_name);
            $data2['rays_file'] = $rays_name;
        };
        if($request->file('analzes_file')){
            $analzes_file = $request->file('analzes_file');
            $analzes_name = rand(100000,999999).$analzes_file->getClientOriginalName();
            $analzes_file->move('uploads/pdf_file/analzes/' , $analzes_name);
            $data2['analzes_file'] = $analzes_name;
        };
        /* create data in table patient Data */

        $patienCreate = patientData::create($data2);


        /* return redirect profile patient */
        return redirect()->route('patien-profile',$data2['patient_id']);
        // dd('ok');
    }
    /* end of function */
    /* function edit data profile */
    public function editData($id){
        $patient = Patien::findOrFail($id);
        return view('BackEnd.patien.editData',compact('patient'));
    }
    /* end of function */
    /* function update basic data */
    public function updateData($id,UpdateData $request){
        $patient = Patien::findOrFail($id);
        $requestData = $request->all();
        if($request->image){
            // if($request->image != 'default.jpeg'){
            //     Storage::disk('public_path')->delete('hosptail/' . $hosptail->image);
            // }
            $img = Image::make($request->image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/patien/' . $request->image->hashName()));
            $requestData['image'] = $request->image->hashName();
        }
        //$requestData['role'] = 'patient';
        $DataUpdate = $patient->update($requestData);
        return redirect()->back()->with(['msgUpdateData'=>'data updated success']);
        // dd($request->all());
    }
    /* end of function */
    /* function logout patient */
    public function logout(){
        Auth::guard('patien')->logout();
        return redirect()->route('indexRoute');
    }
    /* end of function */

    public function verfi(){
        return view('backEnd.layoutes.verficationCode');
    }

    public function getOldpescription($id){
        $patient = Patien::with(['Raoucheh','patient_analzes','patient_rays'])->findOrFail($id);
        return view('backEnd.patien.old_pescription',compact('patient'));
    }



}
