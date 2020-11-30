<?php

namespace Quuu;

use stdClass;
use Exception;

class QuuuClient extends Controller
{

    private $authentication;
    private $base;
    private $hasBootedUp = false;

    private $shouldThrowException;

    public function __construct(stdClass $authentication, stdClass $options){
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