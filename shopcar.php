<?php
require'./common/admin.common.php';
require './header.php';
?>
<?php
	if(!$_SESSION['id']){
		
?>

  
<?php
	exit;		
	}
	 $data=$_GET;
    $pagenum=8;
 $sql='SELECT count(shopcar_id) AS total FROM shopcar WHERE user_id="'.$_SESSION['id'].'"';
	
	    $r= $db->dblink->query($sql);
		 $total=$r->fetch_array(MYSQLI_ASSOC)['total'];
		 
		 
	   $totalpage=ceil($total/$pagenum);
	   $page=$_GET['page']?$_GET['page']:1;
if($page<1){
	$page=1;
}

if($page>$totalpage){
	$page=$totalpage;
}

		 
	$sql='SELECT * FROM shopcar WHERE user_id="'.$_SESSION['id'].'" ORDER By shopcar_id DESC LIMIT '.($page-1)*$pagenum.','.$pagenum; 
	//echo $sql;
	$shopcar= $db->dblink->query($sql);	
	
		
	
?>
	 <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/carts.css">
    <section class="cartMain">
    	<form id="shopcarform">
        <div class="cartMain_hd">
            <ul class="order_lists cartTop">
                <li class="list_chk">
                    <!--所有商品全选-->
                    <input type="checkbox" id="all" class="whole_check">
                    <label for="all"></label>
                    全选
                </li>
                <li class="list_con">商品信息</li>
                <li class="list_info">商品参数</li>
                <li class="list_price">单价</li>
                <li class="list_amount">数量</li>
                <li class="list_sum">金额</li>
                <li class="list_op">操作</li>
            </ul>
        </div>
    
        <div class="cartBox" >
            <div class="shop_info">
                <div class="all_check">
                    <!--店铺全选-->
                    <input type="checkbox" id="shop_a" class="shopChoice">
                    <label for="shop_a" class="shop"></label>
                </div>
                <div class="shop_name">
                   
                </div>
            </div>
             <div class="order_content">
             	
            <?php
            if($shopcar){
            	
           
            foreach($shopcar as $key=>$value){
            	$arr=array($value['goods_id']=>$value['count']);
            
          ?>
           
           
                <ul class="order_lists" >
                    <li class="list_chk">
                        <input  name='cheackgoods<?=$key?>' type="checkbox" id="checkbox<?=$key?>" class="son_check"  value='<?=$value['shopcar_id']?>' />
                       
                        <label for="checkbox<?=$key?>"></label>
                    </li>
                    <li class="list_con">
                        <div class="list_img"><a href="javascript:;"><img  src=<?=$value['img']?> /></a></div>
                        <div class="list_text"><a href="javascript:;"><?=$value['goods_name']?></a></div>
                    </li>
                    <li class="list_info">
                        <p>规格：<?=$value['model']?></p>
                        <p>尺寸：16*16*3(cm)</p>
                    </li>
                    <li class="list_price">
                        <p class="price">￥<?=$value['goods_price']?></p>
                    </li>
                    <li class="list_amount">
                        <div class="amount_box">
                            <a href="javascript:;" class="reduce reSty" shopcar_id=<?=$value['shopcar_id']?>>-</a>
                            <input type="text" value=<?=$value['count']?> class="sum" />
                            <a href="javascript:;" class="plus" shopcar_id=<?=$value['shopcar_id']?>>+</a>
                        </div>
                    </li>
                    <li class="list_sum">
                        <p class="sum_price" >￥<?=$value['count']*$value['goods_price']?></p>
                    </li>
                    <li class="list_op">
                        <p class="del"><a href="javascript:;" class="delBtn" shopcar_id=<?=$value['shopcar_id']?> del=true>移除商品</a></p>
                    </li>
                </ul>
                 
             <?php
             }
            }else{
            	echo '<h1>您还没有添加商品!!<h1>';
            }
             	?>
          <ul class="changeshopcarpage">

          	<li class='preshopcar'>
        <a href="shopcar.php?page=<?=($page-1)?>" class='preshopcar'>上一页</a>
          		
          	</li>
          	<li class='nextshopcar'>
        <a href="shopcar.php?page=<?=($page+1)?>" >下一页</a>
          		
          	</li>
          </ul>   	
       

        
      </div>

        <!--底部-->
        <div class="bar-wrapper">
            <div class="bar-right">
                <div class="piece">已选商品<strong class="piece_num">0</strong>件</div>
                <div class="totalMoney">共计: <strong class="total_text">0.00</strong></div>
               <div class="calBtn"><a id="pay">结算</a></div>
               <!-- <input type="submit"   value="结算" class="calBtn" />-->
            </div>
        </div>
        </form>
    </section>
    <section class="model_bg"></section>
    <section class="my_model">
        <p class="title">删除宝贝<span class="closeModel">X</span></p>
        <p>您确认要删除该宝贝吗？</p>
        <div class="opBtn"><a href="javascript:;" class="dialog-sure">确定</a><a href="javascript:;" class="dialog-close">关闭</a></div>
    </section>
	
    <script src="js/jquery.min.js"></script>
    <script src="js/carts.js"></script>
	
<?php

require './footer.php';

?>