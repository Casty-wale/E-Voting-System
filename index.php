<?php
  	session_start();

    if(isset($_SESSION['voter'])){
      header('location: home.php');
    }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page bg">
<div class="login-box">
  	<div class="login-logo">
  		<b style = "text-transform: uppercase">Online Voting System</b>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to cast your vote</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="voter" placeholder="Student's ID" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<hr>
      		<div class="row">
    			<div class="col-xs-5 pull-right">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
				<div style = "padding: 5px; margin-left: 5%">
					<a href ="recover_model.php">Forgot Password?</a>
				</div>
			</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>