<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return view('index');
});

/*
| The API
*/
$app->group(['prefix' => 'api/v1'], function ($app) {
	$app->post('movies', function (Request $request)  {
		$input = $request->all();
		// dd($input);
		DB::table('movies')->insert($input);
	});

	$app->post('movies/vote', function (Request $request)  {
		$userId = 1;
		$input = $request->all();

		$vote = App\Vote::where('movie_id', '=', $input['id'])->where('user_id', '=', $userId)->first();

		// invert the existing vote
		if (count($vote)) {
			if ($vote->vote_up) {
				$vote->vote_up = 0;
			} else {
				$vote->vote_up = 1;
			}
		} else {
			// dd('new');
			$vote = new App\Vote;
			$vote->user_id = $userId;
			$vote->movie_id = $input['id'];
			$vote->vote_up = 1;
		}

		if ($vote->save()) {
			return response()->json('success', 200);
		} else {
			return response()->json('error', 500);
		}

	});

	$app->get('movies/{id}', function($id) {
		return App\Movie::with(['votes' => function($query) use ($id) {
			$query->where('user_id', $id);
		}])->get();
	});
});