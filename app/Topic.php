<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Topic extends Model implements SluggableInterface {

	use SluggableTrait;

	protected $sluggable = ['build_from'=>'title','save_to'=>'slug'];
	
	/* id - forum_id - user_id - slug - title - description - important - updated_at - created_at */

	public function forum()
	{
		return $this->belongsTo('App\Forum');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	public function getUpdatedAtAttribute($value)
    {
    	$now = Carbon::now();
    	
    	$updatedAt = Carbon::createFromTimeStamp(strtotime($value));

    	if($now->diffInDays($updatedAt) > 31)
    	{
    		return $updatedAt->toFormattedDateString(); 
    	}

    	return $updatedAt->diffForHumans();
    }

    public function postsCount()
	{
	  return $this->hasOne('App\Post')
	    ->selectRaw('topic_id, count(*) as aggregate')
	    ->groupBy('topic_id');
	}
	 
	public function getPostsCountAttribute()
	{
	  if(!array_key_exists('postsCount', $this->relations)) 
	    $this->load('postsCount');
	 
	  $related = $this->getRelation('postsCount');

	  return ($related) ? (int) $related->aggregate : 0;
	}

}
