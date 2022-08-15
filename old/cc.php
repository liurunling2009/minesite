<?php
//代理IP直接退出
emptyempty($_SERVER['HTTP_VIA']) or exit('Access Denied');
//防止快速刷新
session_start();
$seconds = '3'; //时间段[秒]
$refresh = '8'; //刷新次数
//设置监控变量
$cur_time = time();
if(isset($_SESSION['last_time'])){
 $_SESSION['refresh_times'] += 1;
}else{
 $_SESSION['refresh_times'] = 1;
 $_SESSION['last_time'] = $cur_time;
}
//处理监控结果
if($cur_time - $_SESSION['last_time'] < $seconds){
 if($_SESSION['refresh_times'] >= $refresh){
  //跳转防cc页
  header(sprintf('Location:%s', 'cc.html'));
  exit('Access Denied');
 }
}else{
 $_SESSION['refresh_times'] = 0;
 $_SESSION['last_time'] = $cur_time;
}
?>