<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JadwalPendakianRequest extends FormRequest
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
            'destinasi_detail_id' => 'required|integer|exists:destinasi_detail,id',
            'tanggal_pendakian' => 'required|date',
            'kuota_pendakian' => 'required|integer', 
            'terdaftar' => 'required|in:KUOTA MASIH TERSEDIA,KUOTA SUDAH FULL', 
            'biaya' => 'required|integer'
        ];
    }
}
