<?php
/**
 * @author Honvid
 * @time: 2016/12/13  下午3:42
 */

ini_set('date.timezone','Asia/Shanghai');
ignore_user_abort(true);
set_time_limit(0);

require 'helper/JsonHelper.php';

$seven = strtotime('2016-12-13 22:10');
$eight = strtotime('2016-12-13 22:15');
$nine = strtotime('2016-12-14 09:00');
$twelve = strtotime('2016-12-14 12:00');
$after = strtotime('2016-12-14 17:00');

// 在早上07：30的时候云计算 大数据 软件定义 融合架构  200起 但是要按顺序来
// 8：00时候 云计算 达到500 左右
// 9：00 云计算达到4000
// 9~12点 达到4500
// 12点到 17点 云计算涨到5000+

$data = JsonHelper::read('Base');
$i = 0;
while ($i < 6) {
    $now = time();
    foreach ($data as $key => &$item) {
        if($now <= $seven) {
            continue;
        }elseif ($now > $seven && $now <= $eight) {
            if($item['number'][2] - $item['number'][0]) {
                $item['number'][0] += round(($item['number'][2] - $item['number'][1]) / 30);
            }else{
                $item['number'][0] += intval(floor(10 / ($key+ 1) / 10));
            }
        } elseif ($now > $eight && $now <= $nine) {
            if($item['number'][3] - $item['number'][0]) {
                $item['number'][0] += round(($item['number'][3] - $item['number'][2]) / 360);
            }else{
                $item['number'][0] += intval(floor(10 / ($key+ 1) / 10));
            }
        } elseif ($now > $nine && $now <= $twelve) {
            if($item['number'][4] - $item['number'][0]) {
                $item['number'][0] += round(($item['number'][4] - $item['number'][3]) / 1080);
            }else{
                $item['number'][0] += intval(floor(10 / ($key+ 1) / 10));
            }
        } elseif ($now > $twelve && $now <= $after) {
            if($item['number'][5] - $item['number'][0]) {
                $item['number'][0] += round(($item['number'][5] - $item['number'][4]) / 1800);
            }else{
                $item['number'][0] += intval(floor(10 / ($key+ 1) / 10));
            }
        }else{
            $item['number'][0] += intval(floor(10 / ($key+ 1) / 10));
        }
    }
    echo date('Y-m-d H:i:s') . '------------------'."\n";
    echo json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
    JsonHelper::write($data, 'Base');
    $i++;
    sleep(10);
}