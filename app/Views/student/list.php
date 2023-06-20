<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Demo</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">

  
</head>
<body>
      <div class="container-fluid centeredParagraph">
                <h3 class="card-title">Student List</h3>
              <!-- /.card-header -->
              <div class="card-body ">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Country</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                  </thead>
              <tbody>                

                  <?php 
                  if(count($users) > 0)
                  {
                    foreach($users as $user)
                    {
                  ?>
                  <tr>
                      <td><?= $user->id; ?></td>
                      <td><?= $user->name; ?></td>
                      <td><?= $user->email; ?></td>
                      <td><?= $user->phone; ?></td>
                      <td><?= $user->address; ?></td>
                      <td><?= $user->city; ?></td>   
                      <td><?= $user->state; ?></td>
                      <td><?= $user->country; ?></td>  
                      <td class="project-actions text-right">                        
                        <?php if($user->status == 'active')
                          { ?>
                           <i class="fas fa-eye user_status activeeye" uid="<?= $user->id; ?>" ustatus="<?= $user->status; ?>">
                          </i>
                        <?php }
                        else
                          { ?>
                              <i class="fas fa-eye user_status inactiveeye" uid="<?= $user->id; ?>"  ustatus="<?= $user->status; ?>">
                          </i>
                        <?php } ?>
                      </td> 
                      <td>                        
                      <a class="btn btn-info btn-sm" href="<?= site_url('student/edit/'.$user->id) ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="<?= site_url('student/delete/'.$user->id) ?>">
                              <i class="fas fa-trash">
                              </i>
                          </a>
                          </td>
                  </tr>
                  <?php
                    } 
                  }
                  else
                  {
                  ?>
                    <tr>
                      <td colspan="4">No data found.</td>
                    </tr>
                  <?php
                  }
                  ?>
              </tbody>
                  <tfoot>
                  <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Country</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                <br>
              <a class="btn btn-success float-right" href="<?=site_url('student/create')?>">Add Student</a>
  </div>
                </div>
  <div class="modal modal-danger fade" id="modal_popup">
    <div class="modal-dialog modal-sm">
      <form name="statusform" action="<?php echo base_url(); ?>/student/user_status_changed" method="post"> 
         <div class="modal-content">
            <div class="modal-header" style="height: 150px;">
                <h4 style="margin-top: 50px;text-align: center;">Are you sure, do you change user status?</h4>
                <input type="hidden" name="id" id="user_id" value="">
                <input type="hidden" name="status" id="user_status" value="">
                <button type="submit" name="submit" class="btn btn-success">Yes</button>
            </div>
          </div>
        </form>
    </div>
 </div>
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="<?= base_url() ?>js/jquery.validate.js"></script>  

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
  <link rel="stylesheet" href="<?= base_url() ?>/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<script type="text/javascript">
  $(document).on('click','.user_status',function(){
    var id = $(this).attr('uid'); //get attribute value in variable
    var status = $(this).attr('ustatus'); //get attribute value in variable
    $('#user_id').val(id); //pass attribute value in ID
    $('#user_status').val(status);  //pass attribute value in ID
    $('#modal_popup').modal({backdrop: 'static', keyboard: true, show: true}); //show modal popup
  });
</script>
</body>
</html>