<?php namespace App;

use Illuminate\Database\Eloquent\Model;

final class Movie extends Model {

	protected $guarded = array('id');

	protected $casts = [
		'id' => 'integer',
		'year' => 'integer',
	];

	public function votes()
	{
		return $this->hasMany('App\Vote');
	}

}