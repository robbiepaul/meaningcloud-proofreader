<?php

namespace RobbieP\MeaningCloudProofReader\Core;

class UrlDocument extends DocumentAbstract implements DocumentInterface {

    public function __construct($data)
    {
        $this->url($data);
    }

}