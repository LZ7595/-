<?php
session_start();
require_once("../../conn/conn.php");
// 获取用户信息
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

if ($user) {
 // 输出用户信息
 echo "document.querySelector('.user').innerHTML = '" . $user['username'] . "'";
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
  $username = $user['username'];
  $opwd=$_POST['opasswd'];
  $npwd=$_POST['npasswd'];
if($opwd != 0 && $npwd != 0){
    $sql="select * from user where user='$username'";
    $qry=mysqli_query($conn,$sql);
    if(!$qry){
        printf(mysqli_error($conn));
        exit();
    }
    $row=mysqli_fetch_array($qry,MYSQLI_ASSOC);
    if($row['pwd'] == $opwd){
        $sql="update user set pwd='$npwd' where user='$username'";
        $qry=mysqli_query($conn,$sql);
        if(!$qry){
            printf(mysqli_error($conn));
            exit();
        }
        echo "修改成功";
        session_destroy();
        header('refresh:1; url= ../html/login.html');
    }
}else{
    header('refresh:1; url= ../html/pwdg.html');
}
}
?>