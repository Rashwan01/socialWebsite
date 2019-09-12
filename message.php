<?php 
ob_start();
session_start();
include "helper/init.php";
include "classes/posts.php";
include "classes/users.php";
include "classes/msg.php";
include "func.php";
// if user login fetch his data here else redirect to login oage

if(!$_SESSION['NoBack']|| !$_SESSION['email'])
{
	header("location:login.php");
}
else
{
	$sql = $conn->prepare("select * from users where email = ?");
	$sql->execute(array($_SESSION['email']));
	$data = $sql->fetch();
	$totalISerLike = $data['num_likes'];




}
if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$mypic = $data['profile_pic'];
	$user_to = $_POST['user_to'];
	// info about user_to who want to call him
	$user_to_info = new users($conn,$user_to);
	$to_fullname = $user_to_info->full_name();
	$to_pic = $user_to_info->profileImg();

	$msg = new msg($conn,$data['username']);
	$msgs = $msg->GetMesgs($user_to);

	$str = "
	<div class='chat' id='chat1'>
	<div class='top'>
	<div class='container'>
	<div class='col-md-12'>
	<div class='inside'>
	<a href='#'><img class='avatar-md' src='$to_pic' data-toggle='tooltip' data-placement='top' title='Keith' alt='avatar'></a>
	<div class='status'>
	<i class='material-icons online'>fiber_manual_record</i>
	</div>
	<div class='data'>
	<h5><a href='#'>$to_fullname</a></h5>
	<span>Active now</span>
	</div>
	<button class='btn connect d-md-block d-none' name='1'><i class='material-icons md-30'>phone_in_talk</i></button>
	<button class='btn connect d-md-block d-none' name='1'><i class='material-icons md-36'>videocam</i></button>
	<button class='btn d-md-block d-none'><i class='material-icons md-30'>info</i></button>
	<a href='chat.php'> back</a>
	<!--
	<div class='dropdown'>
	<button class='btn' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='material-icons md-30'>more_vert</i></button>
	<div class='dropdown-menu dropdown-menu-right'>
	<button class='dropdown-item connect' name='1'><i class='material-icons'>phone_in_talk</i>Voice Call</button>
	<button class='dropdown-item connect' name='1'><i class='material-icons'>videocam</i>Video Call</button>
	<hr>
	<button class='dropdown-item'><i class='material-icons'>clear</i>Clear History</button>
	<button class='dropdown-item'><i class='material-icons'>block</i>Block Contact</button>
	<button class='dropdown-item'><i class='material-icons'>delete</i>Delete Contact</button>
	</div>
	</div>
	-->
	</div>
	</div>
	</div>
	</div>
	<div style='    height: 600px !important;
	' class='content mt-3' id='content'>
	<div class='container'>
	<div class='col-md-12'>

	";


	if(!empty($msgs))
	{
		foreach ($msgs as $msg) {


			$date = $msg['date'];
			$date =convertTime($date);
			if($msg['user_from'] ==$data['username'])
			{

				$str .="
				<div class='message me'>
				<div class='text-main'>
				<div class='text-group me'>
				<div class='text me'>
				<p>$msg[body]</p>
				</div>
				</div>
				<span>$date</span>
				</div>
				</div>
				";
			}
			elseif($msg['user_from'] != $data['username'])
			{
				$str .="


				<div class='message'>
				<img class='avatar-md' src='$to_pic' data-toggle='tooltip' data-placement='top' title='Keith' alt='avatar'>
				<div class='text-main'>
				<div class='text-group'>
				<div class='text'>
				<p>$msg[body]</p>
				</div>
				</div>
				<span>$date</span>
				</div>
				</div>";
			}


		}
		
	}
						// no conversation happened yet
	else
	{
		$str.="<div class='no-messages'>
		<i class='material-icons md-48'>forum</i>
		<p>Seems people are shy to start the chat. Break the ice send the first message.</p>
		</div>	";
	}


	$str .=	"<div class='container ffff'>
	<div class='col-md-12'>
	<div class='bottom'>
	<form action='chat_send_msg.php'  method= 'post' class='position-relative w-100 '>
	<input type='hidden' name='user_to' value='$user_to'>
	<textarea name='msg_body' class='form-control' placeholder='Start typing for reply...' rows='1'></textarea>
	<button type='button' class='btn emoticons'><i class='material-icons'>insert_emoticon</i></button>
	<button  type='button' class='btn send send-msg '><i class='material-icons'>send</i></button>
	</form>
	<label>
	<input type='file'>
	<span class='btn attach d-sm-block d-none'><i class='material-icons'>attach_file</i></span>
	</label> 
	</div>
	</div>
	</div>
	</div>
	<script>

	$('textarea[name=msg_body]').on('keyup',function(e){
		if(e.keyCode === 13)
		{
			$('.send-msg').click();
		}
		
		});
		$('.send-msg').on('click',function(e){
			e.preventDefault();
			var msg_to =  $(this).parent().find('input[name=user_to]').val();
			var msg_body =  $(this).parent().find('textarea[name=msg_body]').val();
			console.log(msg_to);
			console.log(msg_body);
			$.ajax({

				url:'chat_send_msg.php',
				data:'user_to='+msg_to+'&msg_body='+msg_body,
				type:'post',
				success:function(data){
					$('textarea[name=msg_body]').html('');
					$('textarea[name=msg_body]').val('') ;


				}
				});
				$.ajax({

					url:'message.php',
					data:'user_to='+msg_to,
					type:'post',
					success:function(data){
						$('#chatoo').html(data);
						},
						})



						});

						$('#content').scrollTop($('#content> .container').innerHeight());

						</script>
						";
						echo $str;

					}

					?>

