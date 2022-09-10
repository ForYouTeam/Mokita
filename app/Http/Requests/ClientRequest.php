<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        'status' => 'required|max:255|min:2',
        'nama' => 'required|max:255|min:2',
        'marga' => 'required|max:255|min:2',
        'tempat_lahir' => 'required',
        'tgl_lahir' => 'required',
        'agama' => 'required|max:255|min:2',
        'pekerjaan' => 'required|max:255|min:2',
        'alamat' => 'required|min:2',
        'kelurahan' => 'required|max:255|min:2',
        'kecamatan' => 'required|max:255|min:2',
        'kabupaten' => 'required|max:255|min:2',
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
