<?php

namespace DiSpace\YandexSTT;

use Illuminate\Support\ServiceProvider;

class YandexSTTServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'../../config/yandex-stt.php', 'yandex-stt');
        $this->publishes([
            __DIR__.'../../config/yandex-stt.php' => config_path('yandex-stt.php'),
        ]);
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('YandexSTT', YandexSTTFacade::class);
    }
}
