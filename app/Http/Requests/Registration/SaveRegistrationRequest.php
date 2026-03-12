<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          "name"=> [
            "required",
            "string",
            "unique:users,name",
            "alpha_dash:ascii"
          ],
          "email"=> [
            "required",
            Rule::email()
            ->rfcCompliant(strict: false)
            ->validateMxRecord()
            ->preventSpoofing()
            ,"unique:users,email",

          ],
          "password"=> [
            "required",
            "min:8",
            "string",
            "confirmed"
          ],
        ];
    }


}
