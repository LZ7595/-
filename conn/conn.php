<?php
header('content-type:text/html;charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "root";
$dbname ="mydb";//创建连接
$conn = new mysqli($servername,$username,$password,$dbname);//检测连接
if($conn->connect_error){
    die("连接失败: ".$conn->connect_error);
}
$conn->set_charset('utf8');
//分类信息 1:爱情鲜花;2:友情鲜花;3:生日鲜花;4:老师长辈;5:探病慰问	
$types = array(
	1 => array('name' => '爱情鲜花', 'desc' => 'Love flowers'),
	2 => array('name' => '友情鲜花', 'desc' => 'Flowers of friendship'),
	3 => array('name' => '生日鲜花', 'desc' => 'Birthday flowers'),
	4 => array('name' => '老师长辈', 'desc' => 'Teachers and elders'),
	5 => array('name' => '探病慰问', 'desc' => 'Visit the sick')
);
// $conn->close();//关闭连接
?>