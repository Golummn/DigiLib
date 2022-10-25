<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuAddRequest extends FormRequest
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
            'judul_buku' => 'required',
            'kode_buku' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required|numeric',
            'jumlah_buku' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg|file|max:2000|dimensions:min_width=500,min_height=650,max_width=600,max_height=700',
        ];
    }
}
