<?php

class XmlHelper
{
    public static function response($data)
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

    public static function responseBase($data)
    {
        header("Content-type:text/xml");
        $step = 50;
        $xml = '<?xml version="1.0" encoding="utf-8"?>';
        $xml .=  '<info>';
        foreach ($data as $key => $value) {
            if(!isset($value['current'])) {
                $value['current'] = 0;
            }
            if($value['num'] > $value['current']) {
                if($value['num'] - $value['current'] > $step) {
                    $value['current'] += $step;
                }else{
                    $value['current']++;
                }
            }
            JsonHelper::saveBase($key, $value['title'], $value['num'], $value['current'], $value['status'], 'Base');
            $xml .=  '<item title="'.$value['title'].'" num="'.$value['current'] .'" />';
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