<?php

namespace RobbieP\MeaningCloudProofReader\Core;

class FileDocument extends DocumentAbstract implements DocumentInterface {

    public function __construct($data)
    {
        $this->file($data);
    }

}