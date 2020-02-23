<?php

namespace DiSpace\YandexSTT;

use DiSpace\YandexSTT\Request\SpeechRequest;
use \RestClientException;

/**
 * Class YandexSTT
 * @package DiSpace\YandexSTT
 */
class YandexSTT
{

    /**
     * @param string $file_path
     * @param string|bool $folder_id
     * @param $token
     * @param array $params
     * @return string
     * @throws RestClientException
     */
    public static function getTextByAudioFilePath(string $file_path, $token, array $params = [], $folder_id = false) : string
    {
        $file_data = file_get_contents($file_path);
        return  self::getTextByAudioDirect($file_data, $token, $params, $folder_id);
    }

    /**
     * @param string $audio_data
     * @param string|bool $folder_id
     * @param string $token
     * @param array $params
     * @return string
     * @throws RestClientException
     */
    public static function getTextByAudioDirect(string $audio_data, string $token, array $params = [], $folder_id = false) : string
    {
        $yandex_api = new SpeechRequest($token,$folder_id);
        return $yandex_api->recognize($audio_data, $params);
    }

}