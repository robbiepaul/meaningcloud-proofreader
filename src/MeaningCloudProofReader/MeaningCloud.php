<?php namespace RobbieP\MeaningCloudProofReader;

class MeaningCloud
{
    const API_URL = 'http://api.meaningcloud.com/';
    const API_SERVICE = 'stilus';
    const API_VERSION = '1.2';

    protected $config;
    protected $documentManager;
    protected $client;
    protected $params = [];

    public function __construct($data)
    {
        $this->config = new Config($data);
    }

    public function check($data, $params = [])
    {

        $this->documentManager = new DocumentManager($data);
        $this->setParams($params);
        $resp = $this->getClient()->post($this->params);
        return $resp;
    }

    public static function url($endpoint = '')
    {
        return self::API_URL . self::API_SERVICE . '-' . self::API_VERSION . '/' . $endpoint;
    }

    protected function getClient()
    {
        if( is_null($this->client) ) {
            $this->client = new Client();
        }
        return $this->client;
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

    private function setParams($params)
    {
        $this->documentManager->getParams();
        $this->params['key'] = $this->getApiKey();
        $this->params['lang'] = 'en';
        $this->params = array_merge($this->params, $params);
    }


}
