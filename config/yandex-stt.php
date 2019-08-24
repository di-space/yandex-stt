<?php

return [
    'key' => env('YANDEX_CLOUD_STT_KEY', ''),
    'topic'=> env('YANDEX_CLOUD_STT_KEY', 'queries'),
    'lang' => env('YANDEX_CLOUD_STT_KEY', 'ru-RU'),
    'tmp-dir' => storage_path('app/tmp')
];