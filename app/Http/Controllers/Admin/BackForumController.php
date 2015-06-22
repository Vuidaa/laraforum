<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Forum;
use App\Section;
use App\Http\Requests\AdminCreateForumRequest;

use Illuminate\Http\Request;

class BackForumController extends Controller {

	/**
	 * Instance of forum class
	 *
	 * @var Object
	 **/
	protected $forum;

	public function __construct(Forum $forum)
	{
		$this->forum = $forum;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.forum.index')->with('forums', $this->forum->with('section','topics')->get());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.forum.create')->with('sections', Section::lists('title','id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminCreateForumRequest $req)
	{
		$section = Section::findorFail($req->get('section_id'));

		$this->forum->title = $req->title;
		$this->forum->description = $req->description;

		$section->forums()->save($this->forum);

		return redirect('admin/forum')->with('global', ['class'=>'success', 'message'=>'Forum created successfully.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		dd($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$forum = $this->forum->findorFail($id);

		return view('admin.forum.edit')->with(['forum'=>$forum, 'sections'=> \App\Section::lists('title','id') ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(AdminCreateForumRequest $req ,$id)
	{
		$section = Section::findorFail($req->get('section_id'));
		$forum = $this->forum->findorFail($id);

		$forum->title = $req->title;
		$forum->description = $req->description;

		$section->forums()->save($forum);

		return redirect('admin/forum')->with('global', ['class'=>'success', 'message'=>'Forum updated successfully.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$forum = $this->forum->findorFail($id);

		$forum->delete();

		return redirect('admin/forum')->with('global', ['class'=>'success', 'message'=>'Forum deleted.']);
	}

}