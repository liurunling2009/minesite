<?php
//����IPֱ���˳�
emptyempty($_SERVER['HTTP_VIA']) or exit('Access Denied');
//��ֹ����ˢ��
session_start();
$seconds = '3'; //ʱ���[��]
$refresh = '8'; //ˢ�´���
//���ü�ر���
$cur_time = time();
if(isset($_SESSION['last_time'])){
 $_SESSION['refresh_times'] += 1;
}else{
 $_SESSION['refresh_times'] = 1;
 $_SESSION['last_time'] = $cur_time;
}
//�����ؽ��
if($cur_time - $_SESSION['last_time'] < $seconds){
 if($_SESSION['refresh_times'] >= $refresh){
  //��ת��ccҳ
  header(sprintf('Location:%s', 'cc.html'));
  exit('Access Denied');
 }
}else{
 $_SESSION['refresh_times'] = 0;
 $_SESSION['last_time'] = $cur_time;
}
?>