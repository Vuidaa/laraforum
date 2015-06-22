<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Topic;
use App\Forum;
use App\Http\Requests\AdminEditTopicRequest;
use Illuminate\Http\Request;

class BackTopicController extends Controller {

	protected $topic;

	public function __construct(Topic $topic)
	{
		$this->topic = $topic;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.topic.index')->with('topics', $this->topic->with('forum','user')->get());
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.topic.edit')->with(['topic'=>$this->topic->findOrFail($id),'forums'=>\App\Forum::lists('title','id')]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(AdminEditTopicRequest $req, $id)
	{
		$forum = Forum::findOrFail($req->forum_id);
		$topic = $this->topic->findOrFail($id);

		$topic->title = $req->title;
		$topic->description = $req->description;
		$topic->important = $req->important;

		$forum->topics()->save($topic);

		return redirect('admin/topic')->with('global', ['class'=>'success', 'message'=>'Topic edited successfully.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->topic->findOrFail($id)->delete();

		return redirect('admin/topic')->with('global', ['class'=>'success', 'message'=>'Topic removed successfully.']);
	}

}
