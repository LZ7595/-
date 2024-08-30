<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航</title>
<style>
    *{padding: 0;margin:0;}
    body{background:rgb(69,73,116);}
    html,body{width: 100%; height: 100%;}
    .wrap{ height: 100%; width:200px; border-right:2px solid #eee; }
    div{display: inline-block;width: 150px;color: #eee;margin-bottom: 5px;}
    span,a{display: inline-block;width: 150px;padding: 5px 10px;margin-top: 8px;}
    span{font: bold 20px Arial;color: #666;background: #fff;}
    a{text-align: center;font: bold 18px Arial;color: #666;background: #fff;text-decoration: none; height: 50px; padding-top: 30px;}
    a:hover{text-align: center;font: bold 18px Arial;color: #fff;background: rgb(139, 146, 218);text-decoration: none;}
</style>
</head>
<body>
<div class="wrap">
    <div id="left-top"></div>
    <div>
        <div>
          <a  href="../wptp/wpindex.php" target="mainFrame" onFocus="this.blur()">物品列表</a>
          <a  href="../wptp/tpindex.php" target="mainFrame" onFocus="this.blur()">图片列表</a>
          <a  href="../wptp/addwp.php" target="mainFrame" onFocus="this.blur()">新增物品</a>
          <a  href="../wptp/addtp.php" target="mainFrame" onFocus="this.blur()">新增图片</a>
        </div>
    </div>
</body>
</html>