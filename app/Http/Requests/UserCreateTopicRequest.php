<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateTopicRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	public function messages()
	{
		return [
		'integer'=>'The forum field is required.'];
	}
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		//title, desc, post
		return [
			'forum_id'=>'required|integer|exists:forums,id',
			'title'=>'required|min:5|max:50',
			'description'=>'min:3|max:50',
			'post_body'=>'required|min:5'
		];
	}

}
