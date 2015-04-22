<?php

namespace RobbieP\MeaningCloudProofReader;


use RobbieP\MeaningCloudProofReader\Core\FileDocument;
use RobbieP\MeaningCloudProofReader\Core\TextDocument;
use RobbieP\MeaningCloudProofReader\Core\UrlDocument;

class DocumentManager {

    const FILE  = 'file';
    const TEXT  = 'txt';
    const URL   = 'url';

    protected $type;
    protected $document;

    public function __construct($data)
    {
        switch(true) {
            case $this->isFile($data):
                $this->setFile($data);
                break;
            case $this->isURL($data):
                $this->setUrl($data);
                break;
            default:
                $this->setText($data);
                break;
        }
    }

    public function getParams()
    {
        return $this->document->toArray();
    }

    private function setType($type)
    {
        $this->type = $type;
    }

    private function isURL($data)
    {
        return  filter_var($data, FILTER_VALIDATE_URL);
    }

    private function isFile($data)
    {
        return  file_exists($data);
    }

    private function setFile($data)
    {
        $this->setType(self::FILE);
        $this->document = new FileDocument($data);
    }

    private function setUrl($data)
    {
        $this->setType(self::URL);
        $this->document = new UrlDocument($data);
    }

    private function setText($data)
    {
        $this->setType(self::TEXT);
        $this->document = new TextDocument($data);
    }

}