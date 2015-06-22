<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PrivateMessage extends Model {

	public function sender()
	{
		return $this->belongsTo('App\User', 'sender_id');
	}

	public function recipient()
	{
		return $this->belongsTo('App\User', 'recipient_id');
	}

	public function getCreatedAtAttribute($value)
    {
    	$now = Carbon::now();
    	
    	$createdAt = Carbon::createFromTimeStamp(strtotime($value));

    	if($now->diffInDays($createdAt) > 31)
    	{
    		return $createdAt->toFormattedDateString(); 
    	}

    	return $createdAt->diffForHumans();
    }
}
