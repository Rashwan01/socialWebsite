$(function(){


	$(".ti-close").on("click",function(){

		{
			$(".holder").fadeOut(500).addClass("ds-none");
		}
	});
	$(".countFriends").on("click",function(){

		$(".holder").fadeIn(300).removeClass("ds-none");
	});

	$("#imageCover").on("change",function(){

		$("#formSubmitCover").submit();

	});


	$("#imageProfile").on("change",function(){

		$("#formSubmitProfile").submit();

	});


	$(".friend-status").on("click",function(){

		$(this).find(".option").toggleClass("d-none");

	});

	$("#Form-unfollow").on("click",function(){

		$(this).find(".option").toggleClass("d-none");
	});

	$("#moreForm").on("click",function(){

		$(this).find(".option").toggleClass("d-none");
	});


	$("#unfollowIcon").on("click",function(){

		$("#Form-unfollow").submit();
	});


	$(".unfriend").on("click",function(){

		$("#fromFriend").submit();
	});

	$("#blockIcon").on("click",function(){

		$("#moreForm").submit();
	});


	$("#add").on("click",function(){

		$("#fromFriend").submit();
	});

	$("#cancel").on("click",function(){

		$("#fromFriend").submit();
	});

	$("#responed").on("click",function(){

		$("#fromFriend").submit();
	});

	$("#checkPasswordCorrect").on("keyup",function(){

		$.ajax({

			url:"userPasswordStatus.php",
			type:"post",
			dataType:"html",
			data:"password="+$(this).val(),
			success:function(data)
			{
				$("#user_password_invalid").html(data);

				
				if($.trim(data)){   
					$("#submitFormButton").attr("disabled", true);
					$("#user_password_invalid").parent("div").addClass("has-error");
					$("#user_password_invalid").addClass("error");
				}
				if(!$.trim(data))
					{$("#submitFormButton").attr("disabled", false);
				$("#user_password_invalid").parent("div").removeClass("has-error");
				$("#user_password_invalid").removeClass("error");

			}


		}

	});

	});
	$("#searcho").on("keyup",function(){
		$(".searchResult").removeClass("d-none");
		if($(this).val() == "")
		{
			$(".searchResult").addClass("d-none");
		}
		$.ajax({

			url:"search.php",
			type:"post",
			dataType:"html",
			data:"s="+$(this).val(),
			success:function(data){
				$("#resultoo").html(data);

				

			}




		});

	});
	$("#formFollow").on("click",function(){

		$("#formFollow").submit();
	});
	
	$(".unblockingIcon").on("click",function(){

		$(".unblockingForm").submit();
	});
	function a7a(){
							var msg_to = $('.send-msg').parent().find('input[name=user_to]').val();
							$.ajax({

								url:'message.php',
								data:'user_to='+msg_to,
								type:'post',
								success:function(data){
									$('#chatoo').html(data);
									},
									});


								};
								var x = setInterval(a7a, 2000);

});
