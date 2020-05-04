<div class="app-header">
  <nav class="bg-base">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fa fa-bars"></i>
    </label>
    <div class="logo">
      <a href="index.php"><img src="assets/logo.png" alt=""></a>
    </div>
    <ul class="nav-links">
      <?php $request = \Config\Services::request();
            $segments = $request->uri->getSegments();
            // echo '<pre>'; print_r($segments); exit;

      ?>
      <?php $session = session(); $a = $session->get(); ?>
      <?php if($a['user_manager'] == 0) { ?>

        <li><a href="<?= base_url('/dashboard'); ?>" class="link <?= ($segments[1]=='dashboard')?'active':'' ;?>">Dashboard</a></li>
      <li><a href="<?= base_url('/company'); ?>" class="link <?= ($segments[1]=='company')?'active':'' ;?>">Companies</a></li>
     
      
      <li  class="dropdown">
        <a href="#" class="link dropdown-toggle <?= ($segments[1]=='change-password')?'active':'' ;?>" id="" data-toggle="dropdown">
        My Account
        </a>
        <div class="dropdown-menu nav-dropdown ">
          
          <a class="link" href="<?= base_url('/change-password'); ?>">Change Password</a>
        </div>
      </li>
      <?php } elseif($a['user_manager'] == 1){ ?>
        <?php if($a['setup']==1) { ?>
      <li><a href="<?= base_url('/dashboard'); ?>" class="link <?= ($segments[1]=='dashboard')?'active':'' ;?>">Dashboard</a></li>
    <?php } ?>
      <li  class="dropdown">
        <a href="#" class="link dropdown-toggle <?php if(($segments[1]=='setup_marketing_campaign') || ($segments[1]=='overhead_expenses')  || ($segments[1]=='initial_metrics') ) echo 'active';?>" id="" data-toggle="dropdown">
        Setup
        </a>
        <div class="dropdown-menu nav-dropdown ">
          <a class="link" href="<?= base_url('/setup_marketing_campaign'); ?>">Lead Sources</a>
          <a class="link" href="<?= base_url('/overhead_expenses'); ?>">Expenses</a>
          <a class="link" href="<?= base_url('/initial_metrics'); ?>">Initial Metrics</a>
        </div>
      </li>
      <?php if($a['setup']==1) { ?>
      <li  class="dropdown">
        <a href="#" class="link dropdown-toggle" id="" data-toggle="dropdown">
        Track
        </a>
        <div class="dropdown-menu nav-dropdown ">
          <a class="link" href="<?= base_url('/track_leads'); ?>">Leads</a>
          <a class="link" href="<?= base_url('/track_expenses'); ?>">Expenses</a>
        </div>
      </li>
      <li><a href="report.php" class="link">Reports</a></li>
      <?php } ?>
      <li  class="dropdown">
        <a href="#" class="link dropdown-toggle <?= ($segments[1]=='change-password')?'active':'' ;?>" id="" data-toggle="dropdown">
        My Account
        </a>
        <div class="dropdown-menu nav-dropdown ">
          <?php if($a['setup']==1) { ?>
          <a class="link" href="<?= base_url('/user_list'); ?>">Manage Users</a>
        <?php } ?>
          <a class="link" href="<?= base_url('/change-password'); ?>">Change Password</a>
        </div>
      </li>
    <?php } if($a['is_admin']) {?>
      <li><a href="<?= base_url('/company'); ?>" class="link">Go Back</a></li>
    <?php } else{ ?>
      <li><a href="<?= base_url('/log-out'); ?>" class="link">Logout</a></li>
    <?php } ?>
    </ul>
    <div class="account-setting">
    
    </div>
  </nav>
</div>
