<?php
require 'helper/JsonHelper.php';
/**
 * @author Honvid
 * @time: 2016/12/12  下午9:16
 */
ini_set('date.timezone','Asia/Shanghai');
ignore_user_abort(true);
set_time_limit(0);
$base = '/data/wwwroot/active.honvid.com/data/Base.json';
$person = '/data/wwwroot/active.honvid.com/data/Persons.json';
$i = 0;
$seven = strtotime('2016-12-12 07:30');
$eight = strtotime('2016-12-12 08:00');
$nine = strtotime('2016-12-12 09:00');
$twelve = strtotime('2016-12-12 12:00');
$after = strtotime('2016-12-12 17:00');

// 在早上07：30的时候云计算 大数据 软件定义 融合架构  200起 但是要按顺序来
// 8：00时候 云计算 达到500 左右
// 9：00 云计算达到4000
// 9~12点 达到4500
// 12点到 17点 云计算涨到5000+
$i = 0;
while ($i < 10) {
    $baseData = read($base);
    $now = time();
    foreach ($baseData as $index => &$data) {
        $quan = round(10 / ($index+1), 2);
        if($now < $eight) {
            $step = 10;
            $total = 500;
        } elseif ($now > $eight && $now < $nine) {
            $step = 60;
            $total = 4000;

        } elseif ($now > $nine && $now < $twelve) {
            $step = 3;
            $total = 4500;

        } elseif ($now > $twelve) {
            $step = 5;
            $total = 6000;

        } else {
            $step = 1;
            $total = 6000;
        }
        if( ($data['num'] - $total) > $step) {
            $data['num'] += ceil($quan);
        }else{
            $data['num'] += ceil(rand($step / ($index + 1), $step / ($index + 2)));
        }
    }
    $i++;
    write($baseData, $base);
    sleep(6);
}

/**
 * 把数据写入文件
 * @param  array  $data     [description]
 * @param  string $fileName [description]
 * @return [type]           [description]
 */
function write(array $data, string $fileName)
{
    // 把PHP数组转成JSON字符串
    $json_string = json_encode($data);
    // 写入文件
    file_put_contents($fileName . '.json', $json_string);
}

/**
 * 从文件中读取数据
 * @param  string $fileName [description]
 * @return [type]           [description]
 */
function read(string $fileName)
{
    // 从文件中读取数据到PHP变量
    $json_string = file_get_contents($fileName . '.json');
    // 把JSON字符串转成PHP数组
    return json_decode($json_string, true);
}