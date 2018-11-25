<?php

namespace App\Http\Requests\RH;

use App\Rules\TelRule;
use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'first_name'    => 'required|string|min:2|max:20',
            'last_name'     => 'required|string|min:2|max:20',
            'tel'           => ['bail','required','min:10','max:10',new TelRule(),'unique:tels,id,' . $this->member->info->tels[0]->id],
            'address'       => 'nullable|string|min:10|max:100',
            'city'          => 'bail|required|int|exists:cities,id',
            'birth'         => 'bail|nullable|date|before:' . date('d-m-Y',strtotime("-18 years")),
            'sex'           => 'required|string'
        ];
    }
}
