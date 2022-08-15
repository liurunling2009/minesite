<?php 
	header("Content-Type: text/html;charset=utf-8");
	// 开启Session
	session_start();
 
	// 处理用户登录信息
	if (isset($_POST['cdm'])) {
		# 接收用户的登录信息
		$cdm = trim($_POST['cdm']);
		// 判断提交的登录信息
		if (($cdm == '')) {
			// 若为空,视为未填写,提示错误,并3秒后返回登录界面;
			header('refresh:3 url=index.html');
			echo "彩蛋码不能为空,系统将在3秒后跳转到填写界面,请重新填写彩蛋码!";
			exit;
		} elseif (($cdm == 'cdm1')) {
			# 用户名和密码都正确,将用户信息存到Session中
			#$_SESSION['username'] = $cdm;
			#$_SESSION['islogin'] = 1;
			// 处理完附加项后跳转到登录成功的首页;
			header('location:firework/index.html');
		} elseif (($cdm != 'cdm1')) {
			# 用户名或密码错误,同空的处理方式
			header('refresh:3 url=index.html');
			echo "彩蛋码错误,系统将在3秒后跳转到填写界面,请重新填写彩蛋码!";
			exit;
		} 
	}
 ?>