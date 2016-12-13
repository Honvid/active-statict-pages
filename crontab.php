<?php
/**
 * @author Honvid
 * @time: 2016/12/13  下午3:42
 */

ini_set('date.timezone','Asia/Shanghai');
ignore_user_abort(true);
set_time_limit(0);

require 'helper/JsonHelper.php';

$seven = strtotime('2016-12-13 17:30');
$eight = strtotime('2016-12-13 18:00');
$nine = strtotime('2016-12-13 19:00');
$twelve = strtotime('2016-12-13 22:00');
$after = strtotime('2016-12-13 3:00');

// 在早上07：30的时候云计算 大数据 软件定义 融合架构  200起 但是要按顺序来
// 8：00时候 云计算 达到500 左右
// 9：00 云计算达到4000
// 9~12点 达到4500
// 12点到 17点 云计算涨到5000+

$data = JsonHelper::read('Base');
$i = 0;
while ($i < 10) {
    $now = time();
    foreach ($data as $key => &$item) {
        if ($now > $seven && $now <= $eight) {
            $item['number'][0] = countNumber(
                $item['number'][0],
                $item['number'][2],
                $key,
                $now,
                $eight,
                $i
            );
        } elseif ($now > $eight && $now <= $nine) {
            $item['number'][0] = countNumber(
                $item['number'][0],
                $item['number'][3],
                $key,
                $now,
                $nine,
                $i
            );
        } elseif ($now > $nine && $now <= $twelve) {
            $item['number'][0] = countNumber(
                $item['number'][0],
                $item['number'][4],
                $key,
                $now,
                $twelve,
                $i
            );
        } elseif ($now > $twelve && $now <= $after) {
            $item['number'][0] = countNumber(
                $item['number'][0],
                $item['number'][5],
                $key,
                $now,
                $after,
                $i
            );
        }
    }
    echo date('Y-m-d H:i:s') . '------------------'."\n";
    echo json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
    JsonHelper::write($data, 'Base');
    $i++;
    sleep(6);
}
function countNumber($current, $total, $key, $now, $task, $i)
{
    $quan = round(10 / ($key + 1));
    $result = $total - $current;
    if($result > 0) {
        return $current + round($result / ($task - $now) / 60 / (10 - $i));
    }else{
        return $current + $quan;
    }
}