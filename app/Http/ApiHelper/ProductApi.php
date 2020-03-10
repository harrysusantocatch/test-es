<?php
namespace App\Http\ApiHelper;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProductApi {

    const BASE_URL = "https://staging-api-pro.outletz.id/api/";
    
    // sort_by param : latest, best_selling, low_price, high_price
    public static function getProductList(
        Request $request,
        $sort_by = 'latest',
        $size = 4,
        $page = 1,
        $merchan_id =6569,
        $ds_id = null,
        $id = null,
        $cat_id = null,
        $code = null,
        $name = null,
        $description = null
    ){
        $result = SessionHelper::getGeneralToken($request);
        $status = $result->status;
        if($status == '200'){
            $token = $result->token;
            $param_url = "?size=".$size."&page=".$page."&merchant_id=".$merchan_id.
                         "&id=".$id."&ds_id=".$ds_id."&cat_id=".$cat_id."&code=".$code.
                         "&name=".$name."&description=".$description."&sort_by=".$sort_by;
            $url = self::BASE_URL."product_list/" . $param_url;
            $client = new Client(['headers' => ['Authorization' => $token]]);
            $request = $client->get($url);
            $response = json_decode($request->getBody());
        }else{
            $response = $result;
        }
        return $response;
    }

    public static function getCategoryList(Request $request, $parent_id = null){
        $result = SessionHelper::getGeneralToken($request);
        $status = $result->status;
        if($status == '200'){
            $token = $result->token;
            $param_url = "?parent_id=".$parent_id;
            $url = self::BASE_URL."category_list/".$param_url;
            $client = new Client(['headers' => ['Authorization' => $token]]);
            $request = $client->get($url);
            $response = json_decode($request->getBody());
        }else{
            $response = $result;
        }
        return $response;
    }
}