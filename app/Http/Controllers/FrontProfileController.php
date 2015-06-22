<?php namespace App\Http\Controllers;

use Auth;
use File;
use Hash;
use App\Http\Controllers\Controller;
use App\User;

use App\Http\Requests\UserAvatarRequest;
use App\Http\Requests\UserEditProfileRequest;
use App\Http\Requests\UserChangePasswordRequest;


class FrontProfileController extends Controller 
{
	
	protected $user;

	public function __construct()
	{
		$this->user = Auth::user();
	}

	public function index($slug = null)
	{	
		if($slug != null)
		{
			if($this->user->slug == $slug)
			{
				$this->user->load('received_messages.sender','sent_messages.recipient');

				$new = $this->user->received_messages->contains('status','new');

				return view('pages.profile.index')->with([
					'user'=>$this->user,
					'new'=>$new]);
			}
			else
			{
				$user = User::where('slug','=',$slug)->first();

				if($user)
				{
					return view('pages.profile.public')->with(['user'=>$user]);
				}

				return abort(404);
			}
		}

		return redirect('/');
	}

	public function avatar(UserAvatarRequest $req)
	{
		$image = $req->file('avatar');

		$path = base_path().'\public\images\avatars\\';

		$filename = $this->user->slug.'-avatar.'.$image->getClientOriginalExtension();

		if($this->user->avatar !== 'default.png')
		{
			File::delete($path.$this->user->avatar);
		}

		$this->user->avatar = $filename;

		$this->user->save();

		$image->move($path,$filename);

		return redirect('profile/'.$this->user->slug)->with('global',['class'=>'success','message'=>'Avatar changed']);
	}

	public function update(UserEditProfileRequest $req)
	{
		$this->user->name = $req->name;
		$this->user->email  = $req->email;
		$this->user->city = $req->city;
		$this->user->signature = $req->signature;

		$this->user->save();

		return redirect('profile/'.$this->user->slug)->with('global',['class'=>'success','message'=>'Profile updated']);
	}

	public function password(UserChangePasswordRequest $req)
	{
		if(Hash::check($req->old_password, $this->user->password))
		{
			$this->user->password = Hash::make($req->password);

			$this->user->save();

			return redirect('profile/'.$this->user->slug)->with('global',['class'=>'success','message'=>'Password changed.']);
		}

		$messages = ['Incorrect old password'];

		return redirect('profile/'.$this->user->slug)->withErrors($messages);
	}
}
	