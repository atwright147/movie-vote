<?php namespace App;

use Illuminate\Database\Eloquent\Model;

final class Movie extends Model {

	protected $guarded = array('id');

	public function votes()
	{
		return $this->hasMany('App\Vote');
	}

}