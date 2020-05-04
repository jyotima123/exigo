<section class="login-page">
    <div class="login-content bg-img">
        <div class="logo">
            <img src="assets/logo.png" alt="" class="img-fluid">
        </div>
        <!-- <div class="details">
            <h1 class="x-large">Lorem, ipsum<br> dolor sit amet</h1>
            <p>Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Consectetur, pariatur!</p>
        </div> -->
    </div>
    
    <div class="login-form">
        <?= form_open(base_url('/login'), array('id'=>'login'));?>
        <div class="form">
            <?php  $session = session();  echo $session->getFlashdata('Message'); ?>
            <div class="form-header">
                <h1 class="large">Welcome</h1>
                <p>Please enter your login credentials</p>
                <?= \Config\Services::validation()->listErrors(); ?>
            </div>
            <div class="form-fields">
                <div class="form-group">
                    <input type="text" class="v-control" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <input type="password" class="v-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="submit" class="v-btn v-btn-secondary btn-block login-btn">Login</button>
                </div>
            </div>
        </div>
        <?= form_close();?> 
    </div>
</section>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script>
   if ($("#login").length > 0) {
      $("#login").validate({
      
    rules: {
      password: {
        required: true,
      },
  
      email: {
        required: true,
        maxlength: 50,
        email: true,
      },   
    },
    messages: {
        
      password: {
        required: "Please enter password",
      },
      email: {
        required: "Please enter valid email",
        email: "Please enter valid email",
        maxlength: "The email name should less than or equal to 50 characters",
        }, 
    },
  })
}
</script>
