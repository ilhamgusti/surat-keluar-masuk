<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProyekRequest extends FormRequest
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
            'judul'=>'sometimes|required|string',
            'nomor'=>'sometimes|required|string',
            'tanggal'=>'sometimes|required|date',
            'jenis'=>'sometimes|required|string',
            'file_url'=>'sometimes|required|file|mimes:xlsx,pdf,jpeg,jpg,png,xls,doc,docx',
            'status'=>'sometimes|required|integer',
        ];
    }
}
