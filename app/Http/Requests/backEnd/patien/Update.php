<?php

namespace App\Http\Requests\BackEnd\patien;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'width'            => 'required',
            'width_type'       => 'required',
            'height'           => 'required',
            'blood'            => 'required',
            'agree_name'       => 'array',
            'allergi_name'     => 'array',
            'severity'         => 'array',
            'reaction'         => 'array',
            'surgery_name'     => 'array',
            'surgery_date'     => 'array',
            'medication_name'  => 'array',
            'rocata_file'      => '',
            'rays_file'        => '',
            'analzes_file'     => '',
            'colonscopy'       => '',
            'colonscopy_data'  => '',
            'mammogram'        =>'',
            'mammogram_data'   => '',
            'prc'              => '',
            'prc_data'         => '',
            'alcohol_type'     => '',
            'alcohol_severity' => '',
            'cigarettes'       => '',
            'tobacco'          => '',
            'drug'             => '',
            'mother'           => 'array',
            'other_mother'     => '',
            'father'           => 'array',
            'other_father'     => '',
            'sister'           => 'array',
            'other_sister'     => '',
            'brother'          => 'array',
            'other_brother'    => '',
            'grnadmaM'         => 'array',
            'other_grnadmaM'   => '',
            'grandmaF'         => 'array',
            'other_grandmaF'   => '',
            'grnadpaM'         => 'array',
            'other_grnadpaM'   => '',
            'grnadpaF'         => 'array',
            'other_grnadpaF'   => '',
            'wife_Period_Cycle'=> '',
            'wife_Abotion'     => '',
            'wife_Contraceptive'    => '',
            'mother_Period_Cycle'   => '',
            'mother_pregnency'      => '',
            'mother_abotion'        => '',
            'mother_deliveries'     => '',
            'mother_complicetion'   => '',
            'mother_Contraceptive'  => '',
            'single_Period_Cycle'   => '',
            'patient_id'            => '',
            'online'                =>'',
         ];
    }
}
