$(document).ready(function() {

	//验证码点击刷新事件
	$('#ycode').click(function(event) {
		/* Act on the event */
		this.src = './coder.php?v=' + Math.random();
	});

	//验证码点击刷新事件
	$('#reg_ycode').click(function(event) {
		/* Act on the event */
		this.src = './coder.php?v=' + Math.random();
	});

	//注册
	$("#reg_btn").click(function() {

		if($('#reg_passwd').val() == '' || $('#re_reg_passwd').val() == '' || $('#reg_user_id').val() == '') {
			alert('账号或密码不能为空！');
			return;
		} else if($('#reg_code').val() == '') {
			alert('请输入验证码！');
			return;
		} else if($('#reg_passwd').val() != $('#re_reg_passwd').val()) {
			$('.re_pass_tip').html("密码不同！！");
			return;
		} else {

			$.ajax({
				url: './registersubmit.php',
				type: 'POST',
				dataType: 'json',
				data: $('#reg').serialize(), //对整个表单的数据进行序列化
				success: function(data) {
					if(data.result == 'invail_code') {
						alert('验证码错误！');
					} else if(data.result == 'id_exist') {
						alert('账号已被注册！');
					} else if(data.result == 'success') {
						alert('创建成功！');

					} else if(data.result == 'fail') {
						alert('创建失败！');
					}

				}
			})
		}

	})

	//登录
	$("#login_btn").click(function() {

		//判断账户和密码是否为空
		if($('#code').val() == '') {

			alert("验证码必填");
			return;
		}
		if($('#user_id').val() == '') {

			alert("账号必填");
			return;
		}
		if($('#passwd').val() == '') {
			alert("密码必填");
			return;
		}

		var obj = $("input:radio[name='obj']:checked").val();

		if(obj == "user") {
			$.ajax({
				url: 'personsubmit.php',
				type: 'POST',
				dataType: 'json',
				data: $('#login').serialize(), //对整个表单的数据进行序列化
				success: function(data) {
					if(data.result == 'invail_code') {

						alert('验证码错误！');

					} else if(data.result == 'not_exist') {

						alert('账号不存在,请重新输入账号！');

					} else if(data.result == 'success') {
						alert('登录成功！');
						window.location.href = 'HomePage.php';
						
					} else if(data.result == 'err') {
						alert('密码错误，请输入正确密码！');
					}

				}
			})
		} else {

			$.ajax({
				url: 'personsubmit.php',
				type: 'POST',
				dataType: 'json',
				data: $('#login').serialize(), //对整个表单的数据进行序列化
				success: function(data) {
					if(data.result == 'invail_code') {

						alert('验证码错误！');

					} else if(data.result == 'not_exist') {

						alert('账号不存在,请重新输入账号！');

					} else if(data.result == 'success') {

						alert('登录成功！');
						window.location.href = 'addcate.php';
					} else {
						alert('密码错误，请输入正确密码！');
					}

				}
			})
		}

	})
	var is_search = true;
	var search_input;
	var SearchInput;

	$(".search").click(function() {

		if(is_search) {
			clearInterval(SearchInput);
			is_search = false;
			search_input = $("<input/>");
			search_input.attr('type', 'text');
			search_input.css({
				'width': '0px',
				"height": "50px",
				'background': 'white',
				'position': "absolute",
				'right': '550px',
				'borderRadius': '3px',
				'top': '5px',
				'display': 'block'
			});
			$(".nav").append(search_input);

			SearchInput = setInterval(function() {

				var width = parseInt(search_input.css('width'));
				var target = 600;
				var leng = (target - width) / 10;
				search_input.css('width', width + leng + 'px');
			}, 10)
		} else {
			is_search = true;
			//清除定时器
			clearInterval(SearchInput);
			//关闭搜索框
			SearchInput = setInterval(function() {
				width = parseInt(search_input.css('width'));
				target = 0;
				var leng = (target - width) / 10;
				search_input.css('width', width + leng + 'px');
				//console.log(parseInt(search_input.css('width')));
				//如果宽度小于5就移除搜索框
				if(parseInt(search_input.css('width')) <= 5) {
					//console.log(search_input);
					clearInterval(SearchInput);
					search_input.remove();

				}

			}, 10)
			if(search_input.val()) {
				var $val = search_input.val();
				window.location.href = './searchgoods.php?txt=' + $val;
			}
			//关闭搜索框结束
		}
		//查找事件结束
	});

	$('#saveplace').unbind('click').click(function() {
		if($('#edithidden')) {

			$.ajax({
				url: './addaddress.php',
				type: 'POST',
				dataType: 'json',
				data: $('#changeaddress').serialize(), //对整个表单的数据进行序列化
				success: function(data) {

					if(data.result == 'success') {
						$("input[type='hidden']").remove();

						alert('操作成功！');

						location.reload();
					} else {
						alert('操作失败');
					}
				}
			})
		} else {
			$.ajax({
				url: './addaddress.php',
				type: 'POST',
				dataType: 'json',
				data: $('#changeaddress').serialize(), //对整个表单的数据进行序列化
				success: function(data) {

					if(data.result == 'success') {
						alert('操作成功！');

						location.reload();
					} else {
						alert('操作失败');
					}
				}
			})
		}

		//添加地址事件结束
	});

	$('.delplace').unbind('click').click(function() {
		//console.log(66);

		$address_id = $(this).attr('address_id');
		console.log($address_id);
		$del = $(this).attr('del');

		$.ajax({
			url: './addaddress.php',
			type: 'POST',
			dataType: 'json',
			data: {
				address_id: $address_id,
				del: $del
			}, //对整个表单的数据进行序列化
			success: function(data) {
				if(data.result == 'success') {
					alert('操作成功！');

					location.reload();
				} else {
					alert('操作失败');
				}
			}
		})

		//删除地址事件结束
	});

	$('.changeplace').unbind('click').click(function() {

		address_id = $(this).attr('address_id');
		edit = $(this).attr('edit');

		$('#receiver').val($(this).siblings('.showusername').html());
		$('#receivetel').val($(this).siblings('.telshow').html());
		$('#address').val($(this).siblings('.showaddress').html());

		var hidden = $('<input />');
		hidden.attr({
			'name': 'edit',
			'type': 'hidden',
			'id': 'edithidden'
		});
		hidden.val(edit);

		var hidden2 = $('<input />');
		hidden2.attr({
			'name': 'address_id',
			'type': 'hidden'
		});
		hidden2.val(address_id);

		$("#changeaddress").append(hidden2);
		$("#changeaddress").append(hidden);

		//修改地址事件结束
	});

	$('#toorderform').click(function() {
		console.log(666);
		var obj = {
			goods_id: $('#goods_id').val(),
			count: $('#count').val(),

		}
		$.ajax({
			url: 'imdiatepay.php',
			type: 'POST',
			dataType: 'json',
			data: obj, //对整个表单的数据进行序列化
			success: function(data) {

				window.location.href = 'pay.php?data=' + data;

			}
		})
	})

	$('.addshopcar').click(function() {

		$.ajax({
				url: 'addshopcar.php',
				type: 'GET',
				dataType: 'json',
				data: {
					goods_id: $(this).attr('goods_id')
				},
				success: function(data) {
					if(data.result == 'success') {
						alert('添加成功');
					} else if(data.result == 'fail') {
						alert('添加失败');
					}

				}
			}

		)

	});

	$('#toshopcar').click(function() {
		var goodsinfo = {
			goods_id: $('#goods_id').val(),
			count: $('#count').val()
		};
		$.ajax({
				url: 'addshopcar.php',
				type: 'GET',
				dataType: 'json',
				data: goodsinfo, //对整个表单的数据进行序列化
				success: function(data) {
					if(data.result == 'success') {
						alert('添加成功');
					} else if(data.result == 'fail') {
						alert('添加失败');
					}

				}
			}

		)

	});

	$('#pay').unbind('click').click(function() {

		$.ajax({
			url: 'addorder.php',
			type: 'POST',
			dataType: 'json',
			data: $('#shopcarform').serialize(), //对整个表单的数据进行序列化
			success: function(data) {
				var str = '?';
				for(var i = 0; i < data.length; i++) {
					str += 'order' + i + '=' + data[i] + '&';
				}

				window.location.href = 'pay.php' + str;

			}
		})

	});

	$('#submitform').unbind('click').click(function() {
		console.log(666);
		var $orderarr = [];

		$orderarr.push($("input[name='address']:checked").val());
		for(var i = 0; i < $("input[type='hidden']").length; i++) {
			$orderarr.push($($("input[type='hidden']")[i]).val());

		}

		if(confirm('是否确认付款')) {
			$.ajax({
				url: 'delorder.php',
				type: 'GET',
				dataType: 'json',
				data: {
					orderarr: $orderarr
				}, //对整个表单的数据进行序列化
				success: function(data) {
					if(data.result == 'success') {
						alert('下单成功！');
						window.location.href = 'showorder.php?aim=3';
						// location.reload();
					} else {
						alert('下单失败');
					}

					//window.location.href = 'pay.php';
				}
			})

		}
	})
	//评论部分
	$('.comments').each(function() {
		$(this).click(function() {
			$('.inputcomment').css('display', 'block');
			$('#comment_order_id').val($(this).attr('order_id'));

		})
	})

	//document事件结束
});