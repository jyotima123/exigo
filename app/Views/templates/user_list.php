<section class="page page-dashboard">
    <!-- PAGE-TITLE -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="actions-ctrl text-md-right text-center">
                        <a href="add_user.php" data-toggle="modal" data-target="#add_user" class="v-btn v-btn-secondary">Add User</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title large text-center">
                        <span class="title-icon"><i class="fa fa-user"></i></span>User List
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-FILTER -->
    <!-- <div class="page-filter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="filter-list">
                        <li>
                            <div class="dropdown">
                                <a href="#" class="v-btn v-btn-primary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                                    <i class="fa fa-download"></i>  
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="profile.php">CSV</a>
                                    <a class="dropdown-item" href="adminAccount.php">EXCEL</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <input type="text" class="form-control" placeholder="Seach record">
                        </li>
                        <li>
                            <a href="#" class="v-btn v-btn-primary btn-block">Search</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <!-- PAGE-CONTENT -->
    <div class="page-content">
         <?php  $session = session();  echo $session->getFlashdata('Message'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block no-padding">
                        <div class="content table-responsive">
                            <table id="example" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php if($users): ?>
          <?php $i=1; foreach($users as $user): ?>
          <tr>
             <td><?php echo $i; ?></td>
             <td><?php echo $user['user_name']; ?></td>
             <td><?php echo $user['email']; ?></td>
             <td><?php echo '+1'.' '.$user['area_code'].' '.$user['contact_no']; ?></td>
             <td> <?php if($user['status'] == 0){
                        $checked = ''; 
                        $background = 'background:grey';
                    } else {
                        $checked = 'checked';
                        $background = 'background:#0fc3c9';
                    }?>
                    <input class="tgl tgl-light status" id="<?=$user['id'];?>" type="checkbox" <?php echo $checked;?>/>
                    <label class="tgl-btn" for="<?=$user['id'];?>"></label></td>
             <td>
              
            <a href="#" class="icon icon-sm icon-secondary edit-user" data-id="<?=$user['id'];?>" data-type='3' data-toggle="modal" data-target="#edit-user" data-modal="user" title="Edit User"><i class="fa fa-pencil-alt"></i></a>
            <a href="#" id="delete" data-id="<?=$user['id'];?>" data-target="#confirmation" data-toggle="modal" data-type="entry" data-name="users" title="Delete User" class="icon icon-sm icon-primary delete"><i class="fa fa-times"></i></a>
              </td>
          </tr>
         <?php $i++; endforeach; ?>
         <?php endif; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<div class="modal fade" tabindex="-1" role="dialog" id="add_user">
    <?= \Config\Services::validation()->listErrors(); ?>

    
    
     <form action="javascript:void(0)" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <div class="content">
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Name</label>
                     <input type="text" name="name" class="form-control" id="formGroupExampleInput">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Email</label>
                     <input type="text" name="email" class="form-control" id="email">
                    <div class="email"></div>
                </div>
            </div>
            <!-- <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="">
                </div>
            </div> -->
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Phone No.</label>
                      <div class="row">
                    <div class="col-md-2">
                      <div class="input-group">
                        <input type="text" class="form-control" id="" readonly="" value="+1">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="input-group">
                        <input type="text" class="form-control" name="area_code" id="area_code" value="" onkeypress="return isareaNumber(event)">
                      </div>
                    </div>
                    <div class="col-md-7">
                    <div class="input-group">
                        
                    <?=form_input(
                            array
                            ( 
                                'name'  => 'phone', 
                                'id'  => 'phone',
                                'value' => set_value('phone'), 
                                'class' => 'form-control', 
                                'placeholder' => '',
                                'onkeypress'=>'return isNumber(event)'
                                
                            )); 
                    ?>
                  </div>
                </div>
              </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="v-btn v-btn-base" data-dismiss="modal">Close</button>
        <button type="submit" id="send_form" class="v-btn v-btn-primary">Add User</button>
      </div>
    </div>
  </div>
</form>
</div>



<!---Edit user--->
<div class="modal fade" tabindex="-1" role="dialog" id="edit-user">
    <?= \Config\Services::validation()->listErrors(); ?>

     <form action="javascript:void(0)" name="edit_user" id="edit_user_form" method="post" accept-charset="utf-8">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <div class="content">
            
            <div class="inner_form"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="v-btn v-btn-base" data-dismiss="modal">Close</button>
        <button type="submit" id="send_company_form" data-type="user" class="v-btn v-btn-primary">Update User</button>
      </div>
    </div>
  </div>
  </form>
</div>


<!---Delete user--->
<div class="modal fade" tabindex="-1" role="dialog" id="confirmation">
  
    
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form id='delete-data'>
        <input type="hidden" name="id" id="id" value="">
        <input type="hidden" name="user_active" value="0">
        <input type="hidden" name="mode" id="mode" value="">
    </form>
      <div class="modal-body">
        <div class="content">
            
            <div class="row">
                        <div class="col-md-12">
                            <div >
                                <div>
                                    <h2 class="ft-lg fw-600 text-center">Do you wish to permanently delete this user? Alternatively, you can also deactivate him/her. </h2>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
      </div>
      <div class="modal-footer">
       <button type="button" class="v-btn v-btn-base" data-dismiss="modal">Close</button>
        <button type="button" id="deleteConfirm" class="v-btn v-btn-primary btn-sm" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
 
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

<script>
   function isNumber(evt) 
  { var val = $('#phone').val();
      if(val.length>6)
        return false;
    var charCode = (evt.which) ? evt.which : evt.keyCode; if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false; return true; 
  } 

  function isareaNumber(evt) 
  { var val = $('#area_code').val();
      if(val.length>2)
        return false;
    var charCode = (evt.which) ? evt.which : evt.keyCode; if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false; return true; 
  } 

   if ($("#ajax_form").length > 0) {
      $("#ajax_form").validate({
      
    rules: {
      name: {
        required: true,
      },
  
      email: {
        required: true,
        maxlength: 50,
        email: true,
      }, 
    password: {
        required: true,
      },
      phone: {
        required: true,
      },
      
    },
    messages: {
        
      name: {
        required: "Please enter name",
      },
      email: {
        required: "Please enter valid email",
        email: "Please enter valid email",
        maxlength: "The email name should less than or equal to 50 characters",
        },      
     password: {
        required: "Please enter password",
      },
      phone: {
        required: "Please enter contact no",
      },
         
    },
    submitHandler: function(form) {
      $('#send_form').html('Sending..');
      $.ajax({
        url: "<?php echo base_url('user_list') ?>",
        type: "POST",
        data: $('#ajax_form').serialize(),
        dataType: "json",
        success: function( response ) {
            // console.log(response);
            // console.log(response.success);
            
            if(response.success == true)
            {
                document.getElementById("ajax_form").reset();
                $(".close").click();
                window.location.href = "<?php //echo current_url();?>";
            }
            else{
               $('#send_form').html('Add User');
                $(".email").html(response.email).css('color', 'red');
            }
        }
      });
    }
  })
}
</script>

<script>
   if ($("#edit_user_form").length > 0) {
      $("#edit_user_form").validate({
      
    rules: {
      name: {
        required: true,
      },
  
      email: {
        required: true,
        maxlength: 50,
        email: true,
      }, 
    
      phone: {
        required: true,
      },
      
    },
    messages: {
        
      name: {
        required: "Please enter name",
      },
      email: {
        required: "Please enter valid email",
        email: "Please enter valid email",
        maxlength: "The email name should less than or equal to 50 characters",
        },      
     
      phone: {
        required: "Please enter contact no",
      },
         
    },
    submitHandler: function(form) {
      $('#send_company_form').html('Sending..');
      $.ajax({
        url: "<?php echo base_url('ajaxUpdateUser') ?>",
        type: "POST",
        data: $('#edit_user_form').serialize(),
        dataType: "json",
        success: function( response ) {
            // console.log(response);
            // console.log(response.success);
            if(response.success == true)
            {
                
                $(".close").click();
                window.location.href = "<?php //echo current_url();?>";
            }
            else{
              $('#send_company_form').html('Update User');
                $(".email").html(response.email).css('color', 'red');
            }
        }
      });
    }
  })
}
</script>