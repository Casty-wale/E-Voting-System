<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="#" class="navbar-brand"><b>Online Voting</b><sub style ='color:orange; font-size: 15px'> System</sub></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="nav navbar-nav pull-right">
              <a href="#change_pw" style='text-transform: uppercase' data-toggle="modal">Change password<i class="fa fa-pencil fa-fw fa-flip-horizontal" aria-hidden="true"></i>&nbsp;</a>
            </li>
          </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo (!empty($voter['photo'])) ? 'images/'.$voter['photo'] : 'images/profile.jpg' ?>" class="user-image" alt="User Image">
              <span class="hidden-xs" style='text-transform: uppercase'><?php echo $voter['firstname'].' '.$voter['lastname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo (!empty($voter['photo'])) ? 'images/'.$voter['photo'] : 'images/profile.jpg'; ?>" class="img-circle" alt="User Image">

                <p style='text-transform: uppercase'>
                  <?php echo $voter['firstname'].' '.$voter['lastname']; ?>
                  <!-- <small>Member since <php //echo date('M. Y', strtotime($user['created_on'])); ?></small> -->
                </p>
              </li>
              <li class="user-footer">
               <div class = 'text-center'>
                  <a href="#picture" data-toggle="modal" class="btn btn-default btn-flat">Update</a>
                </div>
              </li>
            </ul>
          </li>
          <li><a href="logout.php"><i class="fa fa-sign-out"></i> LOGOUT</a></li>  
        </ul>
      </div>
    </div>
  </nav>
</header>
<?php include 'includes/change_password.php'; ?>
<?php include 'includes/picture_model.php'; ?>