<?php 
session_start();
include 'includes/header.php'; ?>

<body class="hold-transition login-page bg">
<div class="login-box">
  	<div class="login-logo">
  		<b style = "margin: -25px; text-transform: uppercase">Online Voting System</b>
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
			if(isset($_SESSION['success'])){
				echo "
					<div class='alert alert-success alert-dismissible'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<h4><i class='icon fa fa-check'></i> Success!</h4>
					".$_SESSION['success']."
					</div>
				";
				unset($_SESSION['success']);
			}
  		?>
  	<div class="login-box-body">
    	<h3 class="login-box-msg" style = "font-weight: bold; font-variant: small-caps; font-family: Times, serif">Forgotten Password</h3>
        <hr>
    	<form action="recover.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="voter" placeholder="Student's ID" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
            <div class="modal-footer">
                <button type="button" onclick= "parent.location='index.php'" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="generate"><i class="fa fa-check-square-o"></i> Generate Token</button>
            </div>
    	</form>
  	</div>
</div>
</body>
</html>