<?php


namespace DiSpace\YandexSTT\Request;

use RestClient;
use Exception;

class SpeechRequest implements SpeechRequestInterface
{

    /**
     * @var string
     */
    protected $host = SpeechRequestInterface::DEFAULT_HOST;

    /**
     * @var string
     */
    protected $base_query  = SpeechRequestInterface::BASE_QUERY;

    /**
     * @var string
     */
    protected $token = '';

    /**
     * @var string
     */
    protected $folder_id = false;

    /**
     * Request constructor.
     * @param string $token
     * @param string|bool $folder_id
     * @param mixed|string $base_query
     */
    public function __construct(string $token, $folder_id  = false, $base_query  = false)
    {
        $this->token = $token;

        if($folder_id !== false){
            $this->folder_id = $folder_id;
        }
        if($base_query !== false){
            $this->base_query = $base_query;
        }
    }

    /**
     * @param string $content
     * @param array $params
     * @return string
     * @throws \RestClientException
     */
    public function recognize(string $content, $params = []) :string
    {
        $query_string = $this->build_query_string($params);

        $yandex_api = new RestClient([
            'base_url' => 'https://' . $this->host . $this->base_query,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getToken(),
                'Transfer-Encoding' => 'chunked'
            ]
        ]);

        $result = $yandex_api->post("stt:recognize?" . $query_string, $content);
        $response = $result->decode_response();

        if(isset($response->error_code)){
            throw new Exception($response->error_code . ':: ' . $response->error_message);
        }

        return $result->decode_response()->result;
    }

    /**
     * @inheritDoc
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @inheritDoc
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getFolderId() : string
    {
        return $this->folder_id;
    }

    /**
     * @param string $folder_id
     */
    public function setFolderId(string $folder_id): void
    {
        $this->folder_id = $folder_id;
    }

    /**
     * @param $params
     * @return string
     */
    protected function build_query_string($params): string
    {
        $query_params = [
            'lang' => $params['lang'] ?? self::DEFAULT_LANG,
            'topic' => $params['topic'] ?? self::DEFAULT_TOPIC,
            'profanityFilter' => $params['profanity_filter'] ?? self::DEFAULT_PROFANITY_FILTER,
            'format' => $params['format'] ?? self::DEFAULT_FORMAT,
            'sampleRateHertz' => $params['sample_rh'] ?? self::DEFAULT_SAMPLE_RH,
            'folderId' => $this->getFolderId(),
        ];

        return http_build_query($query_params);
    }
}