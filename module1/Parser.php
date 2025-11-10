<?php
class Parser
{
    public function parse($url)
    {
        $content = file_get_contents($url);
        $content = str_replace(array("\n", "\r", "\t"), '', $content);
        $content = trim(str_replace('"', "'", $content));
        $xml = simplexml_load_string($content);
        return json_encode($xml);
    }
}