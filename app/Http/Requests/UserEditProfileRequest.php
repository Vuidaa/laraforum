<?php namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;

class UserEditProfileRequest extends Request {

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
		//name email city signature
		$user = Auth::user();
		return [
			'name' =>'required|max:255',
			'email' =>'required|email|max:255|unique:users,email,'.$user->id,
			'city'=>'required|min:2|max:50|alpha_dash',
			'signature'=>'required|min:2|max:255'
		];
	}

}
