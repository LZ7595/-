<?php
session_start();

// 获取用户信息
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

// 判断用户信息是否已存储在 session 中
if ($user) {
 // 输出用户信息
 echo "document.querySelector('.useee').innerHTML = '<p>欢迎，" . $user['username'] . "！</p>';";
}
?>