<?php

namespace Quuulimited\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class Api extends Controller
{

    protected static $url = null;
    
    public static function call($url){
        Api::$url = $url; // Add url to top
        $o = new self;
        return $o;
    }

    public function post(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => Api::$url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $this->build_post_fields(Api::$body),
          CURLOPT_HTTPHEADER => Api::$headers,
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if (!$err) {
            $response = json_decode($response);
            $response = json_decode(json_encode($response)); // force convert to php object
            return $response;
        } else {
            throw new \Exception('Api dropped call; '.$err);
        }
    }
}