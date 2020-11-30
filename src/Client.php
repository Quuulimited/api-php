<?php

namespace Quuu\Api;
use stdClass;
use Exception;

class Client extends Controller
{

    private $authentication;
    private $base;

    public function __construct(stdClass $authentication, string $version = 'v2'){
        $this->base = 'https://api.quuu.co/';

    }


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
            throw new Exception('Api dropped call; '.$err);
        }
    }
}