<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminCreateSectionRequest extends Request {

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
				];
				break;
			case 'PUT':
			case 'PATCH':
				return [
					'title'=>'required|min:3'
				];
				break;
			
			default:
				# code...
				break;
		}
	}

}
