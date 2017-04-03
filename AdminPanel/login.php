<?php
require_once("../config.php");
require_once("../app/classes/SessionManager.php");
if(SessionManager::getVal("authenticated")!= null) header("Location:index.php");

?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>TecnoimmobiliGroup | Log in</title>
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
	  <link rel="stylesheet" href="<?php echo SITE_URL ?>/css/jquery_validate_override.css">
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
		<!-- Top content -->
		<div class="top-content">

			<div class="inner-bg">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2 text">

						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3 form-box">
							<div class="form-top">
								<div class="form-top-left">
									<h3>Entra nell' area riservata</h3>
									<p>Inserisci email e password per accedere:</p>
								</div>
								<div class="form-top-right">
									<img src="<?php echo SITE_URL.'/public/images/images_logos/tecnoimmobili_logo_min.jpg'?>" />
									<!--<i class="fa fa-lock"></i>-->
								</div>
							</div>
							<div class="form-bottom">
								<form role="form" action="ajax/login.ajax.php" method="POST" id="FORM_LOGIN">
									<div class="form-group">
										<label class="sr-only" for="form-email">Username</label>
										<input id="email" name="email" type="email"  placeholder="Email..." class="form-username form-control"  <?php if(isset($_COOKIE['email_login'])) echo('value="'.$_COOKIE['email_login'].'"') ?>>
									</div>
									<div class="form-group">
										<label class="sr-only" for="password">Password</label>
										<input type="password" id="password" name="password" placeholder="Password..." class="form-password form-control" >
									</div>
									<div class="form-group">
												<input <?php if(isset($_COOKIE['email_login'])) echo('checked') ?> name="remember" type="checkbox"> Ricorda email
											</label>
										</div>
									<button type="submit" class="btn">Sign in!</button>
								</form>
							</div><!-- /.form-bottom -->
						</div><!-- /.form-box -->
					</div><!-- /.row -->
				</div> <!-- /.container -->
			</div><!-- /.inner-bg -->

		</div><!-- /.top-content -->
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
	<script src="js/jquery_validate_override.js"></script>
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
