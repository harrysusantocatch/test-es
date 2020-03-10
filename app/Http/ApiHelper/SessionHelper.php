<?php
namespace App\Http\ApiHelper;

use Illuminate\Http\Request;

class SessionHelper {

    public static function saveToken(Request $request, $token){
        $request->session()->put('token', $token);
    }

    public static function hasToken(Request $request){
        if($request->session()->has('token')){
			return true;
		}else{
			return false;
		}
    }

    public static function clearToken(Request $request){
        $request->session()->forget('token');
    }

    // return token or unAuth message error
    public static function getGeneralToken(Request $request){
        if(self::hasToken($request)){
            $token = $request->session()->get('token');
            return $token;
        }else{
            $result = TokenApi::getToken();
            $status = $result->status;
            if($status == '200'){
                self::saveToken($request, $result);
                return $result;
            }else{
                return $result;
            }
        }
    }
}