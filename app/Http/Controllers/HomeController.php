<?php namespace App\Http\Controllers;

use App\Section;
use App\Forum;
use App\Topic;
use App\Post;
use Request;

class HomeController extends Controller
{
	public function index($section = null, $forum = null, $topic = null)
	{
		if($section === null)
		{
			return view('pages.index')->with('sections',Section::with('forums.topics')->get());
		}
		if(Section::where('slug', '=', $section)->exists())
		{
			if($forum === null)
			{
				return view('pages.index')->with('sections', Section::where('slug','=',$section)->with('forums.topics')->get());
			}
			$forum = Forum::where('slug','=',$forum)->first();
			if($forum !== null)
			{
				if($topic !== null)
				{
					$topic = Topic::where('slug','=',$topic)->first();
					$posts = $topic->posts()->with('user')->paginate(15);
				
					return view('pages.topic')->with([
													'topic'=>$topic,
													'posts'=>$posts]);
				}
				else
				{
					$topics = $forum->topics()->orderBy('important','desc')->orderBy('updated_at','desc')->paginate(15);
					$topics->load('user');
					$topics->load('postsCount');
					
					return view('pages.forum')->with([
						'forum'=>$forum,
						'section'=>$section,
						'topics'=>$topics]);
				}
			}
			return abort(404);
		}
	
		return abort(404);
	}
}