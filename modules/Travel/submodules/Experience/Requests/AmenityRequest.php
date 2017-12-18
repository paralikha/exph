<?php

namespace Experience\Requests;

use Pluma\Requests\FormRequest;

class AmenityRequest extends FormRequest
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
                if ($this->user()->can('store-amenity')) {
                    return true;
                }
                break;

            case 'PUT':
                if ($this->user()->can('update-amenity')) {
                    return true;
                }
                break;

            case 'DELETE':
                if ($this->user()->can('destroy-amenity')) {
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
            'icon' => 'required',
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
            //
        ];
    }
}
