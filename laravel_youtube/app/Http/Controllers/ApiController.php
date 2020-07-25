<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function index()
    {
    	/*$client = new Client();
    	$response = $client->request('GET', 'https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyBeToWz-t7fHQbINk0MqpS4amOXGbYQXWU&q=wordpress tutorial');
    	$statusCode = $response->getStatusCode();
        //$body = $response->getBody()->getContents();
        $response->getBody();

        return $response;*/
        

        $client = new Client();
        $res = $client->request('GET', 'https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyBeToWz-t7fHQbINk0MqpS4amOXGbYQXWU&q=wordpress tutorial');
        $res->getStatusCode();
        // "200"
        $res->getHeader('content-type')[0];
        // 'application/json; charset=utf8'
        $res_body =  $res->getBody();

        //return view('Youtube',);
        //return View::make('Youtube')->with('response', $res);

        return view('Youtube')->with('response', $res_body)->header('Content-Type', 'text/plain');

    }
}
