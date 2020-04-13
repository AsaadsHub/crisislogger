<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UploadRequest
 * @package App\Http\Requests
 * @property \File data
 * @property int share
 * @property int contribute
 * @property string voice
 */
class UploadRequest extends FormRequest
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
            'data' => 'required',
            'share' => 'required',
            'contribute' => 'required',
            'voice' => 'nullable'
        ];
    }
}
