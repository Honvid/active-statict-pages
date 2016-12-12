<?php

/**
* Json文件处理类
*/
class JsonHelper
{

    protected static $baseDir = './data/';

    /**
     * 把数据写入文件
     * @param  array  $data     [description]
     * @param  string $fileName [description]
     * @return [type]           [description]
     */
    public static function write(array $data, string $fileName)
    {
        // 把PHP数组转成JSON字符串
        $json_string = json_encode($data);
        // 写入文件
        file_put_contents(self::$baseDir . $fileName . '.json', $json_string);
    }

    /**
     * 从文件中读取数据
     * @param  string $fileName [description]
     * @return [type]           [description]
     */
    public static function read(string $fileName)
    {
        // 从文件中读取数据到PHP变量
        $json_string = file_get_contents(self::$baseDir . $fileName . '.json');
        // 把JSON字符串转成PHP数组
        return json_decode($json_string, true);
    }

    /**
     * 保存属性
     * @param  int    $key      [description]
     * @param  string $name     [description]
     * @param  string $fileName [description]
     * @return [type]           [description]
     */
    public static function save(int $key, string $name, string $fileName)
    {
        $data = self::read($fileName);
        $data[$key] = $name;
        self::write($data, $fileName);
    }

    /**
     * 保存属性
     * @param  int    $key      [description]
     * @param  string $name     [description]
     * @param  string $fileName [description]
     * @return [type]           [description]
     */
    public static function saveBase(int $key, string $title, int $num, int $current = 0, int $status, string $fileName)
    {
        $data = self::read($fileName);
        $data[$key] = [
            'title' => $title,
            'num' => $num,
            'status' => $status,
            'current' => $current
        ];
        self::write($data, $fileName);
    }

    public static function updateAll($keys, $status)
    {
        $data = self::read('Base');
        $temp = 1;
        if($status == 1) {
            $temp = 0;
        }
        foreach ($data as $k => $item) {
            if(in_array($k, $keys)) {
                $data[$k]['status'] = $status;
                $data[$k]['current'] = $item['num'];
            }else{
                $data[$k]['status'] = $temp;
                $data[$k]['current'] = $item['num'];
            }
        }
        self::write($data, 'Base');
    }
}