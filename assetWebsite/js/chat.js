$(function(){



	$(".list-chat-once").on("click",function(){
		$("#sidebar").hide();
		var msg_to =  $(this).find("input[name='user_to']").val();
		console.log(msg_to);
		$.ajax({

			url:"message.php",
			data:"user_to="+msg_to,
			type:"post",
			success:function(data){
				$("#chatoo").html(data);
			},
		});
	});	

	

});
