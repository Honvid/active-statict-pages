<?php
/**
 * @author Honvid
 * @time: 2016/12/12  下午9:16
 */
ini_set('date.timezone','Asia/Shanghai');
ignore_user_abort(true);
set_time_limit(0);
$base = '/data/wwwroot/active.honvid.com/data/Base';
$person = '/data/wwwroot/active.honvid.com/data/Persons';
$i = 0;
$seven = strtotime('2016-12-13 11:30');
$eight = strtotime('2016-12-13 12:00');
$nine = strtotime('2016-12-13 13:00');
$twelve = strtotime('2016-12-13 16:00');
$after = strtotime('2016-12-13 21:00');
$rand = [
    0 => [
        0 => [10, 13],
        1 => [9, 12],
        2 => [8, 11],
        3 => [7, 10],
        4 => [6, 9],
        5 => [5, 8],
        6 => [4, 7],
        7 => [3, 6],
        8 => [2, 5],
        9 => [1, 4],
    ],
    1 => [
        0 => [58, 60],
        1 => [53, 57],
        2 => [47, 52],
        3 => [44, 48],
        4 => [39, 45],
        5 => [35, 39],
        6 => [32, 36],
        7 => [30, 33],
        8 => [28, 30],
        9 => [25, 29],
    ],
];

$status = [
    true,
    false,
];

// 在早上07：30的时候云计算 大数据 软件定义 融合架构  200起 但是要按顺序来
// 8：00时候 云计算 达到500 左右
// 9：00 云计算达到4000
// 9~12点 达到4500
// 12点到 17点 云计算涨到5000+
$i = 0;
while ($i < 3) {
    $baseData = read($base);
    $now = time();
    foreach ($baseData as $index => &$data) {
        $quan = round(10 / ($index+1) / 10, 3);
        if($now < $eight) {
            $step = mt_rand($rand[0][$index][0], $rand[0][$index][1]);
            $total = 500;
        } elseif ($now > $eight && $now < $nine) {
            $step = mt_rand($rand[1][$index][0], $rand[1][$index][1]);
            $total = 4000;

        } elseif ($now > $nine && $now < $twelve) {
            $step = mt_rand(ceil($quan * 2.78), 3);
            $total = 4500;

        } elseif ($now > $twelve) {
            $step = mt_rand(ceil($quan * 1.67 * 1.67), 3);
            $total = 6000;

        } else {
            $step = 1;
            $total = 6000;
        }
        if( ($data['num'] - $total) > $step) {
            if($i >= 3 && $i < 7 && mt_rand(0, 1)) {
                $data['num'] += mt_rand(ceil($quan), 3);
            }
        }else{
            $data['num'] += $step;
        }
    }
    $i++;
    echo date('Y-m-d H:i:s') . '------------------'."\n";
    echo json_encode($baseData, JSON_UNESCAPED_UNICODE) . "\n";
    write($baseData, $base);
    sleep(18);
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