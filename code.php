
<?php session_start(); ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page bg" style="display: inline !important;">
<div class="login-box">
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
  	<div class="login-logo">
  		<b style = "margin: 0px; text-transform: uppercase">Online Voting System</b>
  	</div>
  
  	<div class="login-box-body">
    	<h3 class="login-box-msg" style = "font-weight: bold; font-variant: small-caps; font-family: Times, serif">Validating User</h3>
        <hr>
    	
		<form action = "verification.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="password" class="form-control" name="vcode" placeholder="Enter the validation code..." required>
        		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      		</div>
            <div class="modal-footer">
                <button type="button" onclick= "parent.location='index.php'" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="generate"><i class="fa fa-check-square-o"></i> Reset Password</button>
            </div>
    	</form>
  	</div>
</div>
</body>
</html>