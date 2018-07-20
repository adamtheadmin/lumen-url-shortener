<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Redirects;
use DB;

class RedirectController extends BaseController
{
	static function redirect($url){
		return (new Response("Please Wait", 302))
      	      ->header('Location', $url);
	}

    public function go($hash){
	    if(empty($hash))
	        return self::redirect("/");
	    $results = DB::table('redirects')
	                ->where('hash', 'like', $hash . '%')
	                ->limit(1)
	                ->get();
	    if(!count($results))
	        return self::redirect("/");
	    return self::redirect($results[0]->link);
	}

	public function shorten(Request $request){
	    try{
	        $data = $request->json()->all();
	        $url = $data['url'];
	        do {
	            $hash = md5(time() . $url . rand(1, 1000));
	        } while(Redirects::where([
	            'hash' => $hash
	        ])->get()->count());
	        $record = new Redirects;
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
	    
	}
}
