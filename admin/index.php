<?php 
  session_start(); 
  if(!isset($_SESSION['admin'])){
    echo "<script>top.location.href='login/login.php'</script>";
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理系统</title>
</head>
<!--框架样式-->
<frameset rows="75,*,0" cols="*" frameborder="no" border="0" framespacing="0">
<!--top样式-->
	<frame src="include/top.php" name="topframe" scrolling="no" noresize id="topframe" title="topframe" />
<!--contact样式-->
	<frameset framespacing="0" border="0" frameborder="no" cols="200,*" rows="*">
		<frame scrolling="no" noresize frameborder="no" name="leftFrame" src="include/left.php"></frame>	
		<frame scrolling="" noresize border="0" name="mainFrame" src="wptp/wpindex.php"></frame>
	</frameset>
</frameset>
<noframes></noframes>
</html>