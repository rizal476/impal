<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Jukimart</title>

	<style type="text/css">

		body{
			background: #E5E5E5;
			height:100%; 
			margin:0;
			padding:0;
		}
		.side-photo{
			position: absolute;
			width: 306px;
			height: 100%;
			left: -33px;
			top: 0px;
			background: url(https://images.pexels.com/photos/2622170/pexels-photo-2622170.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
			backdrop-filter: blur(4px);
		}
		.login-form{
			position: absolute;
			width: 400px;
			height: 224px;
			left: 527px;
			top: 200px;

			background: #363740;
			border-radius: 10px;
		}
		.user-form{
			position: absolute;
			width: 300px;
			height: 50px;
			left: 50px;
			top: 30px;
			background: #C4C4C4;
			border-radius: 5px;

			font-family: Prompt;
			font-style: normal;
			font-weight: normal;
			font-size: 24px;
			display: flex;
			align-items: center;
			color: rgba(0, 0, 0, 0.3);
		}
		.pass-form{
			position: absolute;
			width: 300px;
			height: 50px;
			left: 50px;
			top: 100px;
			background: #C4C4C4;
			border-radius: 5px;

			font-family: Prompt;
			font-style: normal;
			font-weight: normal;
			font-size: 24px;
			display: flex;
			align-items: center;
			color: rgba(0, 0, 0, 0.3);
		}
		
		.login-btn{
			position: absolute;
			width: 100px;
			height: 40px;
			left: 150px;
			top: 170px;
			background: #51768E;
			border-radius: 5px;
		}
	</style>
</head>
<body>

<div class="side-photo"></div>
<div class="login-form">
		<form method="post" action="<?php echo base_url()?>Welcome/aksiLogin" class="">
			<div>
				<input class="user-form" type="text" name="username" placeholder="Username">
			</div>
			<div>
				<input class="pass-form" type="text" name="password" placeholder="Password">
			</div>
			<div class="container-login100-form-btn">
                <button class="login-btn">
                    Login
                </button>
            </div>
		</form>
</div>

</body>
</html>