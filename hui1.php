<?php
$f_str = "data/hui".date('Ymd',time()).".txt";
$fp = fopen($f_str, "r");
$str = array();
$n=0;
if($fp)
{
  while(!feof($fp)){
     $s= fgets($fp);//逐行读取。如果fgets不写length参数，默认是读取1k。
     $str1 = split(",", $s);//14:43:13,USD,CNY,美元/人民币,6.838,2017-06-23 14:41:10
     $t_str = array();
     if(count($str1)==6)
     {
     	$t_str['time'] = $str1[0];
        $t_str['rate'] = $str1[4];
        $t_str['date'] = $str1[5];
        $str[$n] = $t_str;
        //print_r($t_str);
        $n++;
     }
  }
}
fclose($fp); 
echo json_encode($str);
?>