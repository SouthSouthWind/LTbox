<?php 
require'./common/admin.common.php';
require'./header.php';
require './beside.php';
$user=$db->getOneData('user',"*",'user_id="'.$_SESSION['id'].'"')
 ?>
	
<link rel="stylesheet" href="css/person.css" type="text/css">
 <div class="person">
		

		<form action="personsubmit.php" method="post" class="changeform" id="personform" enctype="multipart/form-data">
			<label>
			头像:	

			<img class="userpic" src='<?=$user['userpic']?>' />
<!--<input type="hidden" name="userpic" id="userpic" value="img/header.jpg" />-->
			
			<input  type="file"   name="userpic" id="userpicfile"   accept=".png,.jpg,.bnp" onchange="getPhoto(this)" value="<?=$user['userpic']?>"/>
			
			</label>
			
			<label>
				昵称：<input type="text" name="username" class="inputbox" value="<?=$user['username']?>">
			</label>
					
				
			<label>
				性别：<input type="radio" name="sex" checked="checked" value="boy">男
					<input type="radio" name="sex" value="girl">女
				
			</label>
			
            <label>
			生日：<input type="date" name="birthday" class="birthday" value="<?=$user['birthday']?>">
			</label>
			
			 <label>
			地址：<input type="text" class="inputbox" name="useraddress" value="<?=$user['useraddress']?>">
			</lable>
			
			
			<label>
			<input type="submit" class="save" id="submit" value="保存" >
		</label>
		</form>
</div>
<?php
require './footer.php';	
?>
<script>
	 var imgurl = "";  
	
	
   
    function getPhoto(node) {  
        var imgURL = "";  
        try{  
            var file = null;  
            if(node.files && node.files[0] ){  
                file = node.files[0];  
            }else if(node.files && node.files.item(0)) {  
                file = node.files.item(0);  
            }  
            //Firefox 因安全性问题已无法直接通过input[file].value 获取完整的文件路径  
            try{  
                imgURL =  file.getAsDataURL();  
            }catch(e){  
                imgRUL = window.URL.createObjectURL(file);  
            }  
        }catch(e){  
            if (node.files && node.files[0]) {  
                var reader = new FileReader();  
                reader.onload = function (e) {  
                    imgURL = e.target.result;  
                };  
                reader.readAsDataURL(node.files[0]);  
            }  
        }  
        creatImg(imgRUL);  
        return imgURL;  
    }  
  
    function creatImg(imgRUL){  
    	$('.userpic').attr('src',imgRUL);
    	$('#userpic').val(imgRUL);
       
    }  
    
   
</script>  
