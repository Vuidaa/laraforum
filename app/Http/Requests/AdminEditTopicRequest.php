<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminEditTopicRequest extends Request {

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
		//forum_id,user_id,title,slug,description,important
		return [
			'forum_id'=>'required|exists:forums,id',
			'title'=>'required|min:3|max:50',
			'description'=>'min:3|max:255',
			'important'=>'required'
		];
	}

}
