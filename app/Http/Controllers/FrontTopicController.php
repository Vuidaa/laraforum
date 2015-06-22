<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateTopicRequest;
use App\Http\Requests\UserEditTopicRequest;
use App\Section;
use App\Forum;
use App\Topic;
use App\Post;


use Illuminate\Http\Request;

class FrontTopicController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($forum = null)
	{

		if($forum !== null)
		{
			$forum = Forum::where('slug','=',$forum)->first();

			if($forum)
			{
				$clean[$forum->section->title][$forum->id] = $forum->title; 

				return view('pages.topic.create')->with('data',$clean);
			}

			abort(404);
		}

		return redirect('/');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserCreateTopicRequest $req)
	{
		$topic = new Topic;
		$post = new Post;
		$user = Auth::user();

		$topic->user_id = $user->id;
		$topic->title = $req->title;
		$topic->description = $req->description;

		$forum = Forum::findorFail($req->forum_id);
		$topic = $forum->topics()->save($topic);

		$post->user_id = $user->id;
		$post->post_body = $req->post_body;

		$topic->posts()->save($post);

		return redirect($forum->section->slug.'/'.$forum->slug.'/'.$topic->slug)
				->with('global',
					['class'=>'success',
					'message'=>'Topic created successfully !']);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UserEditTopicRequest $req)
	{
		$topic = Topic::find($id);

		if($topic->user_id === Auth::user()->id)
		{
			$topic->title = $req->title;
			$topic->description = $req->description;

			$topic->save();

			return redirect($topic->forum->section->slug.'/'.$topic->forum->slug.'/'.$topic->slug)
					->with('global',['class'=>'success','message'=>'Topic edited successfully.']);
		}

		return redirect('/');
	}

	public function delete($id)
	{
		$topic = Topic::find($id);

		if($topic->user_id === Auth::user()->id)
		{
			$topic->delete();

			return redirect($topic->forum->section->slug.'/'.$topic->forum->slug)
					->with('global',['class'=>'success','message'=>'Topic deleted successfully.']);
		}

		return redirect('/');
	}

}
