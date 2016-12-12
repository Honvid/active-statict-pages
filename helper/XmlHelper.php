<?php

class XmlHelper
{
    public static function respone($data)
    {
        header("Content-type:text/xml");
        $xml = '<?xml version="1.0" encoding="utf-8"?>';
        $xml .=  '<info>';
        foreach ($data as $key => $value) {
            $xml .=  '<item textInfo="'.$value.'" />';
        }
        $xml .=  '</info>';
        return $xml;
    }

    public static function responeBase($data)
    {
        header("Content-type:text/xml");
        $xml = '<?xml version="1.0" encoding="utf-8"?>';
        $xml .=  '<info>';
        foreach ($data as $key => $value) {
            $xml .=  '<item title="'.$value['title'].'" num="'.$value['num'].'" />';
        }
        $xml .=  '</info>';
        return $xml;
    }

    public static function readAndWrite($xmlName){
        $name = $xmlName . '.xml';
        if (file_exists($name)) { //读取xml文件 
            $xml = simplexml_load_file($name);
            $temp = [];
            foreach ($xml as $key => $value) {
                $data = get_object_vars($value->attributes());
                $temp[] = $data['@attributes']['textInfo'];
            }
            JsonHelper::write($temp, $xmlName);
        } else {
            exit('Failed to open '.$name.'.'); 
        }
    }

    public static function readAndWriteNumber($xmlName){
        $name = $xmlName . '.xml';
        if (file_exists($name)) { //读取xml文件 
            $xml = simplexml_load_file($name);
            $temp = [];
            foreach ($xml as $key => $value) {
                $data = get_object_vars($value->attributes());
                $temp[] = [
                    'title' => $data['@attributes']['title'],
                    'num' => $data['@attributes']['num']
                ];
            }
            JsonHelper::write($temp, $xmlName);
        } else {
            exit('Failed to open '.$name.'.'); 
        }
    }
}