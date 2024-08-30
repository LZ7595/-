<?php
require_once '../../conn/conn.php'; //引入数据库链接
session_start();

switch ($_GET['a']) {
	case 'login':
		//接收传值
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "select * from admin where user='$username'";//验证数据库里的账号 密码
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

		if($result && mysqli_num_rows($result)>0){//帐号存在

			$row = mysqli_fetch_assoc($result);
			if($password != $row['pwd']){//判断密码
				echo "<script>alert('密码错误，请重新输入！');window.history.back(-1)</script>";
				exit;			
			}
			
			$_SESSION['admin'] = $username;
			echo "<script>alert('登录成功！');location.href='../index.php'</script>";
		}else{//帐号不存在
			echo "<script>alert('帐号不存在，请重新输入！');window.history.back(-1)</script>";
			exit;
		}
		break;

	case 'exit': 
		unset($_SESSION['admin']);//清空session里面的值
		echo "<script>alert('注销成功！');location.href='login.php'</script>";
		break;
	default: 
		echo "<script>alert('参数错误，请刷新页面重试！');location.href='../index.php'</script>";
		exit;
		break;
}

//关闭数据库 释放结果集
mysqli_free_result($result);
mysqli_close($conn);