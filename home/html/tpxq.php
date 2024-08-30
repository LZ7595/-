            <?php
            header('Access-Control-Allow-Origin:*');
            header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
            header('Access-Control-Allow-Headers:x-requested-with,content-type');
            
            require_once("../../conn/conn.php");
            if (empty($_GET['id'])) {
              echo "<script>alert('参数错误');history.back()</script>";
              exit;
            }
            $sql = "select * from image where id=".$_GET['id'];
            $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
            @$row = mysqli_fetch_assoc($result);
            function size($byte){
              
              $KB = 1024;
              
              $MB = 1024 * $KB;
              
              $GB = 1024 * $MB;
              
              $TB = 1024 * $GB;
              
              if ($byte < $KB) {
                
                return $byte . "B";
                
              } elseif ($byte < $MB) {
                
                return round($byte / $KB, 2) . "KB";
                
              } elseif ($byte < $GB) {
                
                return round($byte / $MB, 2) . "MB";
                
              } elseif ($byte < $TB) {
                
                return round($byte / $GB, 2) . "GB";
                
            } else {
            
              return round($byte / $TB, 2) . "TB";
              
            }}
            ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>图片详情</title>
    <link rel="stylesheet" href="../css/head.css">
  <link rel="stylesheet" href="../css/tpxq.css">
  <link rel="stylesheet" href="../css/foot.css">
</head>
<body>
  <div class="heimu"><img src="../../admin/<?php echo $row['url']; ?>" width="1080px"><button id="gbb">关闭</button></div>
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
          <div class="daohang" style="width: 100%;"><p></p></div>
          <div class="box-img">
            <img src="../../admin/<?php echo $row['url']; ?>" alt="加载失败" width="800px" height="500px">
          </div>
          <div class="yltp"><button id="yl">预览</button></div>
          <div class="imgnr">
            <div class="inr1"><p>图片名称:&emsp;<span id="p1"><?php echo $row['word']; ?></span></p><p>图片主题:&emsp;<span id="p2"><?php echo $row['zt']; ?></span></p></div>
            <div class="inr2"><p>图片分辨率:&emsp;<span id="p3">

<?php
// 图片文件路径
$imagePath ="../../admin/".$row['url'];
 
// 获取图片尺寸信息
$imageInfo = getimagesize($imagePath);
 
// 提取宽度和高度
$width = $imageInfo[0];
$height = $imageInfo[1];

echo   $width . "×" . $height ;
?>
            </span></p>
            <p>图片大小:&emsp;<span id="p4">
              <?php 
              $size = filesize($imagePath);
              echo size($size);
              ?>
            </span></p></div>
          </div>
          <div class="inr3"><a href="../../admin/<?php echo $row['url']; ?>"><button>下载</button></a></div>
      </div></div>
      <script>
const yltp = document.querySelector('#yl')
const heimu = document.querySelector('.heimu')
const heimui = document.querySelector('.heimu img')
yltp.addEventListener('click',function(){
 heimu.style.display = 'block'
})
const gbb = document.querySelector('#gbb')
gbb.addEventListener('click',function(){
  heimu.style.display = 'none'
})
      </script>
        <script src="../js/foot.js"></script>
</body>
</html>