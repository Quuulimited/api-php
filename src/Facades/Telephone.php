<?php

declare(strict_types=1);
namespace Quuulimited\Api\Facades;
use Illuminate\Support\Facades\Facade;

class Api extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Api';
    }
}
