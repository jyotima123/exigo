<nav class="top-header">
  <input type="checkbox" id="check">
  <label for="check" class="checkbtn">
    <i class="fa fa-bars"></i>
  </label>
  <div class="logo">
    <a href="dashboard.php"><img src="https://www.imperialcctv.com/wp-content/themes/imperial-theme/images/logo.png" alt="" class="img-fluid"></a>
  </div>
  <ul class="nav-links">
    <li><a href="adminDashboard.php" class="link"><span class="icon icon-sm"><i class="fa fa-tachometer-alt"></i></span>  Dashboard</a></li>
    <li><a href="addTicket.php" class="link"><span class="icon icon-sm"><i class="fa fa-bars"></i></span> Events</a></li>
    <li><a href="ticketList.php" class="link"><span class="icon icon-sm"><i class="fa fa-cube"></i></span> Request</a></li>
     </ul>
  <div class="account-setting">
      <div class="dropdown">
        <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
           Admin
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="adminAccount.php">Account</a>
          <div class="divider"></div>
          <a class="dropdown-item" href="index.php">Logout</a>
        </div>
      </div>
  </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="confirmation"aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <span class="icon icon-primary icon-lg"><i class="fa fa-check"></i></span>
        <h4 class="mt-3">Deleted Successfully</h4>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="v-btn v-btn-base btn-dark">Go To List</button>
        <button type="button" class="v-btn v-btn-secondary btn-dark">Add More</button>
      </div>
    </div>
  </div>
</div>
