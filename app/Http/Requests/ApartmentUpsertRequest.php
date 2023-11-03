<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ApartmentUpsertRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    // Checks if the user is authorized or not, it return true if auth'd, false if not
    return Auth::check();
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      "title" => "required|string|max:50",
      "address" => "required|string",
      "price" => "required|integer",
      "images" => "required|image|max:10240",
      "description" => "required|string|max:500",
      "rooms_num" => "required|integer",
      "beds_num" => "required|integer",
      "bathroom_num" => "required|integer",
      "visibility" => "required|boolean",
      "square_meters" => "required|integer"
    ];
  }
  
	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array<string, string>
	 */
	public function messages(): array
	{
		return [
			'title.required' => 'A title is required.',
			'address.required' => 'An address is required',
			'description.required' => 'A description is required.',
			'images.required' => "At least one apartment's image is required.",
			'rooms_num.required' => "You need to provide the rooms number.",
			'bathroom_num.required' => "You need to provide the bathrooms number.",
			'beds_num.required' => "You need to provide the beds number.",
      'square_meters.require' => "You need to provide a rough indication of the apartmetn's square meters.",
		];
	}
}
