<?php


namespace RobbieP\MeaningCloudProofReader;


class Config {

    protected $api_key;

    public function __construct($config)
    {
        if( is_string($config) ) {
            $this->api_key = $config;
            return;
        }

        $this->fill($config);
    }

    public function get($key)
    {
        return $this->{$key};
    }

    private function fill($config)
    {
        $data = (array) $config;
        foreach($data as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function set($key, $value)
    {
        if(! property_exists($this, $key)) {
            throw new \Exception ('Invalid arguments');
        }
        $this->{$key} = $value;
    }

}