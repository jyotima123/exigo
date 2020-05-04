<section class="page page-dashboard">
    <!-- PAGE-TITLE -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="actions-ctrl text-md-right text-center">
                        <a href="#" data-toggle="modal" data-target="#add_overhead_expense" class="v-btn v-btn-secondary">Add Expense</a>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="title large text-center">
                        <!-- <span class="title-icon"><i class="fa fa-user"></i></span> -->
                        Overhead Expenses
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-FILTER -->
    <!-- <div class="page-filter">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="filter-list">
                        <li>
                            <label for="">Date</label>
                            <input type="date" class="form-control" placeholder="">
                        </li>
                        <li>
                            <a href="#" class="v-btn v-btn-primary btn-block">Filter</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 text-md-right align-self-center">
                    <p>  <label for="">Downlaod files</label></p>
                    <a href="#"><span class="icon icon-sm icon-secondary"><i class="fa fa-file-excel"></i></span></a>
                    <a href="#"><span class="icon icon-sm icon-secondary"><i class="fa fa-file-pdf"></i></span></a>
                    <a href="#"><span class="icon icon-sm icon-secondary"><i class="fa fa-file-csv"></i></span></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- PAGE-CONTENT -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block no-padding">
                        <div class="content table-responsive">
                            <table id="example" class="block nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Expense Name</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($users): ?>
          <?php $i=1; foreach($users as $user): ?>
          <tr>
             <td><?php echo $i; ?></td>
             <td><?php echo $user['expense']; ?></td>
             <td><?php if($user['type']=='overhead') echo 'Overhead Expense'; else echo 'Payroll & Commissions'; ?></td>
             <td> <?php if($user['status'] == 0){
                        $checked = ''; 
                        $background = 'background:grey';
                    } else {
                        $checked = 'checked';
                        $background = 'background:#0fc3c9';
                    }?>
                    <input class="tgl tgl-light setup_status" id="<?=$user['id'];?>" data-name="expenses" type="checkbox" <?php echo $checked;?>/>
                    <label class="tgl-btn" for="<?=$user['id'];?>"></label></td>
             <td>
                <a href="#" class="icon icon-sm icon-secondary edit-user" data-id="<?=$user['id'];?>" data-type='3' data-toggle="modal" data-target="#edit-expense" data-modal="expense" title="Edit expense"><i class="fa fa-pencil-alt"></i></a>

                 <a href="#" id="delete" data-id="<?=$user['id'];?>" data-target="#confirmation" data-toggle="modal" data-type="entry" data-name="expenses" title="Delete Resource" class="icon icon-sm icon-primary delete"><i class="fa fa-times"></i></a>
            </td>
             <?php $i++; endforeach; ?>
         <?php endif; ?>
                                    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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

<div class="modal fade" tabindex="-1" role="dialog" id="add_overhead_expense">
    <?= \Config\Services::validation()->listErrors(); ?>

    
    
     <form action="javascript:void(0)" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Expenses</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <div class="content">
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Expense Name</label>
                    <input type="text" name="expense" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Expense Type</label>
                    <select class="form-control" name="expense_type">
                        <option value="overhead">Overhead Expense</option>
                        <option value="payroll">Payroll & Commissions</option>
                    </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="v-btn v-btn-base" data-dismiss="modal">Close</button>
         <button type="submit" id="send_form" class="v-btn v-btn-primary">Add Expense</button>
      </div>
    </div>
  </div>
</form>
</div>


<!---Edit expense--->
<div class="modal fade" tabindex="-1" role="dialog" id="edit-expense">
    <?= \Config\Services::validation()->listErrors(); ?>

     <form action="javascript:void(0)" name="edit_expense" id="edit_expense" method="post" accept-charset="utf-8">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Expense</h5>
        
      </div>
      <div class="modal-body">
        <div class="content">
            <div class="inner_form"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="v-btn v-btn-base" data-dismiss="modal">Close</button>
        <button type="submit" id="send_form" data-type="expense" class="v-btn v-btn-primary">Update Expense</button>
      </div>
    </div>
  </div>
  </form>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

<script>
   if ($("#ajax_form").length > 0) {
      $("#ajax_form").validate({
      
    rules: {
      expense: {
        required: true,
      },
 
    },
    messages: {
        
      expense: {
        required: "Please enter expense name",
      },
     
         
    },
    submitHandler: function(form) {
      $('#send_form').html('Sending..');
      $.ajax({
        url: "<?php echo base_url('overhead_expenses') ?>",
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
                window.location.href = "<?php echo current_url();?>";
            }
            
        }
      });
    }
  })
}
</script>

<script>
   if ($("#edit_expense").length > 0) {
      $("#edit_expense").validate({
      
    rules: {
      expense: {
        required: true,
      },
 
    },
    messages: {
        
      expense: {
        required: "Please enter expense name",
      },
     
         
    },
    submitHandler: function(form) {
      $('#send_form').html('Sending..');
      $.ajax({
        url: "<?php echo base_url('ajaxUpdateExpense') ?>",
        type: "POST",
        data: $('#edit_expense').serialize(),
        dataType: "json",
        success: function( response ) {
            // console.log(response);
            // console.log(response.success);
            
            if(response.success == true)
            {
                document.getElementById("edit_expense").reset();
                $(".close").click();
                window.location.href = "<?php //echo current_url();?>";
            }
            
        }
      });
    }
  })
}
</script>
