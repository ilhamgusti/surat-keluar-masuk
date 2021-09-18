<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratRequest extends FormRequest
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
            'judul'=>'required|string',
            'nomor'=>'required|string',
            'tanggal'=>'required|date',
            'jenis'=>'required|string',
            'file_url'=>'required|file',
            'type' => 'required|string',
            // 'status'=>'required|integer',
            'remarks'=> 'sometimes|required|string',
        ];
    }
}
