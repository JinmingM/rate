<?php

ignore_user_abort();//关掉浏览器，PHP脚本也可以继续执行.
set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
$interval=60;// 每隔1min运行

do{
	
    $run = include 'rdata.php';
    
    if(!$run) die('process abort');
    sleep($interval);
}
while(true);

?>