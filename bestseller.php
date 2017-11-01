<?php 
require './common/common.php';
require './header.php';
	/*$sql='SELECT * FROM goods  ORDER By selling LIMIT 0,8'; 
	$hot=$db->dblink->query($sql);
     $hotgoods= $hot->fetch_array(MYSQLI_ASSOC);*/
	
 ?>
<link rel="stylesheet"    href="css/bestseller.css"  type="text/css">

<div class="nav1">
	<p class="p1">魅可明星产品</p>
	<ul>
		<li><a href="#jd">经典畅销</a></li>
		<!--<li><a href="#">最高人气</a></li>-->
		<li><a href="#rm">新品热卖</a></li>
	</ul>
</div>
<div class="div1">
	<img src="img/Bestsellers_Ambient.jpg" class="img1" >
	<p class="p2">魅可明星产品</p>
</div>
<div class="div2">	
	<a name='jd'><p class="p3">经典畅销</p></a>
</div>

<table class="jingdian">
	<tr>
	<?php
		$sql='SELECT * FROM goods  ORDER By selling LIMIT 0,8'; 
	$hot=$db->dblink->query($sql);
     $hotgoods= $hot->fetch_array(MYSQLI_ASSOC);
		foreach($hot as $key=>$value){
			if($key%4==0&&$key){
				echo '</tr><tr>';
			}
		?>
	<td >
		<div class="showhotgoods">
			<span class="bestgoods_name"><a href="detail.php?goods_id=<?=$value['goods_id']?>"><?=$value['goods_name']?></a></span><br />
			<span class="bestcolor">色号： <?=$value['color']?></span><br />
		</div>
		<img src=<?=$value['img']?> />
		
		<div class="priceandbuy">
            <ul>
                <li>¥<?=$value['goods_price']?></li>
                <li><a href="addshopcar.php?goods_id=<?=$value['goods_id']?>">加入购物车</a></li>
             </ul>   
        </div>
	</td>
	<?php
		/*if(($key+1)%4==0){
		echo '<tr/>';
			
		}*/

	}
		?>
	
	
</table>


<div class="div28">	
	<a name="rm"><p class="p13">热卖新品</p></a>
</div>

<table class="jingdian">
	<tr>
	<?php
		$sql='SELECT * FROM goods  ORDER By addtimes DESC LIMIT 0,8'; 
	$hot=$db->dblink->query($sql);
     $hotgoods= $hot->fetch_array(MYSQLI_ASSOC);
		foreach($hot as $key=>$value){
			if($key%4==0&&$key){
				echo '</tr><tr>';
			}
		?>
	 <td >
		<div class="showhotgoods">
			<span class="bestgoods_name"><a href="detail.php?goods_id=<?=$value['goods_id']?>"><?=$value['goods_name']?></a></span><br />
			<span class="bestcolor">色号： <?=$value['color']?></span><br />
		</div>
		<img src=<?=$value['img']?> />
		
		<div class="priceandbuy">
            <ul>
                <li>¥<?=$value['goods_price']?></li>
                <li><a href="addshopcar.php?goods_id=<?=$value['goods_id']?>">加入购物车</a></li>
             </ul>   
        </div>
	 </td>
	<?php
		/*if(($key+1)%4==0){
		echo '<tr/>';
			
		}*/

	}
		?>
	
	</tr>
</table>

<?php 
require 'footer.php';

 ?>