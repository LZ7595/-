<?php
session_start();

// 清除当前用户的所有session数据
session_destroy();
header('Location: ../html/userhl.html');
exit;
?>