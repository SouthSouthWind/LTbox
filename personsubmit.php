
<?php
    require './common/common.php';

	
	//var_dump($_POST);
//echo $data['obj'];
//判断
if($_POST['user_id']){//判断是登录操作
	$data=$_POST;
	//判断session里存的验证码是否和获取的验证码相同
    if($_POST['code'] != $_SESSION['code']){
        $r['result'] = 'invail_code';
        echo json_encode($r);
        exit;
    }
    unset($_POST['code']);
	unset($data['code']);
	
	if($data['obj']=='user'){//判断是用户登录
		//echo $data['user_id'];
		 $row= $db->getOneData('user', '*', 'user_id="'.$data['user_id'].'"');
	}
	 else if($data['obj']='admin'){//判断是管理员登录
		
	 	
	 	 $row= $db->getOneData('admin', '*','admin_id = "' . $data['user_id'].'"');
	 }
	 	 //验证账号是否存在
	  if($row){
	 	//账号存在就验证密码是否正确
	 	
	 	if($row['passwd']!=md5($_POST['passwd'])){
	 		$r['result']='err';
	 		echo json_encode($r);
	        }
	 	else{
	 		$r['result']='success';
	 		 //存储登录用户的信息到SESSION             
   			 $_SESSION['id']= $data['user_id'];
   			 //修改登录信息
   			 $change['loginnum']=$row['loginnum']+1;
   			 $change['lastlogin']=date('Y-m-d H:i:s');
   			 
     $row = $db->updateData($data['obj'], $change, 'user_id ="' .$_SESSION['id'].'"');
   			 echo json_encode($r);
   			 
	 	    }
	    }
	  else{
	 	$r['result']='not_exist';
	 		echo json_encode($r);
	     }

}
else if($_POST['username']){//判断是修改操作

	
    $data=$_POST;
		//var_dump($_FILES);
		$fileurl=$_FILES['userpic']['name'];
		if($fileurl.length==0){
		unset($data['userpic']);
			
		}else{
	$filename = time() .  rand(1000, 2000). urlencode($fileurl);
    $filename = str_replace("%","",$filename); 

    //echo $filename;
    $a = move_uploaded_file($_FILES['userpic']['tmp_name'], './userpic/' . $filename);
// var_dump($a);
   $data['userpic']='./userpic/' . $filename;
		}
		if($data['birthday'].length==0){
		unset($data['birthday']);
			
		}
		//var_dump($data);
 $row = $db->updateData('user', $data, 'user_id ="' .$_SESSION['id'].'"');
if($row){
	  header('Location: person.php?aim=0');
	
	
}
}

?>