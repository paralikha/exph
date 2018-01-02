<?php

namespace Experience\Requests;

use Pluma\Requests\FormRequest;

class ExperienceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        switch ($this->method()) {
            case 'POST':
                if ($this->user()->can('store-experience')) {
                    return true;
                }
                break;

            case 'PUT':
                if ($this->user()->can('update-experience')) {
                    return true;
                }
                break;

            case 'DELETE':
                if ($this->user()->can('destroy-experience')) {
                    return true;
                }
                break;

            default:
                return false;
                break;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $isUpdating = $this->method() == "PUT" ? ",id,$this->id" : "";

        return [
            'name' => 'required|max:255',
            'code' => 'required|regex:/^[\pL\s\-\*\#\(0-9)]+$/u|unique:experiences'.$isUpdating,
            'reference_number' => 'required|unique:experiences'.$isUpdating,
            'availabilities' => 'required',
            'availabilities.*.date_start' => 'required',
            'availabilities.*.date_end' => 'required',
            'price' => 'required',
            'user' => 'sometimes|required',
        ];
    }

    /**
     * The array of override messages to use.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'code.regex' => 'Only letters, numbers, spaces, and hypens are allowed.',
            'user.required' => 'The travel manager field is required',
            'availabilities.*.date_start.required' => 'The start date is required',
            'availabilities.*.date_end.required' => 'The end date is required',
        ];
    }
}
