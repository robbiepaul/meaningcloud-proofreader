<?php

namespace RobbieP\MeaningCloudProofReader;


class DocumentManager {

    const FILE  = 'file';
    const TEXT  = 'txt';
    const URL   = 'url';

    protected $type;

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
    }

    private function setUrl($data)
    {
        $this->setType(self::URL);
    }

    private function setText($data)
    {
        $this->setType(self::TEXT);
    }

}