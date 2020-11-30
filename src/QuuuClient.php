<?php

namespace Quuu;

use stdClass;
use Exception;

class QuuuClient
{

    private $authentication;
    private $base;
    private $hasBootedUp = false;

    private $shouldThrowException;

    public function __construct($authentication, $options = null){
        
        if($options==null){
            $options = new stdClass;
        }


        if(!isset($options->version)){
            $options->version = 'v2'; // default
        }

        if(!isset($options->shouldThrowException)){
            $this->shouldThrowException = true;
        }

        if(!isset($authentication->key)){
            $authentication->key = null;
        }
        
        
        $this->base = 'https://api.quuu.co/'.$options->version;
        $this->authentication = $authentication;
        $this->hasBootedUp = true;
    }

    
    public function categories($url){
        
        return $this->callGet($this->base.'/content/categories/get');

    }

    public function content(){

    }

    private function callGet($u){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $u,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".$this->authentication->key
        ),
        ));

        $http = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        if($http!=200){
            if(isset($response->reason)){
                if($this->shouldThrowException){
                    throw new Exception($response->reason);
                }else{
                    return $response;
                }
            }else{
                if($this->shouldThrowException){
                    throw new Exception('An invalid response was returned from the Quuu API');
                }else{
                    return $response;
                }
            }
        }



        return $response;
    }
}