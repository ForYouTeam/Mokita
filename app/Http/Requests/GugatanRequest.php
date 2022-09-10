<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GugatanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        'id_penggugat' => 'required', 
        'id_tergugat' => 'required', 
        'tgl_pernikahan' => 'required', 
        'kecamatan' => 'required|max:255|min:2',
        'kabupaten' => 'required|max:255|min:2', 
        'no_akta_nikah' => 'required|max:255|min:2', 
        'tinggal_1' => 'required|min:2', 
        'tinggal_2' => 'required|min:2', 
        'id_anak' => 'required',
        'tgl_tidak_rukun' => 'required', 
        'penyebab' => 'required|min:2', 
        'puncak_konflik' => 'required', 
        'lama_pisah' => 'required'
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
