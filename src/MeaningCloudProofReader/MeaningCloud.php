<?php namespace RobbieP\MeaningCloudProofReader;

class MeaningCloud
{
    const API_URL = 'http://api.meaningcloud.com/';
    const API_SERVICE = 'stilus';
    const API_VERSION = '1.2';

    protected $config;
    protected $documentManager;

    public function __construct($data)
    {
        $this->config = new Config($data);
    }

    public function check($data)
    {
        $this->documentManager = new DocumentManager($data);
        $this->getApiKey();
    }

    public static function url($endpoint = '')
    {
        return self::API_URL . self::API_SERVICE . '-' . self::API_VERSION . '/' . $endpoint;
    }


    protected function getApiKey()
    {
        if( ! $this->hasApiKey() ) {
            throw new \Exception("No API key provided");
        }
        return $this->config->get('api_key');
    }

    protected function hasApiKey()
    {
        return ! empty( $this->config->get('api_key') );
    }



}
