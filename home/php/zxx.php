<?php
session_start();
require_once("../../conn/conn.php");//连接数据库
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$sql = "DELETE FROM user WHERE user = '$user[username]'";
$result = $conn->query($sql);
if ($result) {
    echo "删除成功！";
    session_destroy(); //销毁会话
 } else {
    echo "删除失败: " . $conn->error;
 }
 header('refresh:1; url= ../html/userhl.html');
 // 关闭数据库连接
$conn->close();

?>