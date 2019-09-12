$(function(){
	var error  = $("#error");
	$("#email").on("blur",function(){

		$.ajax({

			url:"emailExist.php",
			data:"email="+$("#email").val(),
			dataType:"html",
			type:"GET",
			success:function(data,status)
			{
				console.log(status);
				error.show().text(data);
				if(data !== ""){
					error.siblings("input").css("border-color","rgb(185, 74, 72)");

				}
			}
		});

	});
});
