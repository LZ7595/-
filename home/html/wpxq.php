<?php
require_once("../../conn/conn.php");
if (empty($_GET['id'])) {
  echo "<script>alert('参数错误');history.back()</script>";
  exit;
}
$sql = "select * from article where id=".$_GET['id'];
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
@$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物品详情</title>
    <link rel="stylesheet" href="../css/head.css">
  <link rel="stylesheet" href="../css/wpxq.css">
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
    echo "<script>document.querySelector('.useee').innerHTML = '<p>欢迎，" . $user['username'] . "！</p>';</script>";}?>
      <div class="zt-box">
        <div class="x-box">
          <div class="xdht"><a href="wpxs.php">物品展示</a> -- > <a href="wpxq.php?id=<?php echo $row['id'] ?>"><?php echo $row['eng']."&ensp;".$row['chi'];?></a></div>
          <div class="tupian"><img src="../../admin/<?php echo $row['url']; ?>"></div>
            <div class="wod"><p><?php echo $row['eng'];?></p>
            <p><?php echo $row['chi'];?></p></div>
            <div class="neirong"><h2>简介</h2><?php echo $row['nr1'];?><hr><h2>生成</h2><?php echo $row['nr2'];?><hr><h2>用途</h2><?php echo $row['nr3'];?></div>
            </div></div>
      <script src="../js/spxq.js"></script>
  <script src="../js/foot.js"></script>
</body>
</html>