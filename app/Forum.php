<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Forum extends Model implements SluggableInterface {

	use SluggableTrait;

	protected $sluggable = ['build_from'=>'title','save_to'=>'slug'];

	/* id - section_id - slug - title - description - updated_at - created_at */

	
	public function section()
	{
		return $this->belongsTo('App\Section');
	}

	public function topics()
	{
		return $this->hasMany('App\Topic');
	}

	public function posts()
	{
		return $this->hasManyThrough('App\Post', 'App\Topic');
	}
}
