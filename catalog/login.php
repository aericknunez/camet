<!DOCTYPE html>
<html lang="en">
<head>
	<title>Iniciar Sesi&oacuten</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
		<!-- PARA LOGIN -->
		<script type="text/JavaScript" src="assets/login/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/login/forms.js"></script> 
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="login/images/img-01.png" alt="IMG">
				</div>

				<!-- <form class="login100-form validate-form"> -->
				<form action="application/includes/process_login.php" method="post" name="login_form" class="login100-form validate-form" > 
					<span class="login100-form-title">
						<a href="?user=cocina@copacabana.com&pass=Copa1234" class="btn-floating btn-sm"><i class="fa fa-tv red-text fa-2x"></i></a>	
						Iniciar Sesi&oacuten
						<a href="?user=bar@copacabana.com&pass=Copa1234" class="btn-floating btn-sm"><i class="fa fa-beer red-text fa-2x"></i></a>
					</span>
						<?php
				        if (isset($_GET['error'])) {
				            echo '<p class="error">Error Logging In!</p>';
				        }
				        ?>
					<div class="wrap-input100 validate-input" data-validate = "Introduzca un email valido">
						<!-- <input class="input100" type="text" name="email" placeholder="Email"> -->
						<input type="text" name="email" class="input100" 
						<?php if($_REQUEST["user"] != null) echo 'value="'.$_REQUEST["user"].'"'; ?> 
						/>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password necesario">
						<!-- <input class="input100" type="password" name="pass" placeholder="Password"> -->
						<input type="password" 
                             name="password" 
                             id="password" class="input100" 
                             <?php if($_REQUEST["pass"] != null) echo 'value="'.$_REQUEST["pass"].'"'; ?>
                             />

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<!-- <button class="login100-form-btn">
							Login
						</button> -->
						<input type="button" 
                   value="Login" class="login100-form-btn"
                   onclick="formhash(this.form, this.form.password);" />
					</div>

				</form>
			</div>
		</div>
	</div>

	

	
<!--===============================================================================================-->	
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>