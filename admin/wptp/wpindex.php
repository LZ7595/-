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
  <title>物品信息列表</title>
  <style>
  body{background: url('../uploads/body_bg.jpg' ) no-repeat; background-size:100% 100%;}
	.box{width: 98%; margin: 20px auto; background: rgba(255,255,255,0.7); padding: 10px;}
  .box .title{font-size:30px;font-weight:bold;text-align:center; font-family: cursive;}
	.box table{width:100%;border-collapse:collapse;font-size:12px;border:1px solid #666;min-width:460px;}
	.box table th,.box table td{height:40px;border:1px solid #666;}
	.box table th{font-weight:normal;}
	.box table td{text-align:center;}
	.box a{color:#444;text-decoration:none;}
	.box a:hover{text-decoration:underline;}
	.search{padding:10px 0;font-size:12px;}
	.page{color: #2767e0 !important;}
  .text-word{width: 230px;height: 30px;}
  .text-but{width: 60px;height: 30px;}
 </style>
 </head>
 <body>
	<div class="box">
	<div class="title">物 品 列 表</div>
 	<div class="search">
		<form method="get" action="wpindex.php">
        <input type="search" name="keywords" value="<?php if(!empty($_GET['keywords'])){echo $_GET['keywords'];} ?>" class="text-word" placeholder="输入搜索的物品名称">
        <input type="submit" value="查询" class="text-but">
    </form>
 	</div>
	<table border="1">
		<tr>
			<th width="3%">ID</th>
      <th width="5%">英文名</th>
      <th width="5%">中文名</th>
      <th>图片</th>
			<th>状态</th>
      <th width="10%">简介</th>
      <th width="15%">生成</th>
      <th width="35%">用途</th>
			<th width="10%">操作</th>
		</tr>
  	<?php
        $where = "";//搜索条件给数据库
        $url = "";//搜索条件给url 实现url的状态维持

        if(!empty($_GET['keywords'])){//判断搜索条件是否存在
          $where = " where eng like '%".$_GET['keywords']."%' or chi like '%".$_GET['keywords']."%'";
          $url = "&keywords={$_GET['keywords']}";
        }

        $page = !empty($_GET['p']) ? $_GET['p'] : 1 ;//具体的页码
        $pagesize = 5;//每页显示多少条
        $maxrow = 0;//一共有多少条信息
        $maxpage = 0;//一共显示多少页

        $sql = "select id from article " . $where;//查询一共有多少条信息
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $maxrow = mysqli_num_rows($result);
        $maxpage = ceil($maxrow/$pagesize);  // 一共分多少页 
        if ($maxpage<1) {
          $maxpage=1;
        }

        //  判断一下页码的有效
        if($page>$maxpage){
          $page = $maxpage;
        }
        if($page<1){
          $page = 1;
        }
        
        $limit = " limit ".($page-1)*$pagesize.",".$pagesize;//拼接分页
        $sql = "select * from article ".$where.$limit;
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

        $status = [1=>'展示', 2=>'已下架'];
        $index=1;
        while($row = mysqli_fetch_assoc($result)){
      ?>
		<tr>
			 <td><?php echo ($page-1)*$pagesize+$index++; ?></td>
       <td><?php echo $row['eng']; ?></td>
			 <td><?php echo $row['chi']; ?></td>
			 <td><img src="../<?php echo $row['url']; ?>" width="50" alt="图片加载失败"></td>
			 <td><a class="page" href="javascript:doChange(<?php echo $row['id'];?>,<?php echo $row['status'];?>);" target="mainFrame">
            <?php echo $status[$row['status']];?></a></td>
			 <td><?php echo $row['nr1']; ?></td>
       <td><?php echo $row['nr2']; ?></td>
       <td><?php echo $row['nr3']; ?></td>
			 <td>
				<div align="center">
					<span>
						<a class='page' href="edit.php?id=<?php echo $row['id'];?>">编辑</a> | 
						<a class='page' href="javascript:delSure(<?php echo $row['id'].",'".$row['img']."'"; ?>)">删除</a>
					</span>
				</div>
			</td>
		</tr>
		<?php } ?>
		<tr> 
			<td  colspan="8" class="fenye"><?php echo $maxrow; ?> 条数据 <?php echo $page."/"; echo $maxpage; ?> 页&nbsp;&nbsp;
				<?php
				echo "<a class='page' href='wpindex.php?p=1{$url}'>首页</a>&nbsp;&nbsp;";
				echo "<a class='page' href='wpindex.php?p=".($page-1)."{$url}'>上一页</a>&nbsp;&nbsp;";
				echo "<a class='page' href='wpindex.php?p=".($page+1)."{$url}'>下一页</a>&nbsp;&nbsp;";
				echo "<a class='page' href='wpindex.php?p={$maxpage}{$url}'>尾页</a>";
				?>
			</td>
		</tr>
	</table>
 </body>
</html>
<script src="../include/js/jquery.min.js"></script>
<script type="text/javascript">
function delSure(id,img){
  if(confirm("您确定要删除吗?")){
      $.post("action.php",{a:"del",id:id,img:img},function(data){
        if (data == 0) {
            alert("删除成功！");
            window.location.href= "wpindex.php";
        }else { 
            alert("删除失败！");
        };
      },"json");  
  }
}
function doChange(id, state){//改成物品的展示状态
    if (state==1) {
      var msg = '确定下架吗？';
    } else {
      var msg = '确定上架吗？';
    }
    if(confirm(msg)){
        $.post("action.php",{a:"change",id:id,status:state},function(data){
        if (data==0) { 
            alert("修改成功！");
            window.location.href= "wpindex.php";
        }else { 
            alert("修改失败！");
        };
      },"json");
    }
  }
</script>