<?php
require'./common/admin.common.php';

if($_GET['sendgoods']){
	$data['send_status']=true;

	
	$order=$db->updateData('orderform',$data,'order_id="'.$_GET['order_id'].'"');
	
	if($order){
		header('Location: searchorder.php?aim=0');
	}
}else if($_GET['cancelorder']){

		//取消订单
 		
 		
 		$order=$db->getOneData('orderform',"*",'order_id="'.$_GET['order_id'].'"');
 		//获取商品id和数量
 		$goods_id=$order['goods_id'];
 		$user_id=$order['user_id'];
 		$count=$order['count'];
 		//删除订单

 		$delorder=$db->delData('orderform','order_id="'.$_GET['order_id'].'"');
 		//减少用户订单数
 		$user=$db->getOneData('user','*','user_id="'.$user_id.'"');
 	      $userorder['order_form']=$user['order_form']-1;
 	$user=$db->updateData('user',$userorder,'user_id="'.$user_id.'"');
 	      
 		//增加商品库存
 		$goods=$db->getOneData('goods','*','goods_id="'.$goods_id.'"');
 		$count=$goods['goods_total']+$count;
 	   //  $selling=$goods['selling']-$count;
 		$data['goods_total']=$count;
 	 
 		$goods=$db->updateData('goods',$data,'goods_id="'.$goods_id.'"');

	if($delorder){
		header('Location: searchorder.php?aim=0');
	}
}
?>