<?php
/**
 * @author Honvid
 * @time: 2016/12/13  下午3:42
 */

ini_set('date.timezone','Asia/Shanghai');
ignore_user_abort(true);
set_time_limit(0);

require 'helper/JsonHelper.php';

$seven = strtotime('2016-12-13 17:50');
$eight = strtotime('2016-12-13 18:20');
$nine = strtotime('2016-12-13 19:20');
$twelve = strtotime('2016-12-13 22:20');
$after = strtotime('2016-12-14 3:20');

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
        if($now <= $seven) {
            continue;
        }elseif ($now > $seven && $now <= $eight) {
            $item['number'][0] = countNumber(
                $item['number'][0],
                $item['number'][2],
                $key,
                $now,
                $eight
            );
        } elseif ($now > $eight && $now <= $nine) {
            $item['number'][0] = countNumber(
                $item['number'][0],
                $item['number'][3],
                $key,
                $now,
                $nine
            );
        } elseif ($now > $nine && $now <= $twelve) {
            $item['number'][0] = countNumber(
                $item['number'][0],
                $item['number'][4],
                $key,
                $now,
                $twelve
            );
        } elseif ($now > $twelve && $now <= $after) {
            $item['number'][0] = countNumber(
                $item['number'][0],
                $item['number'][5],
                $key,
                $now,
                $after
            );
        }else{
            $item['number'][0] = countNumber(
                $item['number'][0],
                $item['number'][5],
                $key,
                $now,
                $after
            );
        }
    }
    echo date('Y-m-d H:i:s') . '------------------'."\n";
    echo json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
    JsonHelper::write($data, 'Base');
    $i++;
    sleep(6);
}
function countNumber($current, $total, $key, $now, $task)
{
    $quan = round(10 / ($key + 1));
    $result = $total - $current;
    if($result > 0) {
        return $current + intval(floor($result / ( ($task - $now) / 600) ));
    }else{
        return $current + $quan;
    }
}