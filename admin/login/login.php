<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>管理员登录</title>  
<style>
    body{background:url('../uploads/xm2.jpg'); background-size: 100%;}
    .title{text-align: center;padding-top: 100px; font-size: 50px; background-image: linear-gradient(to right, #fff, rgb(99, 130, 32));
	color: transparent;
	-webkit-background-clip: text;}
    .main{background-color: rgba(255,255,255,0.7); width:400px; margin:50px auto; padding: 30px;text-align: center; border-radius: 5px;}
    .input{width: 300px;height: 30px;margin-bottom:20px;padding-left: 5px;}
    .left{padding-bottom:20px;}
    .btn{width: 80px; height: 30px;}
</style>
</head>
<body>
<div class="container">
    <h1 class="title">世界百科后台管理</h1>
    <div class="main">
        <h2>管 理 员 登 录</h2>
        <form action="action.php?a=login" method="post">
            <table>
                <tr>
                    <th valign="middle" class="left">账号：</th>
                    <td><input type="text" id="username" name="username" placeholder="登录账号" required="required" class="input" /></td>
                </tr>
                <tr>
                    <th valign="middle" class="left">密码：</th>
                    <td><input type="password" id="password" name="password" placeholder="登录密码" required="required" class="input" /></td>
                </tr>
                <tr>
                    <th></th>
                    <td align="left">
                        <input type="submit" class="btn" value="登录">
                        <input type="reset" class="btn">
                    </td>
                </tr>
            </table>  
        </form>
        <a href="../../home/html/index.html">返回原网站</a>
    </div>
</div>
<script src="../include/js/jquery.min.js"></script>
<script>
    function check() {
        var username = $("#username").val();
        var password = $("#password").val();
        if (username == "") {
            alert("帐号不能为空");
            $("#username").focus();
            return false;
        }
        if (password == "") {
            alert("密码不能为空");
            $("#password").focus();
            return false;
        }
        return true;
    }
</script>
</body>
</html>