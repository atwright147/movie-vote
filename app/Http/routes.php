<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

/*
| The API
*/
Route::group(['prefix' => 'api/v1'], function ($app) {
	Route::post('movies', function (Request $request)  {
		$input = $request->all();
		// dd($input);
		DB::table('movies')->insert($input);
	});

	Route::post('movies/vote', function (Request $request)  {
		$userId = 1;
		$input = Input::all();

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

	Route::get('movies/{id}', function($id) {
		return App\Movie::with(['votes' => function($query) use ($id) {
			$query->where('user_id', $id);
		}])->get();
	});
});