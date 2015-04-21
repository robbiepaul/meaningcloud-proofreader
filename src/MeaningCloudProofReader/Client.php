<?php
/**
 * Created by PhpStorm.
 * User: robbiepaul
 * Date: 20/04/15
 * Time: 16:51
 */

namespace RobbieP\MeaningCloudProofReader;

class Client {

    protected $adapter;
    protected $request;
    protected $response;

    public function __construct()
    {
        $this->adapter = new \GuzzleHttp\Client();
    }

    public function get()
    {

    }

    public function post()
    {

    }

}