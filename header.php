<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>全部产品</title>
<link rel="shortcut icon" href="img/240448-15031F9513250.jpg">
<link rel="shortcut icon" href="img/icon.jpg">
<link rel="stylesheet"    href="css/header.css"  type="text/css">
<link rel="stylesheet"    href="css/footer.css"   type="text/css">
<link rel="stylesheet"    href="css/login.css"   type="text/css">
<link rel="stylesheet"    href="css/searchgoods.css"   type="text/css">
<link rel="stylesheet"    href="css/showorder.css"   type="text/css">
	
	<link rel="stylesheet"    href="css/beside.css"  type="text/css">
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<!--<script src="js/jquery.min.js"></script>-->
<script src="./js/login.js"></script> 
<script src="./js/myCart.js"></script>
<script src="./js/cart.js"></script>
   <script src="js/admin.js"></script>
<script src="js/users.js"></script> 
</head>
<?php
if($_SESSION['id']){
	$sql='SELECT * FROM user WHERE user_id="'.$_SESSION['id'].'"';
	$user=$db->dblink->query($sql);
	$user=$user->fetch_array(MYSQLI_ASSOC);

}
	$userpicurl='img/header.jpg';
?>
<body>
<div id="mask"></div>
    <div id="show">
        <div id="close">X</div>
        <h3 id="headerlogin">登录MAC账号</h3>
        <form action="" method="post" id="login">
            
            <input type="text"      id="user_id"    name="user_id"  placeholder="账号">
            <span class="tip user_tip"></span><br>
            <input type="password"  id="passwd"     name="passwd"   placeholder="密码">
            <span class="tip passwd_tip"></span><br>
            <input type="text"      id="code"       name="code"     placeholder="验证码">
	    <img src="./coder.php" id="ycode" />
            <span class="tip code_tip"></span><br>
            <input type="radio"     id="user_login" name="obj" value="user" checked="checked">
            <span class="txt1">用户登录</span>
            <input type="radio"     id="root_login" name="obj" value='admin'>
            <span class="txt2">管理员登录</span><br>
            <input type="button" id="login_btn" value="登录" />
            
        </form>
        <form action="" method="post" id="reg">
            
            <input type="tiptext"      id="reg_user_id"    name="user_id"  placeholder="账号">
            <span class="tip reg_tip"></span><br>

            <input type="password"  id="reg_passwd"     name="passwd"   placeholder="密码">
            <span class="tip reg_pass_tip"></span><br>

            <input type="password"  id="re_reg_passwd"  name="passwd"   placeholder="确认密码">
            <span class="tip re_pass_tip"></span><br>

            <input type="text"      id="reg_code"       name="code"     placeholder="验证码">
            <img src="./coder.php" id="reg_ycode"/></span><span class="tip reg_code_tip"></span><br>
            
            <input type="radio"     id="user_reg" name="obj" value="user" checked="checked"><span class="txts1">用户注册</span>
            <input type="radio"     id="root_reg" name="obj" value='admin'>
            <span class="txts2">管理员注册</span><br>
         
            <input type="button" id="reg_btn" value="注册" />
            
        </form>
        <p class="dl">注册</p>
    </div>


<div class="nav">
    <a href="HomePage.php"><img src="img/log.png" title="Home" class="mac"></a>
    <ul>
	    <li><a href="newproduct.php">新品快讯</a></li>
        <li><a href="allproducts.php">全部产品</a></li>
        <li><a href="bestseller.php">热卖产品</a></li>
        <li><a href="#">探索魅可</a></li>
        <li><a href="shoppe.php">门店专柜</a></li>
    </ul>
    <img src="img/search.png"  title="Search"      class="search">
    <div class='userbox'>
    	 <img src='<?=$_SESSION['id']?$user['userpic']:$userpicurl ?>'  title="用户头像!"   class="leter">
    	 <div id="exitlogin" >
    <span class="exitlogin"><a href="exit.php">退出登录</a></span>
    <span><a href="person.php?aim=0">个人中心</a></span>
</div>
    </div>
    <a href="shopcar.php"><img src="img/shop.png"    title="我的购物车"  class="shopcar">
    </a>
    <img src="img/login.png"   title="My M.A.C"    class="enter" id="ter">

</div>

<script>
    $('.userbox').hover(function(){
        //console.log(111);
        $('#exitlogin').css('display','block');
    },function(){
        //console.log(222);
        $('#exitlogin').css('display','none');
    })
    

</script>

