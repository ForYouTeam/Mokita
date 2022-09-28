<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class HakimRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        'nama' => 'required|max:255|min:2', 
        'nip' => 'required|max:255|min:2', 
        'tempat_lahir' => 'required|min:2', 
        'tgl_lahir' => 'required', 
        'jabatan' => 'required|max:255|min:2',
        'pendidikan_s1' => 'required',
        'sertifikat_mediator' => 'required|max:255|min:2'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'response' => array(
                'icon' => 'error',
                'title' => 'Validasi Gagal',
                'message' => 'Data yang di input tidak tervalidasi',
            ),
            'errors' => array(
                'length' => count($validator->errors()),
                'data' => $validator->errors()
            ),
        ], 422));
    }
}
