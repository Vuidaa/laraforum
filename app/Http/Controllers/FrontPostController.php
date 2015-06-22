<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreatePostRequest;
use App\Topic;
use App\Post;

use Illuminate\Http\Request;

class FrontPostController extends Controller {

	public function store($topic_id, UserCreatePostRequest $req)
	{
		$topic = Topic::findorFail($topic_id);
		$topic->updated_at = \Carbon\Carbon::now();

		$post = new Post;
		$post->user_id = Auth::user()->id;
		$post->post_body = $req->post_body;

		$topic->posts()->save($post);
		$topic->save();
		return redirect()->back();
	}

}
