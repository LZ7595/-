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
<title>修改信息</title>
<style>
body{margin:0;padding:0;background: url('../uploads/body_bg.jpg' ) no-repeat; background-size:120%;}
.box{margin:20px;min-width: 800px}
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
<?php
    $sql = "select * from image where id=".$_GET['id'];
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    @$row = mysqli_fetch_assoc($result);
  ?>
<div class="box">
	<h1>修改信息</h1>
	<form method="post" class="form-x" action="actions.php" enctype="multipart/form-data">
		<input type="hidden" value="update" name="a" />
		<input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
	    <input type="hidden" value="<?php echo $row['url']; ?>" name="url" />
		<table class="profile-table">
			<tr>
				<th></th>
				<td><a href="../<?php echo $row['url']; ?>" target="_blank">
				<img src="../<?php echo $row['url']; ?>" alt="图片加载失败" style="max-width: 200px;max-height: 200px;"></a></td>
			</tr>
			<tr>
				<th>名称：</th>
				<td><input type="text" name="word" value="<?php echo $row['word']; ?>" required class="long input" /></td>
			</tr>
			<tr>
				<th>新图：</th>
				<td><input type="file" name="pic"></td>
			</tr>
			<tr>
				<th>画质：</th>
				<td><input type="text" name="fbl" value="<?php echo $row['fbl']; ?>" step="0.01" min="0" required class="input" /></td>
			</tr>
			<tr>
				<th>下载量：</th>
				<td><input type="text" name="dwl" value="<?php echo $row['dwl']; ?>" step="0.01" min="0" required class="input" /></td>
			</tr>
			<tr>
				<th>主题：</th>
				<td><input type="text" name="zt" class="input" required  value="<?php echo $row['zt']; ?>"/></td>
			</tr>
			<tr>
				<th>状态：</th>
				<td>
					<input type="radio" name="status" value="1" <?php echo $row['status']==1?'checked':''; ?> required>展示
					<input type="radio" name="status" value="2" <?php echo $row['status']==2?'checked':''; ?> required>下架
				</td>
			</tr>
			<tr>
				<td colspan="2" class="td-btn">
					<input type="submit" value="提交" class="button" />
					<input type="button" value="返回" class="button" onclick="history.back()" />
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>