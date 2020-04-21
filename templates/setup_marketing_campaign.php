<section class="page page-dashboard">
    <!-- PAGE-TITLE -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="actions-ctrl text-md-right text-center">
                        <a href="add_campaign.php" data-toggle="modal" data-target="#add_campaign" class="v-btn v-btn-secondary">Add Lead Resources</a>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="title large text-center">
                        <!-- <span class="title-icon"><i class="fa fa-user"></i></span> -->
                        Marketing Lead Resources
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
                                        <th>Lead Name</th>
                                        <th>Budget</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><a href="" class="" data-target="#add_campaign" data-toggle="modal">Lorem ipsum dolor,</a></td>
                                        <td>$300</td>
                                        <td>
                                            <a href="#" class="icon icon-sm icon-secondary " title="Edit Campaign"><i class="fa fa-pencil-alt"></i></a>
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




<div class="modal fade" tabindex="-1" role="dialog" id="add_campaign">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Lead Resource</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="content">
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Lead</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <p><label for="">Campaign Name</label> <span class="float-right"><a href="#" class="v-btn v-btn-primary"><i class="fa fa-plus"></i></a></span></p>
                    <ul class="add-campaign-list">
                        <li>
                            <div class="input-group">
                                <input type="text" placeholder="Campaign Name" class="form-control" aria-label="">
                                <div class="input-group-append">
                                    <span class="input-group-text">X</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="input-group">
                                <input type="text" placeholder="Campaign Name" class="form-control" aria-label="">
                                <div class="input-group-append">
                                    <span class="input-group-text">X</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="input-group">
                                <input type="text" placeholder="Campaign Name" class="form-control" aria-label="">
                                <div class="input-group-append">
                                    <span class="input-group-text">X</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Budget</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="v-btn v-btn-base" data-dismiss="modal">Close</button>
        <a href="company_list.php" class="v-btn v-btn-primary" data-dismiss="modal">Add Campaign</a>
      </div>
    </div>
  </div>
</div>
