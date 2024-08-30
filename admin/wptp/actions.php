<?php
require_once '../../conn/conn.php'; //引入数据库链接
switch($_POST['a']){
	case 'insert':
		//接受表单传值
		$word    = $_POST['word'];
		$zt    = $_POST['zt'];
		$fbl   = $_POST['fbl'];
		$dwl   = $_POST['dwl'];

		include("../include/functions.php");//引入上传文件函数			
        $path = "../uploads";// 图片保存路径

		$upfile = $_FILES['pic'];
		$typelist = array("image/png","image/jpg","image/jpeg","image/gif");// 图片上传支持的格式
		$maxsize = 0;//不限制上传大小
		$pic = fileupload($path,$upfile,$typelist,$maxsize);//实现文件上传			
		if ($pic['error'] == false) {//判断是否上传成功
			echo "<script>alert('图片上传失败：'".$pic['info'].");window.history.back(-1)</script>";
			exit;
		}
		
        $url = "uploads/". $pic['info'];

		$insSql = "insert into image(word, url, zt, fbl, dwl) VALUES('$word', '$url', '$zt', '$fbl', '$dwl')";
		$result = mysqli_query($conn, $insSql) or die(mysqli_error($conn));	
		
		echo "<script>alert('添加成功！');location.href='addtp.php'</script>";
		break;

	case 'update':
		include("../include/functions.php"); //引入上传文件函数
		$url = $_POST['url'];
		if($_FILES['pic']['size']!=0){//有新上传的图片再处理图片
			$path = "../uploads";// 图片保存路径
			$upfile = $_FILES['pic'];
			$typelist = array("image/png","image/jpg","image/jpeg","image/gif");// 图片上传支持的格式
			$maxsize = 0;
			$pic = fileupload($path,$upfile,$typelist,$maxsize); //实现文件上传			
			if ($pic['error'] == false) {//判断是否上传成功
				echo "<script>alert('图片上传失败：'".$pic['info'].");window.history.back(-1)</script>";
				exit;
			}

			$url = "uploads/". $pic['info'];
		}

		//接受表单传值
		$word    = $_POST['word'];
		$zt      = $_POST['zt'];
		$fbl     = $_POST['fbl'];
		$dwl     = $_POST['dwl'];
		$status  = $_POST['status'];

		$sql = "update image set word='$word',url='$url',zt='$zt',fbl='$fbl',dwl='$dwl',status=$status where id=".$_POST['id'];
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if ($url != $_POST['url']) {// 如果更新图片，则删除本地原图片
            @unlink("../../".$_POST['url']);
		}

		echo "<script>alert('修改成功！');location.href='tpindex.php'</script>";
		break;

	case "del":
		$sql = "delete from image where id=".$_POST['id'];//删除
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if(mysqli_affected_rows($conn)){
			@unlink("../../".$_POST['url']);
			exit(json_encode(0));
		}else{
			exit(json_encode(1));
		}
	break;

	case 'change':
		$status = $_POST['status'];
		if ($status == 1) {
			$changeStatus = 2;
		} else if ($status == 2) {
			$changeStatus = 1;
		}

		$sql = "update image set status=$changeStatus where id=".$_POST['id'];//修改展示状态
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

		if(mysqli_affected_rows($conn)>0){
			exit(json_encode(0));
		}else{
			exit(json_encode(1));
		}
		break;
}
//关闭数据库 释放结果集
@mysqli_free_result($result);
mysqli_close($conn);