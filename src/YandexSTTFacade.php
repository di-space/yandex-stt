<?php

namespace DiSpace\YandexSTT;

use Illuminate\Support\Facades\Facade;

class YandexSTTFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return YandexSTT::class;
    }
}