<section class="page page-dashboard">
    <!-- PAGE-TITLE -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title large text-center">
                        <!-- <span class="title-icon"><i class="fa fa-user"></i></span> -->
                        Track Expenses
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-FILTER -->
    <div class="page-filter">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="filter-list">
                        <li>
                            <label for="">Date</label>
                            <div class="calander-ctrl">
                                <span class="v-btn v-btn-primary mr-1" data-toggle="tooltip" data-placement="top" title="Click for previous month"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text"  class="form-control datepicker" value="03-04-2020" placeholder="">
                                <span data-toggle="tooltip" data-placement="top" title="Click for next month" class="v-btn v-btn-primary  mr-1" ><i class="fa fa-angle-double-right"></i></span>
                            </div>
                        </li>
                        <!-- <li>
                            <a href="#" class="v-btn v-btn-primary btn-block">Filter</a>
                        </li> -->
                    </ul>
                </div>
                <div class="col-md-4 text-md-right align-self-center">
                    <p><label for="">Downlaod files</label></p>
                    <a href="#"><span class="icon icon-sm icon-secondary"><i class="fa fa-file-excel"></i></span></a>
                    <a href="#"><span class="icon icon-sm icon-secondary"><i class="fa fa-file-pdf"></i></span></a>
                    <a href="#"><span class="icon icon-sm icon-secondary"><i class="fa fa-file-csv"></i></span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-CONTENT -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block no-padding">
                        <div class="content table-responsive">
                            <table id="" class="track_exp_tbl mb-3">
                                <thead>
                                    <tr>
                                        <th>Overhead Expenses</th>
                                        <th style="width:200px">Amount</th>
                                        <th style="width:200px">MTD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Propstream</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Office Space</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Google/Zoom/Dropbox Adobe/Website/Callrail</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Mailchimp/Active Campaign</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Propstream</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>ClickFunnel/Zapier</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Business License/County Tax</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Taxes, Bank Charges, Legal Fees, Bookkeeping, Postage</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>List and Scrubbing</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>OTHER</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <table id="" class="track_exp_tbl">
                                <thead>
                                    <tr>
                                        <th>Payroll & Commissions</th>
                                        <th style="width:200px">Amount</th>
                                        <th style="width:200px" class="">MTD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Himani</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Twinkle</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" disabled></td>
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
