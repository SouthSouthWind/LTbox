<?php 
require './common/common.php';
require './header.php';
//$goods=$db->getDatas('goods',"*",'cate_id_child="'.$_GET('cate_id_child').'" AND cate_id_parent="'.$_GET('cate_id_child').'"');
$goods=$db->getDatas('goods','*','goods_total!="0"');
	$arr=array();
	function myrandom($min,$max){
	$ran=rand(0,$max-$min)+$min;
	if($arr){
		foreach($arr as $value){
		if($ran==$value){
			myrandom($min,$max);
		}
	}
	}
	
	    $arr[]=$ran;
	    return $ran;
}
 ?>
<link rel="stylesheet"    href="css/allproducts.css" type="text/css">
<div class="allproductdiv" >

    <div style="position:relative;">
        <h2 style="text-align: center;">&nbsp;</h2>
        <h4 style="text-align: center; margin:0; font-size:30px;">柔感哑光唇膏</h4>
        <p style="text-align: center; margin:0; font-size:13px;">感受魅可柔感哑光唇膏和持久哑光液体唇膏带来的卓越显色和持久妆效。</p>
        <p style="text-align: center;">&nbsp;</p> 
        <p style="text-align: center;">&nbsp;</p> 
    </div>
<table class="product">
	<?php
		foreach($goods as $key=>$value){
			if($key%4==0){
				echo '<tr>';
			}	
		?>
	<td>
    <div class="productfugu">
        <ul>
            <li><a href="detail.php?good_id=<?=$value['goods_id']?>"><?=$value['goods_name']?></a></li>
            <li>LIPSTICK</li>
            <li style="font-size:12px;">色号：  <?=$value['color']?></li>
            <!--<li style="font-size:12px;">[复古哑光]</li>-->
            <li><img src="img/QQ截图20170802104213.png"><li>
        </ul>
        <a href="detail.php?goods_id=<?=$value['goods_id']?>"><img src=<?=$value['img']?> class='goodsimg'/></a>
    </div>
    <div class="fugujiage">
            <ul>
                <li>¥<?=$value['goods_price']?></li>
               
                <li><a class="addshopcar" goods_id=<?=$value['goods_id']?> >加入购物车</a></li>
                    </ul>   
    </div>
    </td>
    <?php
    	if(($key+1)%4==0){
    		echo '</tr>';
    	}
    }
    ?>
</table>




<div class="footon" >
    <h3 style="text-align:center;">喜欢吗？</h3><br><br>
    <p style="text-align:center; font-size:13px;">想要专业的产品指导？<br>即刻前往门店吧！</p>
    <div class="footonchaxun"> <a href="#">门店查询</a></div>
</div>

</div>
<?php 
require './footer.php';
 ?>

