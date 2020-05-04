<section class="page page-dashboard">
    <!-- PAGE-TITLE -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="actions-ctrl text-md-right text-center">
                    <a href="#" data-toggle="modal" data-target="#add_company" class="v-btn v-btn-secondary">Add Company</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title large text-center">
                    <span class="title-icon"><i class="fa fa-cube"></i></span>List of Companies
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
        <div class="container">

           <?php  $session = session();  echo $session->getFlashdata('Message'); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="block no-padding">
                        <div class="content table-responsive">
                            <table  id="example" class="block nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Contact person</th>
                                        <th>Phone No.</th>
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
             <td><?php echo $user['contact_person']; ?></td>
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
              <a href="<?= base_url('client-login/'.$user['id']); ?>" class="icon icon-sm icon-secondary login" title="Login As" id="<?= $user['id']; ?>"><i class="fa fa-sign-in-alt"></i></a>
            <a href="#" class="icon icon-sm icon-secondary edit-user" data-id="<?=$user['id'];?>" data-type='3' data-toggle="modal" data-target="#edit-company" data-modal="company" title="Edit User"><i class="fa fa-pencil-alt"></i></a>
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

<!---Add Company--->
<div class="modal fade" tabindex="-1" role="dialog" id="add_company">
    <?= \Config\Services::validation()->listErrors(); ?>

    
    
     <form action="javascript:void(0)" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Company</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <div class="content">
            
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Company Name</label>
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
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Contact Person</label>
                    <?=form_input(
                            array
                            ( 
                                'name'  => 'contact_person', 
                                'value' => set_value('contact_person'), 
                                'class' => 'form-control', 
                                'placeholder' => ''
                                
                            )); 
                    ?>
                </div>
            </div>
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
        <button type="submit" id="send_form" class="v-btn v-btn-primary">Add Company</button>
      </div>
    </div>
  </div>
  </form>
</div>


<!---Delete Company--->
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
                                    <h2 class="ft-lg fw-600 text-center">Do you wish to permanently delete this entry <span class="fw-600 name"></span>?</h2>
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



<!---Edit Company--->
<div class="modal fade" tabindex="-1" role="dialog" id="edit-company">
    <?= \Config\Services::validation()->listErrors(); ?>

     <form action="javascript:void(0)" name="edit_company" id="edit_company_form" method="post" accept-charset="utf-8">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Company</h5>
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
        <button type="submit" id="send_company_form" data-type="company" class="v-btn v-btn-primary">Update Company</button>
      </div>
    </div>
  </div>
  </form>
</div>
<script src="src/js/jquery.js"></script> 
 
<script src="src/js/jquery.validate.js"></script>  
 
<script src="src/js/additional-methods.min.js"></script>

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
    contact_person: {
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
     contact_person: {
        required: "Please enter contact person name",
      },
      phone: {
        required: "Please enter contact no",
      },
         
    },
    submitHandler: function(form) {
      $('#send_form').html('Sending..');
      $.ajax({
        url: "<?php echo base_url('insert-company') ?>",
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
                $.each(response.msg, function (key, value) {
                        
                        $("." + key).html(value).css('color', 'red');
                    });
            }
        }
      });
    }
  })
}
</script>

<script>
   if ($("#edit_company_form").length > 0) {
      $("#edit_company_form").validate({
      
    rules: {
      name: {
        required: true,
      },
  
      email: {
        required: true,
        maxlength: 50,
        email: true,
      }, 
    contact_person: {
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
     contact_person: {
        required: "Please enter contact person name",
      },
      phone: {
        required: "Please enter contact no",
      },
         
    },
    submitHandler: function(form) {
      $('#send_company_form').html('Sending..');
      $.ajax({
        url: "<?php echo base_url('ajaxUpdateCompany') ?>",
        type: "POST",
        data: $('#edit_company_form').serialize(),
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
                $.each(response.msg, function (key, value) {
                        
                        $("." + key).html(value).css('color', 'red');
                    });
            }
        }
      });
    }
  })
}
</script>