<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model {

	/* id - topic_id - user_id - post_body - updated_at - created_at */

	public function topic()
	{
		return $this->belongsTo('App\Topic');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
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
