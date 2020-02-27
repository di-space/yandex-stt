<?php


namespace DiSpace\YandexSTT\Request;


/**
 * Interface RequestInterface
 * @package DiSpace\YandexSTT\Request
 */
interface SpeechRequestInterface extends SpeechParamsInterface
{

    public const DEFAULT_HOST = 'stt.api.cloud.yandex.net';

    public const BASE_QUERY = '/speech/v1';

    public const DEFAULT_LANG = SpeechParamsInterface::LANG_RU;

    public const DEFAULT_TOPIC = SpeechParamsInterface::TOPIC_GENERAL;

    public const DEFAULT_PROFANITY_FILTER = false;

    public const DEFAULT_FORMAT = SpeechParamsInterface::FORMAT_OGG;

    public const DEFAULT_SAMPLE_RH = SpeechParamsInterface::SAMPLE_RH_48K;

    /**
     * SpeechRequestInterface constructor.
     * @param string $token
     * @param string  $folder_id
     * @param bool $base_query
     */
    public function __construct(string $token, string $folder_id  = '', $base_query  = false);

    /**
     * @param string $content
     * @param array $params
     * @return mixed
     */
    public function recognize(string $content, array $params);

    /**
     * @param string $host
     * @return void
     */
    public function setHost(string $host) : void;

    /**
     * @param string $token
     * @return void
     */
    public function setToken(string $token) : void;

    /**
     * @return string
     */
    public function getToken() : string;
}