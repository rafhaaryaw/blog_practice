<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    private $uri = 'https://api.agify.io?name=meelad';

    public function getCovid19Case()
    {


        $client = new  Client();

        $options = [
            'verify' => false,
            'accept' => 'application/json',
        ];
        $response = $client->get($this->uri, $options)->getBody()->getContents();
        $response_json = json_decode($response);

        return response()->json($response_json, 200);
    }
}
