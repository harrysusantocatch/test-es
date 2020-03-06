<?php
namespace App\Http\ApiHelper;

use GuzzleHttp\Client;

class ProductApi {

    // latest, best_selling, low_price, high_price
    
    public static function getProductList(){
        $result = TokenApi::getToken();
        $status = $result->status;
        if($status == '200'){
            $token = $result->token;
            $url = "https://staging-api-pro.outletz.id/api/product_list/?size=10&page=1&merchant_id=6569&id=&ds_id=&cat_id=&code=&name=&description=&sort_by=";
            $client = new Client(['headers' => ['Authorization' => $token]]);
            $request = $client->get($url);
            $response = json_decode($request->getBody());
        }else{
            $response = $result;
        }
        return $response;
    }
}