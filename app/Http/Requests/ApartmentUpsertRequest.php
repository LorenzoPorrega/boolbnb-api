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
      "title" => "nullable|string|max:50",
      "address" => "nullable",
      "price" => "nullable|integer",
      'images' => 'nullable|array',
      "description" => "nullable|string|max:500",
      "rooms_num" => "nullable|integer",
      "beds_num" => "nullable|integer",
      "bathroom_num" => "nullable|integer",
      "visibility" => "nullable|boolean",
      "square_meters" => "nullable|integer",
      "amenity" => "nullable|array"
    ];
  }
   // "images" => "required|image|max:10240",
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
