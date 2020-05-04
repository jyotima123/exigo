<section class="page page-dashboard">
    <!-- PAGE-TITLE -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <div class="title large text-center">
                        <!-- <span class="title-icon"><i class="fa fa-user"></i></span> -->
                        Change Password
                    </div>
                </div>
                <!-- <div class="col-12 text-md-right">
                    <div class="actions-ctrl">
                        <a href="#" data-toggle="modal" data-target="#Setup_Initial_Metrics" class="v-btn v-btn-secondary float-right">Setup Initial Metrics</a>
                    </div>
                </div> -->
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
        <?= form_open(base_url('/change-password'), array('id'=>'change_password'));?>
        <div class="container">
            <?php  $session = session();  echo $session->getFlashdata('Message'); ?>

            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="block">
                        <div class="content">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="">Old Password</label>
                                    <input type="hidden" id="old" value="<?= $user['password'];?>"/>
                                    <input type="password" name="old_password" id="old_password" class="form-control" placeholder="">
                                    <div class="old_password" style="color:red;"></div>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="">New Password</label>
                                    <input type="password" name="new_password" class="form-control input-password" placeholder="">
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="footer text-md-right">
                            <button type="submit" class="v-btn v-btn-primary">Update Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
<script>
   if ($("#change_password").length > 0) {
      $("#change_password").validate({
      
    rules: {
      old_password: {
        required: true,
      },
  
     new_password: {
        required: true,
        maxlength: 50,
      },   
    },
    messages: {
        
      old_password: {
        required: "Please enter your old password",
      },
      new_password: {
        required: "Please enter new password",
        }, 
    },
  })
}
</script>
