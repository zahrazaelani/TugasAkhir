<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
        'jenis' => 'required|max:255',
        'lembaga' => 'required|max:255',
        'tanggal'=> 'required|date',
        'tanggal_expired' => 'required|date',
        'no_sertifikat' => 'required|max:255',
        'users_id' => 'required|exists:users,id', //harus ada user nya siapa
        'status' => 'required|max:255'

        ];
    }
}
