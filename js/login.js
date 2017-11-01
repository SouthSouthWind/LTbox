$(document).ready(function(){
	

	//登录的点击事件
	$('#ter').click(function(){
		//console.log(1);
		$('#mask').css('display','block');	
		$('#show').css('display','block');	
		//console.log(2);
		$('#close').click(function(){
			$('#mask').css('display','none');	
		    $('#show').css('display','none');	
		})


		//切换注册按钮的点击事件
		
		$('.dl').click(function(){
			if($('.dl').html()=='注册'){
				$('.dl').html('登录');
				//console.log(3);
				$('#login').css('display','none');	
				$('#reg').css('display','block');
			}else{
				$('.dl').html('注册');
				//console.log(3);
				$('#login').css('display','block');	
				$('#reg').css('display','none');
			}

			})

		//输入框的焦点事件

			//判断登陆输入是否为空
		$('#code').blur(function(){
			
			if(!$('#code').val()){
				$('.code_tip').html("验证码必填");
				$("#code").css("borderColor","red");
				return;
			}
			else{
				$('.code_tip').html("");
			}
		})
		$('#user_id').blur(function(){
			if(!$('#user_id').val()){
		

				$('.user_tip').html("账号必填");
				$("#user_id").css("borderColor","red");
				return;
			}
			else{
				$('.user_tip').html("");
			}
		})
		$('#passwd').blur(function(){
			
			if(!$('#passwd').val()){
				$('.passwd_tip').html("密码必填");
				$("#passwd").css("borderColor","red");
				return;
			}
			else{
				$('.passwd_tip').html("");
			}
		})
	//判断注册输入框是否为空
		$('#reg_code').blur(function(){
			
			if(!$('#reg_code').val()){
				$('.reg_code_tip').html("验证码必填");
				$("#reg_code").css("borderColor","red");
				return;
			}
			else{
				$('.reg_code_tip').html("");
			}
		})


		$('#reg_user_id').blur(function(){
			if(!$('#reg_user_id').val()){


				$('.reg_tip').html("账号必填");
				$("#reg_user_id").css("borderColor","red");
				return;
			}
			else{
				$('.reg_tip').html("");
			}
		})


		$('#reg_passwd').blur(function(){
		
			if(!$('#reg_passwd').val()){
				$('.reg_pass_tip').html("密码必填");
				$("#reg_passwd").css("borderColor","red");
				return;
			}
			else{
				$('.reg_pass_tip').html("");
			}
		})


		$('#re_reg_passwd').blur(function(){
			
			if(!$('#re_reg_passwd').val()){
				$('.re_pass_tip').html("密码必填");
				$("#re_reg_passwd").css("borderColor","red");
				return;
			}
			else{
				$('.re_pass_tip').html("");
			}
		})
		
		
		
		
	})
})
