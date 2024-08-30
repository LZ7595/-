<?php
session_start();

// 获取用户信息
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

// 判断用户信息是否已存储在 session 中
if ($user) {
 // 输出用户信息
 echo "document.querySelector('.useee').innerHTML = '<p>欢迎，" . $user['username'] . "！</p>';";
 require_once("../../conn/conn.php");
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM user WHERE user = '$user[username]'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "document.querySelector('.user').innerHTML = '".$row['user']."'
              document.querySelector('.xll').innerHTML = '".$row['学历']."'
              document.querySelector('.sex').innerHTML = '".$row['gender']."'
              document.querySelector('.gonggao').innerHTML = '目前版本暂不支持更改个人信息'
              document.querySelector('.nologin').style.display = 'block'
              document.querySelector('.zxx').style.display = 'block'
              document.querySelector('.pwdg').style.display = 'block'";
    }
 }
}else{
    echo"document.querySelector('.xx-wb').innerHTML = '未登录,先去<a href=\"../html/login.html\">登录</a>'";
 }
?>