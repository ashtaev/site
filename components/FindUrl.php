<?php


namespace app\components;


class FindUrl
{
    private $text;

    public function __construct($url)
    {
        $this->text = file_get_contents($url);
        $ServerResponse = (new ServerResponse())->getArray($url);
    }

    public  function Run()
    {
        preg_match_all('/<a.*?href=["\'](.*?)["\'].*?>/i', $this->text, $matches);

        return $matches[1];
    }
}