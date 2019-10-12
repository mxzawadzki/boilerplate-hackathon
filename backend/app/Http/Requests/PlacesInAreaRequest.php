<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlacesInAreaRequest extends FormRequest
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
            'boundaries' => [
                'array',
                'required',
                'min:2',
                'max:2'
            ],
            'boundaries.*' =>[
                'required',
                function ($attribute, $value, $fail) {
                    if (count($value)!== 2) {
                        $fail($attribute.' ma za zły format');
                    }
                    if(abs($value[0])>90){
                        $fail($attribute.' ma złą szerokośc');
                    }
                    if(abs($value[1])>180){
                        $fail($attribute.' ma złą wysokosc');
                    }
                },
            ]
        ];
    }
}
