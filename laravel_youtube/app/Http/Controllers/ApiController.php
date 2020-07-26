<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function index()
    {   

        $client = new Client();
        $res = $client->request('GET', 'https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyBeToWz-t7fHQbINk0MqpS4amOXGbYQXWU&q=wordpress tutorial&maxResults=20');
        $res->getStatusCode();
        // "200"
        $res->getHeader('content-type')[0];
        // 'application/json; charset=utf8'
        
        $res_body =  $res->getBody();

        //return view('Youtube')->with('response', $res_body_plain);
        return view('Youtube')->with('response', $res_body);
        //return view('Youtube', $res_body_plain);
    }
}
