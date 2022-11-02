<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlternatifRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_alternatif'=>'required',
            'sanksi_berorganisasi'=>'required',
            'status_keanggotaan'=>'required',
            'keaktifan'=>'required',
            'pengalaman'=>'required',
            'ijdk'=>'required'

        ];
    }
}
