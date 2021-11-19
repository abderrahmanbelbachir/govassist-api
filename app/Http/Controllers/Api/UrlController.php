<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function validateDestination(Request $request) {
        if ($request->destination) {
            $url = $request->destination;
            $c = curl_init();
            curl_setopt($c,CURLOPT_URL,$url);
            curl_setopt($c,CURLOPT_HEADER,1);//get the header
            curl_setopt($c,CURLOPT_NOBODY,1);//and *only* get the header
            curl_setopt($c,CURLOPT_RETURNTRANSFER,1);//get the response as a string from curl_exec(), rather than echoing it
            curl_setopt($c,CURLOPT_FRESH_CONNECT,1);//don't use a cached version of the url
            if(!curl_exec($c)){
                return response()->json(['message' => 'Invalid URL']);
            }else{
                if (strpos($url , 'http://') !== -1) {
                    $url = str_replace('http://' , '' , $url);
                }
                if (strpos($url , 'https://') !== -1) {
                    $url = str_replace('https://' , '' , $url);
                }
                $dbUrl = Url::where('destination' , 'like' , '%'.$url.'%')->first();
                if ($dbUrl) {
                    return $dbUrl;
                } else {
                    return response()->json(['message' => 'URL doesn\'t exist on our database']);

                }

            }
        } else {
            return response()->json(['message' => 'Please provide a URL']);
        }
    }
}
