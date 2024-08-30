<?php

	// 公共函数库
	/**
	*文件上传函数
	*@param 	string 	$path 		上传文件保存路径
	*@param 	array 	$upfile 	上传文件的信息
	*@param 	array 	$typelist	支持上传文件的类型 默认为array() 表示不受限制
	*@param 	int 	$maxsize 	支持上传文件的最大尺寸，默认为0，表示不受限制
	*@return 	array 	返回的为一个数组 包含两个单元：
	*			1. 下标为error 值为 true 表示成功，值为false 表示失败
	*			2. 下标为info  表示上传成功文件的新文件名，失败 表示 错误信息
	*/

	function fileupload($path,$upfile,$typelist,$maxsize){
		// 定义上传处理时所需变信息
		$path = rtrim($path,"/")."/";//处理存放上传文件的路径
		$res = array("error"=>false,"info"=>"");//定义返回变量

		// 根据属性error判断上传文件失败的原因

		if ($upfile['error'] != 0) {
			switch ($upfile['error']) {
				case 1: $info = "1 上传文件超过了php.ini中upload_max_filesize 选项限制的值";
					break;
				case 2: $info = "2 上传文件大小超出了HTML表单隐藏属性的 MAX_FILE_SIZE 元素所指定的最大值";
					break;
				case 3: $info = "3 文件只被部分上传";
					break;
				case 4: $info = "4 没有上传任何文件";
					break;
				case 6: $info = "6 找不到临时文件";
					break;
				case 7: $info = "7 文件写入失败";
					break;				
				default: $info = "未知错误";
					break;
			}
			$res['info'] = $info;
			return $res;
		}

		// 判断文件上传类型

		if (!empty($typelist)) {
			if (!in_array($upfile['type'], $typelist)) {
				$res['info'] = "上传文件类型错误".$upfile['type'];
				return $res;
			}
		}

		// 判断文件上传大小

		if ($maxsize != 0) {
			if ($upfile['size']>$maxsize) {
				$res['info'] = "上传文件过大";
				return $res;
			}
		}

		//生成随机上传文件名

		do{
			$ext = pathinfo($upfile['name'],PATHINFO_EXTENSION);//获取文件的后缀
			$newname = time().rand(0,999999).".".$ext;//组装随机文件名
		}while(file_exists($newname));//判断新文件上海是否存在

		// 移动上传文件

		if (is_uploaded_file($upfile['tmp_name'])) {
			if (move_uploaded_file($upfile['tmp_name'], $path.$newname)) {
				$res['info'] = $newname;//表示文件上传成功，获取上传文件名
				$res['error'] = true;
			}else{
				$res['info'] = "文件上传失败：文件移动失败";
				return $res;
			}
		}else{
			$res['info'] = "文件上传失败：不是有效的上传文件";
		}

		return $res;//返回结果
	}

	/**
	*图片等比缩放函数
	*@param 	string 		$pic 		被所缩放的原图片名
	*@param 	string 		$path 		缩放后图片存放的路径
	*@param 	int 		$width 		图片缩放后的最大宽度
	*@param 	int 		$height 	图片缩放后的最大高度
	*@param 	string 		$pre 		缩放后图片名的前缀，默认值为 s_
	*@return 	boolean 				返回值为 true 表示成功，为false 表示失败
	*/

	function imagezoom($pic,$path,$width,$height,$pre){
		$path = rtrim($path,"/")."/";
		//获取原图片信息
		$picinfo = getimagesize($path.$pic);
		$w = $picinfo[0];//宽度
		$h = $picinfo[1];//高度

		//通过原图片类型创建图片资源画布

		switch ($picinfo[2]) {
			case 1: $srcim = imagecreatefromgif($path.$pic);
				break;
			case 2: $srcim = imagecreatefromjpeg($path.$pic);
				break;
			case 3: $srcim = imagecreatefrompng($path.$pic);
				break;
			default: die("未知图片格式");
		}

		//计算图片缩放后的大小

		if ($width/$w<$height/$h) {
			$dw = $width;
			$dh = $h*($width/$w);
		}else{
			$dw = $w*($height/$h);
			$dh = $height;
		}

		//创建模板图片画布

		$dstim = imagecreatetruecolor($dw, $dh);

		//缩放图片

		imagecopyresampled($dstim, $srcim, 0, 0, 0, 0, $dw, $dh, $w, $h);

		//输出图片

		switch ($picinfo[2]) {
			case 1: imagegif($dstim,$path.$pre.$pic);
				break;
			case 2: imagejpeg($dstim,$path.$pre.$pic);
				break;
			case 3: imagepng($dstim,$path.$pre.$pic);
				break;
			default:
				die("未知图片格式");
		}

		//释放资源

		imagedestroy($dstim);
		imagedestroy($srcim);

		return true;
	}
