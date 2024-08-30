<?php 
    session_start();
?>
<html>
<head>
<meta charset=utf-8 />
<title>后台页面头部</title>
<style type="text/css">
    *{padding: 0;margin:0;}
    body{background:rgb(69,73,116)}
    #header{width: min-width:1024px;font-family: "Microsoft YaHei", Tahoma, Arial, "宋体";}
    .left{width: 300px;float: left;font:bold 24px Arial;margin-left: 20px;color: #fff;}
    .right{float: right;color: #fff;padding-right: 50px; padding-top: 20px;}
    .logout{text-decoration: none;color: #fff;}
    .left img{width: 100px; float: left;}
    .left p{padding-top: 10px;}
</style>
</head>
<body style="margin-top: 20px;overflow-x:hidden;border-bottom:1px solid #fff">
<div id="header">
    <div class="left"><img src="../../home/image/logo.png"><p>后台管理系统</p> </div>
    <div class="right">
        您好，<?php echo $_SESSION['admin']; ?>，
        <a class="logout" href="../login/action.php?a=exit" target="_top">注销</a>
    </div>
</div>
</body>
</html>