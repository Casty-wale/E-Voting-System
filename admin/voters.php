<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List of Voters
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Voters</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            
              <a href="#addbulk" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Bulk</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Student ID</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Level</th>
                  <th>Program</th>
                  
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql_2 = "SELECT * FROM department INNER JOIN voters ON department.id = voters.department_id";
                    $query = $conn->query($sql_2);
                    while($row1 = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row1['voters_id']."</td>
                          <td>".$row1['firstname']."</td>
                          <td>".$row1['lastname']."</td>
                          <td>".$row1['level']."</td>
                          <td>".$row1['depart_name']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row1['id']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row1['id']."'><i class='fa fa-trash'></i> Delete</button>
                            </td
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/voters_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; 
  $sqlquery = mysqli_query($conn,"SELECT * FROM `department`");
  $dept_names = array();
  while($raw = mysqli_fetch_assoc($sqlquery)){
    array_push($dept_names,$raw['depart_name']);
  }
?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function ucwords (str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'voters_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      let dep = '';
      const dt = <?php echo json_encode($dept_names); ?>; 

      $.each(dt, function(key, value) {
        key = key + 1;
        if(response.department_id === key.toString()) dep = value;
      });

      $('.id').val(response.id);
      $('#edit_voters_id').val(response.voters_id);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_dob').val(response.dob);
      $('#edit_level').val(response.level);
      $('#edit_gender').val(ucwords(response.gender));
      $('#edit_department').val(dep);
      $('#edit_password').val(response.password);
      $('.fullname').html(response.firstname+' '+response.lastname);
      
    }
  });
}

</script>
</body>
</html>
