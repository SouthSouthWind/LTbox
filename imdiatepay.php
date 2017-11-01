<?php
require'./common/admin.common.php';
	
 $data=$_POST;

	//var_dump($shopcar);
 	$goods=$db->getOneData('goods','*','goods_id="'.$data['goods_id'].'"');
 	//var_dump($goods);
 	$addorder['user_id']=$_SESSION['id'];
 	$addorder['admin_id']=$goods['admin_id'];
 	$addorder['goods_id']=$goods['goods_id'];
 	$addorder['count']=$data['count'];
 	$addorder['ordertime']=date('Y-m-d H:i:s');
 	//添加订单
 	$order_id=$db->addData('orderform',$addorder, 1);
 	$count=$goods['goods_total']-$addorder['count'];
 	//减少库存
 	$data['count']=$count;
 	$goods=$db->updateData('goods',$data,'goods_id="'.$shopcar['goods_id'].'"');

 	$arr[]=$order_id;
 	
 

 echo json_encode($arr);
 
?>