<?php
namespace App\Http\ApiHelper;

use GuzzleHttp\Client;

class TokenApi {

    public static function getTokenX(){
        $body['username'] = "admin";
        $body['password'] = "sBp49fYSLleV";
        $url = "https://staging-api-pro.outletz.id/api/token";
        $params['headers'] = ['Content-Type' => 'application/x-www-form-urlencoded'];
        $params['form_params'] = $body;
        $client = new Client();
        $response = $client->post($url, $params);
        $response = $response->getBody();
        return json_decode($response);
    }

    public static function getToken(){
        $url = "https://staging-api-pro.outletz.id/api/token";
        $fields = [
            'username' => 'admin',
            'password' => 'sBp49fYSLleV'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
            ));
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

        $result = curl_exec($ch);
        return json_decode($result);
    }
}