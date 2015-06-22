<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Section;
use App\Http\Requests\AdminCreateSectionRequest;

use Illuminate\Http\Request;

class BackSectionController extends Controller {

	/**
	 * Instance of Section class
	 *
	 * @var Object
	 **/
	protected $section;

	public function __construct(Section $section)
	{
		$this->section = $section;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.section.index')->with('sections', $this->section->with('forums')->get());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.section.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminCreateSectionRequest $req)
	{
		$this->section->title = $req->title;
		$this->section->save();

		return redirect('admin/section')->with('global', ['class'=>'success', 'message'=>'Section created successfully.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('admin.section.show')->with('section',$this->section->findorFail($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$section = $this->section->findorFail($id);

		return view('admin.section.edit')->with('section',$section);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(AdminCreateSectionRequest $req ,$id)
	{
		$section = $this->section->findorFail($id);

		$section->title = $req->title;
		$section->save();

		return redirect('admin/section')->with('global', ['class'=>'success', 'message'=>'Section updated successfully.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$section = $this->section->findorFail($id);

		$section->delete();

		return redirect('admin/section')->with('global', ['class'=>'success', 'message'=>'Section deleted.']);
	}

}
