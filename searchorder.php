<?php 
require'./common/admin.common.php';
    require './head.php';
$data=$_GET;
$pagenum=4;
          if($_GET['aim']==1){
          	$sql='SELECT count(order_id) AS total FROM orderform WHERE send_status=1 AND admin_id="'.$_SESSION['id'].'"';
          	
          }else if($_GET['aim']==0){
          	$sql='SELECT count(order_id) AS total FROM orderform WHERE send_status=0 AND isPay=1 AND admin_id="'.$_SESSION['id'].'"';
          	
          }

	    
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
 if($_GET['aim']==1){
       $sql='SELECT * FROM orderform WHERE send_status=1 AND admin_id="'.$_SESSION['id'].'" ORDER By ordertime LIMIT '.($page-1)*$pagenum.','.$pagenum; 
 	
 }else if($_GET['aim']==0){
       $sql='SELECT * FROM orderform WHERE send_status=0 AND isPay=1 AND admin_id="'.$_SESSION['id'].'" ORDER By ordertime LIMIT '.($page-1)*$pagenum.','.$pagenum; 
 	
 }


	$orderlist= $db->dblink->query($sql);	   	
          
          
?>
<div id="orderformcontent">
	

<ul id="orderlist-title">
	<li>商品信息</li>
	<li>商品编号</li>

	<li>客户信息</li>
	<li>收件人信息</li>
	<?if($_GET['aim']==0){?>
	<li>发货</li>
	<li>取消订单</li>	
	<?}?>
	
	
</ul>
<?foreach($orderlist as $value){
	$good=$db->getOneData('goods','*','goods_id="'.$value['goods_id'].'"');
	$user=$db->getOneData('user','*','user_id="'.$value['user_id'].'"');
	$address=$db->getOneData('address','*','address_id="'.$value['address_id'].'"');
?>
<ul class="orderlist-content">
	<li><img src='<?=$good['img']?>' />
		<span >
			<?=$good['goods_name']?>
		</span>
	</li>
	<li>
		<p>编号：<?=$good['goods_id']?></p>
		<p>数量：<?=$value['count']?></p>
		<p>单价：<?=$good['goods_price']?></p>
		<p>总价：<?=$value['count']*$good['goods_price']?></p>
		
	</li>

	<li>
		<P>账号：<?=$user['user_id']?></P>
		<P>用户名：<?=$user['username']?></P>
	</li>
	<li>
		<p>收件人姓名：<?=$address['receiver']?></p>
		<p>收件人电话：<?=$address['receivetel']?></p>
		<div>收件人地址：<?=$address['address']?></div>
	</li>
	<?if($_GET['aim']==0){?>
		<li><a href="adminchangeorderstatus.php?order_id=<?=$value['order_id']?>&aim=<?=$_GET['aim']?>&sendgoods=true">发货</a></li>
	<li><a href="adminchangeorderstatus.php?order_id=<?=$value['order_id']?>&aim=<?=$_GET['aim']?>&cancelorder=true">取消订单</a></li>
	
	<?}?>
	
</ul>
<?}?>
	 <ul id="searchorderpage">

          	<li class='preorder'>
           <a href="searchorder.php?page=<?=($page-1)?>&aim=<?=$_GET['aim']?>" class='preshopcar'>上一页</a>
          		
          	</li>
          	<li class='nextorder'>
           <a href="searchorder.php?page=<?=($page+1)?>&aim=<?=$_GET['aim']?>" >下一页</a>
          		
          	</li>
          </ul>  
</div>
<?php 
        require './foot.php';
    ?>