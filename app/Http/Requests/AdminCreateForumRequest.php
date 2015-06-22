<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminCreateForumRequest extends Request {

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
		switch ($this->method()) {
			case 'POST':
				return [
					'title'=>'required|min:3',
					'section_id'=>'required|exists:sections,id',
					'description'=>'required|min:5|max:300'
				];
				break;
			case 'PUT':
			case 'PATCH':
				return [
					'title'=>'required|min:3',
					'section_id'=>'required|exists:sections,id',
					'description'=>'required|min:5|max:300'
				];
				break;
			
			default:
				# code...
				break;
		}
	}

}
