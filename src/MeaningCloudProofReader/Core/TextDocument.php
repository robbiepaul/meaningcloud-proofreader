<?php

namespace RobbieP\MeaningCloudProofReader\Core;

class TextDocument extends DocumentAbstract implements DocumentInterface {

    public function __construct($data)
    {
        $this->text($data);
    }

}