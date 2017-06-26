<?php
$f_str = "data1.txt";
$fp = fopen($f_str, "r");
if($fp)
{
    $s= fgets($fp);//逐行读取。如果fgets不写length参数，默认是读取1k。

    $str1 = split(",", $s);//14:43:13,USD,CNY,美元/人民币,6.838,2017-06-23 14:41:10
    $t_str = array();
    if(count($str1)==3)
    {
        $t_str['num'] = $str1[0];
     	$t_str['time'] = $str1[1];
        $t_str['rate'] = $str1[2];
    }
}
fclose($fp); 
echo json_encode($t_str);
?>