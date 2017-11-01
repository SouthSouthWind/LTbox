<?php
require'./common/admin.common.php';
$data=$_GET;
$updata['useraddress_id']=$data['orderarr'][0];
$updata['isPay']=true;

array_splice($data['orderarr'],0,1);

//var_dump($data) ;
foreach($data['orderarr'] as $value){
//var_dump($value) ;
	
$delorder=$db->updateData('orderform',$updata,'order_id="'.$value.'"');
//echo $delorder;



}
if($delorder){
	$r['result']='success';
	echo json_encode($r);
}else{
	$r['result']='fail';
	echo json_encode($r);
}
?>