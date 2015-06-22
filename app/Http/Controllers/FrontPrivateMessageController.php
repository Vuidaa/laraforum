<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\PrivateMessage;
use Illuminate\Http\Request;
use App\Http\Requests\UserSendPrivateMessageRequest;

class FrontPrivateMessageController extends Controller {

	public function show($id)
	{
		$message = PrivateMessage::findOrFail($id);

		if($message->status == 'new')
		{
			$message->status = 'old';

			$message->save();
		}
		
		if(Auth::user()->id == $message->recipient_id)
		{
			return view('pages.profile.private_message')->with('message',$message);
		}
		return redirect('/');
	}

	public function create($recipient, UserSendPrivateMessageRequest $req)
	{
		$message = new PrivateMessage;

		$message->message = $req->message;
		$message->recipient_id = $recipient;
		$message->status = 'new';

		$sender = Auth::user();

		$sender->sent_messages()->save($message);

		return redirect('profile/'.$sender->slug)->with('global',['class'=>'success','message'=>'Message sent.']);
	}

	public function delete($id)
	{
		$message = PrivateMessage::findOrFail($id);

		if($message->recipient_id == Auth::user()->id)
		{
			$message->delete();

			return redirect('profile/'.Auth::user()->slug)->with('global',['class'=>'success','message'=>'Message deleted.']);
		}

		return redirect('/');
		
	}
}
