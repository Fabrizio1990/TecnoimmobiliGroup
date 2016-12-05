<?php 
if(isset($_COOKIE["authenticated"])) header("Location:index.php");

?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>AdminLTE 2 | Log in</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	  <!-- Bootstrap 3.3.6 -->
	  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	  <!-- iCheck -->
	  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
	  <!-- Jquery validate override custom class -->
	  <link rel="stylesheet" href="css/jquery_validate_override.css">
	  <link rel="stylesheet" href="css/common.css">
	  <link rel="stylesheet" href="css/login.css">
	  <link rel="stylesheet" href="css/responsive_slideshow_background.css">
	  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	  <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <![endif]-->
</head>
<body class="hold-transition login-page">
	<ul class="cb-slideshow">
				<li><span>Image 01</span><div></div></li>
				<li><span>Image 02</span><div</div></li>
				<li><span>Image 03</span><div></div></li>
				<li><span>Image 04</span><div></div></li>
				<li><span>Image 05</span><div></div></li>
				<li><span>Image 06</span><div></div></li>
	</ul>
	<div class="container">
		<div class="login-box">


		  <!-- /.login-logo -->
		  <div class="login-box-body">
				<div class="login-logo">
					<a href="../index.html"><image class="img-responsive LOGO_TECNOIMM" style="width:300px;" src="images/Logo.png"  /></a>
				</div>
			<p class="login-box-msg">Accedi all' area riservata</p>

			<form action="ajax/login.ajax.php" method="POST" id="FORM_LOGIN" >
			  <div class="form-group has-feedback">
				<input id="email" name="email" type="email" class="form-control" <?php if(isset($_COOKIE['email_login'])) echo('value="'.$_COOKIE['email_login'].'"') ?> placeholder="Email">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			  </div>
			  <div class="form-group has-feedback">
				<input type="password" id="password" name="password"  class="form-control" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			  </div>
			  <div class="row">
				<div class="col-xs-8">
				  <div class="checkbox icheck">
					<label>
					  <input <?php if(isset($_COOKIE['email_login'])) echo('checked') ?> name="remember" type="checkbox"> Remember Me
					</label>
				  </div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
				  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>
				<!-- /.col -->
			  </div>
			</form>


		  </div><!-- /.login-box-body -->
		</div><!-- /.login-box -->
	</div><!-- /.container -->


	<!-- jQuery 2.2.3 -->
	<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="plugins/iCheck/icheck.min.js"></script>
	<!-- jQuery validate -->
	<script src="../libs/frontend/jQueryValidate/js/jquery.validate.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="js/login.js"></script>


	<script>
	  $(function () {
		$('input').iCheck({
		  checkboxClass: 'icheckbox_square-blue',
		  radioClass: 'iradio_square-blue',
		  increaseArea: '20%' // optional
		});
	  });
	</script>
</body>
</html>
