<?php

namespace RobbieP\MeaningCloudProofReader\Core;

abstract class DocumentAbstract {

    protected $txtf = 'plain';
    protected $txt = '';
    protected $file = '';
    protected $url = '';

    public function textFormat($format)
    {
        $this->txtf = $format;
    }

    public function text($text)
    {
        if( $this->containsMarkup($text) ) {
            $this->textFormat('markup');
        }
        $this->txt = $text;
    }

    public function file($file)
    {
        $this->file = $file;
    }

    public function url($url)
    {
        $this->url = $url;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    protected function containsMarkup($string)
    {
        return strlen($string) != strlen(strip_tags($string));
    }

}