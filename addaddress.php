<?php
require'./common/admin.common.php';

$data=$_POST;
//var_dump($data);
if($_POST['del']){
	//echo $_POST['address_id'];
	$address=$db->delData('address','address_id="'.$_POST['address_id'].'"');
	
}
else if($_POST['edit']){
	unset($data['edit']);
	unset($data['address_id']);
	
	$address=$db->updateData('address',$data,'address_id="'.$_POST['address_id'].'"');
}
else{
	$data['user_id']=$_SESSION['id'];
$address=$db->addData('address',$data);

}
if($address){
	$r['result']='success';
	echo json_encode($r);
}else{
	$r['result']='fail';
	echo json_encode($r);
}

?>