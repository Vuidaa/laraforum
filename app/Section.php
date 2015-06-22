<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;


class Section extends Model implements SluggableInterface {

	use SluggableTrait;

	protected $sluggable = ['build_from'=>'title','save_to'=>'slug'];

	/* id - slug - title - updated_at - created_at */

	public function forums()
	{
		return $this->hasMany('App\Forum');
	}
}
