<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkripsiUpdateRequest extends FormRequest
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
            //
            'nim' => 'required|numeric',
            'nama' => 'required',
            'prodi' => 'required',
            'pembimbing1' => 'required',
            'pembimbing2' => '',
            'judul_skripsi' => 'required',
            'tahun' => 'required|numeric',
            'kode_skripsi' => 'required',
            'abstrak' => 'required',
        ];
    }
}
