<?php

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

use App\Redirect;
use Illuminate\Http\Response;

$redirect = function($url){
    return (new Response("Please Wait", 302))
                  ->header('Location', $url);
};

$app->get('/', function () use ($app) {
    return $app->make('view')->make('index');
});

$app->get('/go/{hash}', function($hash, Request $request) use($redirect){
    if(empty($hash))
        return $redirect("/");
    $results = DB::table('redirect')
                ->where('hash', 'like', $hash . '%')
                ->limit(1)
                ->get();
    if(!count($results))
        return $redirect("/");
    return $redirect($results[0]->link);
});

$app->post('/shorten', function(Request $request){
    try{
        $data = $request::json()->all();
        $url = $data['url'];
        do {
            $hash = md5(time() . $url . rand(1, 1000));
        } while(Redirect::where([
            'hash' => $hash
        ])->get()->count());
        $record = new Redirect;
        $record->hash = $hash;
        $record->link = $url;
        $record->save();
        return [
            'status' => true,
            'result' => $hash
        ];
    } catch(Exception $e){
        return [
            'status' => false,
            'error' => $e->getMessage()
        ];
    }
    
});