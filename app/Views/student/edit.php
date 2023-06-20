<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Demo</title>

  <link rel="stylesheet" href="<?= base_url() ?>style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
</head>
<body>
      <div class="container-fluid centeredParagraph">
    <h2>Edit Student Detail</h2>
        <?php $validation = \Config\Services::validation(); ?>
            <?php
            $errors = $validation->getErrors();
            ?>
            <div class="card-body">
              <form action="<?=site_url('student/update/'.$user['id'])?>" id="editstudent" method="post">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('fail'); ?>
                </div>
                <?php endif ?>
  
                <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?= set_value('name', $user['name']); ?>">
                    <span class="text-danger">
                      <?= isset($validation) ? display_error($validation, 'name') : '' ?>
                    </span>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?= set_value('email', $user['email']) ?>" > 
                    <span class="fielderror margin_bottom <?php echo !empty($email) ? '' : 'none'; ?>" id="email">
                        <?= isset($validation) ? display_error($validation, 'email') : '' ?>  
                    </span>  
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="number" class="form-control" name="phone" value="<?= set_value('phone', $user['phone']) ?>" > 
                    <span class="fielderror margin_bottom <?php echo !empty($phone) ? '' : 'none'; ?>" id="phone">
                        <?= isset($validation) ? display_error($validation, 'phone') : '' ?>  
                    </span>  
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" rows="3"><?= set_value('address', $user['address']) ?></textarea>
                <!-- Error -->
                    <span class="fielderror margin_bottom <?php echo !empty($address) ? '' : 'none'; ?>" id="address">
                    <?= isset($validation) ? display_error($validation, 'address') : '' ?>
                </span>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" value="<?= set_value('city', $user['city']) ?>" > 
                    <span class="fielderror margin_bottom <?php echo !empty($city) ? '' : 'none'; ?>" id="city">
                        <?= isset($validation) ? display_error($validation, 'city') : '' ?>  
                    </span>  
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" class="form-control" name="state" value="<?= set_value('state', $user['state']) ?>" > 
                    <span class="fielderror margin_bottom <?php echo !empty($state) ? '' : 'none'; ?>" id="state">
                        <?= isset($validation) ? display_error($validation, 'state') : '' ?>  
                    </span>  
            </div>
            <div class="form-group">
                <label for="state">Country:</label>
                <input type="text" class="form-control" name="country" value="<?= set_value('country', $user['country']) ?>" > 
                    <span class="fielderror margin_bottom <?php echo !empty($country) ? '' : 'none'; ?>" id="country">
                        <?= isset($validation) ? display_error($validation, 'country') : '' ?>  
                    </span>  
            </div>


          <div class="row">
            <div class="col-12">
              <div class="text-center">
                <button type="submit" class="btn btn-success" name="submit">Submit</button>
              </div>
            </div>
          </div>


      <div class="row">
        <div class="col-12">
          <a class="btn btn-success float-right" href="<?=site_url('student-list')?>">Students List</a>
          <br>
        </div>
      </div>
    </div>
<br>
<br>

  <!-- Google Font: Source Sans Pro -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
  <link rel="stylesheet" href="<?= base_url() ?>/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<script> 
        $('#editstudent').validate({
            rules: {
                name: {
                    required: true,   
                    lettersonly: true
                },
                email: {
                    required: true,  
                    email: true,
                },
                phone: {
                    required: true,
                    number: true, 
                    max_length: 10,
                    min_length: 10,
                },
                address: {
                    required: true,
                },
                city: {
                    required: true,   
                    lettersonly: true
                },
                state: {
                    required: true,  
                    lettersonly: true 
                },
                country: {
                    required: true,   
                    lettersonly: true
                },
            },
            messages: {
                name: {
                    required: 'Please enter name',
                    lettersonly: 'alphabets only allowed',
                },
                email: {
                    required: 'Please enter email',
                    email: 'enter valid email id'
                },
                phone: {
                    required: 'Please enter phone',
                    max_length: 'phone number should be exactly 10 digit',
                    min_length: 'phone number should be exactly 10 digit',
                    number: 'phone number should be only number'
                },
                address: {
                    required: 'Please enter address',
                },
                city: {
                    required: 'Please enter city',
                    lettersonly: 'alphabets only allowed',
                },
                state: {
                    required: 'Please enter state',
                    lettersonly: 'alphabets only allowed',
                },
                country: {
                    required: 'Please enter country',
                    lettersonly: 'alphabets only allowed',
                },
            },
        });

 </script>

</body>
</html>