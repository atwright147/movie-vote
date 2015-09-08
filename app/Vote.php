<?php namespace App;

use Illuminate\Database\Eloquent\Model;

final class Vote extends Model {

	protected $guarded = array('id');

	protected $casts = [
		'id' => 'integer',
		'user_id' => 'integer',
		'movie_id' => 'integer',
		'vote_up' => 'integer',
		'vote_down' => 'integer',
	];

	public function movie()
	{
		return $this->belongsTo('App\Movie');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}