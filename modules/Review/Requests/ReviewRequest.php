<?php

namespace Review\Requests;

use Pluma\Requests\FormRequest;

class ReviewRequest extends FormRequest
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
                if ($this->user()->can('store-review')) {
                    return true;
                }
                break;

            case 'PUT':
                if ($this->user()->can('update-review')) {
                    return true;
                }
                break;

            case 'DELETE':
                if ($this->user()->can('destroy-review')) {
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
            'body' => 'required|max:255',
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
            'body.regex' => 'Please type a review.',
        ];
    }
}
