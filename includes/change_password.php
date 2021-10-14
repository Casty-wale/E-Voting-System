<div class="modal fade" id="change_pw">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Change Password</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="change_password_update.php" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="old_password" class="col-sm-3 control-label">Old Password</label>

                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old password..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="new_password" class="col-sm-3 control-label">New Password</label>

                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Input your new password..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="con_password" class="col-sm-3 control-label">Confirm Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="con_password" name="con_password" placeholder="Confirm your new password..." required>
                    </div>
                </div>
                <input type = "hidden" name = "hidden_id" value ="<?php if(isset($id)) echo $id; ?>">
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>