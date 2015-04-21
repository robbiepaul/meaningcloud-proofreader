<?php namespace RobbieP\MeaningCloudProofReader;

class MeaningCloud
{
    const API_URL = 'http://api.meaningcloud.com/';
    const API_SERVICE = 'stilus';
    const API_VERSION = '1.2';

    protected $config;
    protected $document;

    public function __construct($data)
    {
        $this->config = new Config($data);
    }

    public function check($data)
    {
        $this->document = new DocumentManager($data);
    }

    public static function url($endpoint = '')
    {
        return self::API_URL . self::API_SERVICE . '-' . self::API_VERSION . '/' . $endpoint;
    }


}
