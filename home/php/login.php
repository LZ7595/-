<?php
session_start();
require_once("../../conn/conn.php");
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    $sql="select * from user where user='$username'";
    $qry=mysqli_query($conn,$sql);
    if(!$qry){
        printf(mysqli_error($conn));
        exit();
    }
    $row=mysqli_fetch_array($qry,MYSQLI_ASSOC);
    if($username==$row['user'] && $passwd==$row['pwd']&&$username!=null&&$passwd!=null)
    {	
        echo "<h1>欢迎尊贵的".$username.",您已经登录成功</h1>";
        echo "
           <script>
              setTimeout(function(){window.location.href='../html/index.html';},1000);
           </script>";
           $_SESSION['user'] = array('username' => $username);

           //如果注册成功使用js 1秒后跳转到登录页面;
    }
else{
		echo "无效的账号或密码!";
        header('refresh:1; url= ../html/login.html');
	}
?>
