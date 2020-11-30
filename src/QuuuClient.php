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
        
        
        $this->base = 'https://api.quuu.co/'.$options->version;
        $this->authentication = $authentication;
        $this->hasBootedUp = true;
    }

    
    public function categories($url){

    }

    public function content(){

    }
}