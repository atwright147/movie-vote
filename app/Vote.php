<?php namespace App;

use Illuminate\Database\Eloquent\Model;

final class Vote extends Model {

	protected $guarded = array('id');

	public function movie()
	{
		return $this->belongsTo('App\Movie');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}