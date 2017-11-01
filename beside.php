<?php
require './header.php';
//var_dump($_GET['aim']);
?>
<div class='informationside'>
	<ul>
		<input type="hidden" name="" id="" value=<?=$_GET['aim']?> />
		<li ><a href="person.php?aim=0" >修改个人信息</a></li>
		<li><a href="showorder.php?aim=1" >历史订单</a></li>
		<li><a href="showorder.php?aim=2" >待付款</a></li>
		<li><a href="showorder.php?aim=3" >待发货</a></li>
		<li><a href="showorder.php?aim=4" >待收货</a></li>
		<li><a href="showorder.php?aim=5" >待评价</a></li>
		
		<li><a href="goods_place.php?aim=6" >管理收货地址</a></li>
	</ul>
	<script>
$('.informationside li').each(function(){

	$(this).attr('id','');
		
	})
var index=$("input[type='hidden']").val()
$($('.informationside li')[index]).attr('id','click');
	
	</script>
</div>

