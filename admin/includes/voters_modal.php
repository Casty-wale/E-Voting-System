<style>
  /*To clear the arrow sign that comes with the number type in Chrome, Safari, Edge, Opera */ 
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
  }

  /*For those using Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
</style>

<?php
  $sqlquery = mysqli_query($conn,"SELECT * FROM department");
?>
<!--To check the length of the numbers inputted
<script>
  if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
</script>-->
<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Voter</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Student ID</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="voters_id" data-bind="value:replyNumber" name="voters_id" min="0" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">First Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Last Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_of_birth" class="col-sm-3 control-label">Date of Birth</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="level" class="col-sm-3 control-label">Level</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="level" name="level">
                        <option>100</option>
                        <option>200</option>
                        <option>300</option>
                        <option>400</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="gender" name="gender">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="department" class="col-sm-3 control-label">Program</label>
                    
                    <div class="col-sm-9">
                      <select class="form-control" id="department" name="department">
                        <?php
                          while($row = mysqli_fetch_array($sqlquery)){
                        ?>  
                        <option><?php echo $row["depart_name"];?></option>
                        <?php }?>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Multiple Users-->
<div class="modal fade" id="addbulk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>*
              <h4 class="modal-title"><b>Add Multiple Voter</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="add_bulk.php" enctype="multipart/form-data">
              
              <label class="control-label" style = "font-weight: lighter;"> <b style = "color: red">Note:</b> 
              The file must must be in an excel file <b class = "text-muted">(.xsl or .xslx) </b> and in the correct table order listed below; <br><br>
              <div style = "text-align: left;"><b class = "text-muted"> *Student ID <br>*First Name <br>*Last Name <br>*Email <br>*Date of birth (formatted YYYY-MM-DD) <br>*Gender <br>*Level <br>*Department <br><br></b></div></label>
                
                <div class="form-group">
                  <label for="upload" class="col-sm-3 control-label">Upload the file</label>
                  
                  <div class="col-sm-9">
                    <input type="file" id="upload" name="upload" required>
                  </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Voter</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_voter_id" class="col-sm-3 control-label">Student ID</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_voters_id" name="voters_id">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">First Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Last Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_of_birth" class="col-sm-3 control-label">Date of Birth</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="edit_dob" name="dob" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="level" class="col-sm-3 control-label">Level</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="edit_level" name="level">
                        <option>100</option>
                        <option>200</option>
                        <option>300</option>
                        <option>400</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="gender" class="col-sm-3 control-label">Gender</label>

                  <div class="col-sm-9">
                    <select class="form-control" id="edit_gender" name="gender">
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="department" class="col-sm-3 control-label">Program</label>
                    <?php
                      $sqlquery = mysqli_query($conn,"SELECT * FROM department");
                    ?>
                    <div class="col-sm-9">
                      <select class="form-control" id="edit_department" name="department">
                        <?php
                          while($row1 = mysqli_fetch_array($sqlquery)){
                        ?>  
                        <option><?php echo $row1["depart_name"];?></option>
                        <?php }?>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE VOTER</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>
