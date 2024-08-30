<?php 
session_start();
  require_once '../../conn/conn.php'; //引入数据库链接
  if(!isset($_SESSION['admin'])){
    echo "<script>top.location.href='../login/login.php'</script>";
    exit;
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新增物品</title>
<style>
body{margin:0;padding:0;background: url('../uploads/body_bg.jpg' ) no-repeat; background-size:120%;}
.box{margin:20px;min-width: 800px; background: rgba(255,255,255,0.5); height: 845px;}
.box h1{font-size:30px;text-align:center;font-family: cursive;}
.profile-table{margin:0 auto;}
.profile-table th{font-weight:normal;text-align:right;}
.profile-table .input{border:1px solid #ccc;height:26px;padding-left:4px;}
.long{width:300px!important;}
.profile-table .button{background-color:#ccc;border:1px solid #666;color:#666;width:80px;height:30px;font-weight: bold; margin:0 5px;cursor:pointer;}
.profile-table .td-btn{text-align:center;padding-top:10px;}
.profile-table th,.profile-table td{padding-bottom:10px;}
.profile-table td{font-size:14px;}
.profile-table .txttop{vertical-align:top;}
.profile-table .select{border:1px solid #ccc;min-width:80px;height:28px;}
.profile-table .description{font-size:13px;width:250px;height:60px;border:1px solid #ccc;}
.desc{width: 400px;height: 90px;}
#editor{width: 500px;}
</style>
</head>
<body>
<div class="box">
	<h1>新 增 物 品</h1>
	<form method="post" class="form-x" action="action.php" enctype="multipart/form-data">  
		<input type="hidden" name="a" value="insert" />
		<table class="profile-table">
		    <tr><th>英文名：</th><td><input type="text" name="eng" required class="long input" /></td></tr>
			<tr><th>中文名：</th><td><input type="text" name="chi" required class="long input" /></td></tr>
			<tr><th>图片：</th><td><input type="file" name="pic" required ></td></tr>
			<tr><th>简介：</th><td><input name="nr1" type="text/plain" required class="input" style="width:548px;"/></td></tr>
			<tr><th>生成：</th><td><input name="nr2" type="text/plain" required class="input" style="width:548px;"/></td></tr>
			<tr><th>用途：</th><td><textarea name="nr3" type="text/plain" required rows="10" cols="80"></textarea></td></tr>
			<tr><td colspan="2" class="td-btn">
			<input type="submit" value="提交" class="button" />
			<input type="reset" value="重置" class="button" />
			</td></tr>
		</table>
	</form>
</div>
</body>
</html>