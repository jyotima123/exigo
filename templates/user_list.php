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
                                        <th>Password</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Name</td>
                                        <td>
                                            email@example.com
                                        </td>
                                        <td>Password</td>
                                        <td>Contact</td>
                                        <td>
                                            <input class="tgl tgl-light" id="cb3" type="checkbox"/>
                                            <label class="tgl-btn" for="cb3"></label>
                                        </td>
                                        <td>
                                            <a href="#" class="icon icon-sm icon-secondary " title="Edit Use"><i class="fa fa-pencil-alt"></i></a>
                                            <a href="#" data-target="#confirmation" data-toggle="modal" title="Delete User" class="icon icon-sm icon-primary"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Name</td>
                                        <td>
                                            email@example.com
                                        </td>
                                        <td>Password</td>
                                        <td>Contact</td>
                                        <td>
                                            <input class="tgl tgl-light" id="cb1" type="checkbox"/>
                                            <label class="tgl-btn" for="cb1"></label>
                                        </td>
                                        <td>
                                            <a href="#" class="icon icon-sm icon-secondary " title="Edit Use"><i class="fa fa-pencil-alt"></i></a>
                                            <a href="#" data-target="#confirmation" data-toggle="modal" title="Delete User" class="icon icon-sm icon-primary"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Name</td>
                                        <td>
                                            email@example.com
                                        </td>
                                        <td>Password</td>
                                        <td>Contact</td>
                                        <td>
                                            <input class="tgl tgl-light" id="cb2" type="checkbox"/>
                                            <label class="tgl-btn" for="cb2"></label>
                                        </td>
                                        <td>
                                            <a href="#" class="icon icon-sm icon-secondary " title="Edit Use"><i class="fa fa-pencil-alt"></i></a>
                                            <a href="#" data-target="#confirmation" data-toggle="modal" title="Delete User" class="icon icon-sm icon-primary"><i class="fa fa-times"></i></a>
                                        </td>
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




<div class="modal fade" tabindex="-1" role="dialog" id="add_user">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="content">
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Name</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Password</label>
                    <input type="password" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Phone No.</label>
                    <input type="contact" class="form-control" placeholder="">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="v-btn v-btn-base" data-dismiss="modal">Close</button>
        <a href="company_list.php" class="v-btn v-btn-primary" data-dismiss="modal">Add User</a>
      </div>
    </div>
  </div>
</div>
