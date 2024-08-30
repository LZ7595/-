<?php
require_once("../../conn/conn.php");//连接数据库
mysqli_set_charset($conn,"utf8");
$username = $_POST['username'];
$sex = $_POST["au"];
$pwd = $_POST['passwd'];
$xli = $_POST['select1'];
$sql = "select user from user where user = '$username'";//SQL语句
  $result = mysqli_query($conn,$sql);//执行SQL语句
  if (!$result) {
 printf("Error: %s\n", mysqli_error($conn));
 exit();
  }
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  if($username!=null&&$pwd!=null){
  $num = mysqli_num_rows($result);//统计执行结果影响的行数
  if ($num) {//如果已经存在该用户
     echo "<script>alert('温馨提示：用户存在！'); history.go(-1);</script>";
  } else {
    $sql="INSERT INTO user(user,gender,pwd,学历) VALUES('$username','$sex','$pwd','$xli')";//向数据库插入表单传来的值的sql
    $result=mysqli_query($conn,$sql);//执行sql
  if (!$result){
    die('Error: ' . mysqli_error($conn));//如果sql执行失败输出错误
  }else{
    echo "注册成功";//成功输出注册成功
    echo "
           <script>
              setTimeout(function(){window.location.href='../html/login.html';},1000);
           </script>";
           //如果注册成功使用js 1秒后跳转到登录页面;
    }
  }}

?>