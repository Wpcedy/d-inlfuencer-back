<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
            'name' => 'required|string|max:180',
            'description' => 'string|max:250',
            'budget' => 'required|numeric:2',
            'start_campaign' => 'required|date',
            'end_campaign' => 'required|date|after:start_campaign',
        ];
    }
}