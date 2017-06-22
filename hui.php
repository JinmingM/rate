<?php
header('Content-type:text/html;charset=utf-8');

$appkey =array('26358','26364','26363') ;
$sign = array('fa9cfa89713d1d613e201c0d02849bd4','c86a73d8a68ef289f8c751583ab2ff92','0cd65d05ae108617d2967e70fc191443');
$t = date('i',time());
$n = floor($t/20);

$u_str = "http://api.k780.com/?app=finance.rate&scur=USD&tcur=CNY&appkey=".$appkey[$n]."&sign=".$sign[$n];
//echo $u_str;
$url = $u_str;

$params = array(
      "stock" => "",//股票名称
);
$paramstring = http_build_query($params);

$ch = curl_init();
curl_setopt( $ch , CURLOPT_URL , $url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER,0);
$response = curl_exec( $ch );

$arr=split(',',$response);
$arr1 = array();

for($i=2;$i<sizeof($arr);$i++){
  $arr1[$i-2] = $arr[$i]; 
}

$r_arr = array();

for($i=0;$i<sizeof($arr1);$i++){
  if($i==sizeof($arr1)-1)
  {
    $t_arr=split(':',$arr1[$i]);
    $str=str_replace('"','',$t_arr[0]);
   
    $sec = split('"',$t_arr[3]);
    $str1=str_replace('"','',$t_arr[1].':'.$t_arr[2].':'.$sec[0]);
    $r_arr[$str] = $str1;
  }else{
    $t_arr=split(':',$arr1[$i]);
    $str=str_replace('"','',$t_arr[0]);
    $str1=str_replace('"','',$t_arr[1]);
    $r_arr[$str] = $str1;
  }
  
}


echo json_encode($r_arr);

?>  