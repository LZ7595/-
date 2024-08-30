<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
  <title>物品展示</title>
  <link rel="stylesheet" href="../css/head.css">
  <link rel="stylesheet" href="../css/wpxs.css">
  <link rel="stylesheet" href="../css/foot.css">
</head>
<body>
  <div class="head-dhl">
    <script src="../js/head.js"></script>
  </div>

  <?php
session_start();
// 获取用户信息
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
// 判断用户信息是否已存储在 session 中
if ($user) {
  // 输出用户信息
  echo "<script>document.querySelector('.useee').innerHTML = '<p>欢迎，" . $user['username'] . "！</p>';</script>";
}
header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');
?>

  <div class="zt-box">
    <div class="x-box">
  <div class="head-sos"><h2>物品展示</h2>
      <form action="wpxs.php" method="get"><button type="submit" class="sos" ></button><input type="text" placeholder="请输入搜索内容"  name="keywords" value="<?php if(!empty($_GET['keywords'])){echo $_GET['keywords'];} ?>"></input></div>
  <div class="x-box1">
    <ul>
  <?php
        require_once '../../conn/conn.php'; //引入数据库链接
        $where = "where status = 1";//搜索条件给数据库
        $url = "";//搜索条件给url 实现url的状态维持

        if(!empty($_GET['keywords'])){//判断搜索条件是否存在
          $where = " where (eng like '%".$_GET['keywords']."%' or chi like '%".$_GET['keywords']."%') and status = 1";
          $url = "&keywords={$_GET['keywords']}";
        }

        $page = !empty($_GET['p']) ? $_GET['p'] : 1 ;//具体的页码
        $pagesize = 20;//每页显示多少条
        $maxrow = 0;//一共有多少条信息
        $maxpage = 0;//一共显示多少页

        $sql = "select id from article {$where}"  ;//查询一共有多少条信息
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
        $sql = "select * from article  {$where} {$limit}";
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        while($row = mysqli_fetch_assoc($result)){
      ?>
            <li>
            <a href="wpxq.php?id=<?php echo $row['id'] ?>" ><img src="<?php echo  "../../admin/".$row['url'];?>"><p><?php echo $row['eng']."&ensp;".$row['chi'];?></p></a>
            </li>
            <?php
          }
          ?>
        </ul>
        <div class="page">
        <?php
				echo "<a class='page' href='wpxs.php?p=1{$url}'>首页</a>&nbsp;&nbsp;";
				echo "<a class='page' href='wpxs.php?p=".($page-1)."{$url}'>上一页</a>&nbsp;&nbsp;";
				echo "<a class='page' href='wpxs.php?p=".($page+1)."{$url}'>下一页</a>&nbsp;&nbsp;";
				echo "<a class='page' href='wpxs.php?p={$maxpage}{$url}'>尾页</a>";
				?>
                </div>
  </div>
  <div id="srcolltop" style="padding: 5px 0 5px 13px;"><a title="回到顶部" href="#" class="srcolltope"><span>^</span></a></div>
  </div> </div>
  <script>
    const ztbox = document.querySelector('.zt-box')
const srcoll = document.querySelector('#srcolltop')
window.addEventListener('scroll',function(){
  const n = document.documentElement.scrollTop
    srcoll.style.opacity = n >= ztbox.offsetTop+50 ? 1 : 0
})
const backtop = document.querySelector('.srcolltope')
backtop.addEventListener('click',function(){
  document.documentElement.scrollTop = 0
})
  </script>
    <script src="../js/foot.js"></script>
  </body>
  </html>