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
		$movie = new Movie;
	});

	$app->post('movies/vote', function (Request $request)  {
		$input = $request->all();
	    $movie = App\Movie::find($input['id']);

	    switch($input['direction']) {
	    	case 'up':
	    		$movie->increment('votes_up');
	    		break;

	    	case 'down':
	    		$movie->increment('votes_down');
	    		break;
	    }

		if ($movie->save()) {
			return response()->json('success', 200);
		} else {
			return response()->json('error', 500);
		}

	});

	$app->get('movies', function ()  {
	    return App\Movie::all();
	});
});