<section class="page page-dashboard">
    <!-- PAGE-TITLE -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <!-- <div class="col-12">
                    <div class="actions-ctrl text-md-right text-center">
                        <a href="add_user.php" data-toggle="modal" data-target="#add_user" class="v-btn v-btn-secondary">Add User</a>
                    </div>
                </div> -->
                <div class="col-12">
                    <div class="title large text-center">
                        <span class="title-icon">Marketing Analytics Reports
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
                            <label for="">Campaign Type</label>
                            <Select class="form-control">
                                <option value="">PPC</option>
                                <option value="">DIRECT MAIL</option>
                                <option value="">COLD CALLERS</option>
                                <option value="">SOCIAL</option>
                                <option value="">RVM</option>
                                <option value="">ORGANIC</option>
                            </Select>
                        </li>
                        <li>
                            <label for="">From</label>
                            <input type="text" class="form-control datepicker" value="04/15/2020">
                        </li>
                        <li>
                            <label for="">To</label>
                            <input type="text" class="form-control datepicker"  value="04/20/2020">
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 text-md-right">
                    <ul>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="v-btn v-btn-primary dropdown-toggle mt-4" id="dropdownMenuButton" data-toggle="dropdown">
                                    Download As
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="profile.php">CSV</a>
                                    <a class="dropdown-item" href="adminAccount.php">EXCEL</a>
                                </div>
                            </div>
                        </li>
                    </ul>
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
                        <div class="content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="mkta-tab" data-toggle="tab" href="#mkta" role="tab" aria-controls="mkta" aria-selected="true">Analytics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="mktb-tab" data-toggle="tab" href="#mktb" role="tab" aria-controls="mktb" aria-selected="false">Budget</a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link" id="mab-tab" data-toggle="tab" href="#mab" role="tab" aria-controls="mab" aria-selected="false">Analytics vs Budget</a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link" id="pkpis-tab" data-toggle="tab" href="#pkpis" role="tab" aria-controls="pkpis" aria-selected="false">Pulse KPIs</a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link" id="ldk-tab" data-toggle="tab" href="#ldk" role="tab" aria-controls="ldk" aria-selected="false">Leads and Deals KPIs</a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link" id="opm-tab" data-toggle="tab" href="#opm" role="tab" aria-controls="opm" aria-selected="false">Profit: Organic & Paid Marketing</a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link" id="pm-tab" data-toggle="tab" href="#pm" role="tab" aria-controls="pm" aria-selected="false">Profit: Paid Marketing</a>
                                </li>
                            </ul>
                            <div class="tab-content kpis-content py-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="mkta" role="tabpanel" aria-labelledby="mkta-tab">
                                    Analytics 
                                </div>
                                <div class="tab-pane fade" id="mktb" role="tabpanel" aria-labelledby="mktb-tab">
                                    Budget
                                </div>
                                <div class="tab-pane fade" id="mab" role="tabpanel" aria-labelledby="mab-tab">
                                    Analytics Vs Budget
                                </div>
                                <!-- Plus kpis -->
                                <div class="tab-pane fade" id="pkpis" role="tabpanel" aria-labelledby="pkpis-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD REVENUE TOTAL</p>
                                                <h1>$ 149063.23</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD REVENUE FROM PAID MARKETING</p>
                                                <h1>$ 149,711.92</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD MARKETING EXPENSES</p>
                                                <h1>$ 11,363.72</h1>
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD MARKETING + OVERHEAD EXPENSE</p>
                                                <h1> $ 28,126.55 </h1>
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD MARKETING + OVERHEAD + COMMISSION EXPENSE</p>
                                                <h1> $ 111,880.37</h1>
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD Commission As A % Of Revenue</p>
                                                <h1>56.19%</h1>
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD Marketing As A % Of Revenue</p>
                                                <h1>7.62%</h1>
                                            </div>
                                        </div>  
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD Overhead As A % Of Revenue</p>
                                                <h1>11.25%</h1>
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD Company Profit % Of Revenue</p>
                                                <h1>24.94%</h1>
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD NET PROFIT (Including Overhead)</p>
                                                <h1> $ 37,183.55 </h1>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="ldk" role="tabpanel" aria-labelledby="ldk-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>TOTAL LEADS		</p>
                                                <h1>627</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>TOTAL CLOSED DEALS		</p>
                                                <h1>13</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>ACTUAL COST PER LEAD		</p>
                                                <h1> $ 18.12 </h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>LEADS PER CLOSED DEAL		</p>
                                                <h1>48.23</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>COST PER CLOSED DEAL (MARKETING ONLY)		</p>
                                                <h1> $ 874.13 </h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>COST PER CLOSED DEAL (MARKETING,  OVERHEAD EXPENSES, LIST & SCRUBBING)</p>
                                                <h1> $ 2,163.58 </h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>CONVERSION RATE		</p>
                                                <h1>2.07%</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="opm" role="tabpanel" aria-labelledby="opm-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>OVERALL TOTAL REVENUE PER DEAL</p>
                                                <h1>$ 11,466.46</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>TOTAL REVENUE FROM PAID MARKETING PER DEAL</p>
                                                <h1>$ 11,516.30</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>OVERALL PROFIT PER DEAL AFTER MARKETING EXPENSE	</p>
                                                <h1>$ 10,592.32</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>PROFIT PER DEAL FROM PAID MARKETING AFTER MARKETING EXPENSE</p>
                                                <h1>$ 10,642.17</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>EXIGO OVERALL PROFIT PER DEAL AFTER MARKETING & COMMISSION</p>
                                                <h1>$ 4,149.72</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>EXIGO PROFIT PER DEAL AFTER MARKETING & COMMISSION FOR PAID MARKETING</p>
                                                <h1>$ 4,199.57</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>OVERALL FINAL PROFIT FOR EXIGO PER DEAL (All Expenses)</p>
                                                <h1>$2,860.27</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>Percentage of Overall Profit	</p>
                                                <h1>27.00%</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>FINAL PROFIT FOR EXIGO PER DEAL FOR PAID MARKETING (All Expenses)</p>
                                                <h1>$2,910.12</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>Percentage of Profit from Paid Marketing</p>
                                                <h1>27.35%</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pm" role="tabpanel" aria-labelledby="pm-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD REVENUE</p>
                                                <h1>$ 149,711.92</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD MARKETING EXPENSES</p>
                                                <h1>$11,363.72</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD PAYROLL EXPENSES WHOLESALE SIDE (exclude Gregory & Jesse)</p>
                                                <h1>$83,753.82</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD OVERHEAD EXPENSES (exclude Gregory & Jesse)</p>
                                                <h1>$16,762.83</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>Total Expenses</p>
                                                <h1>$111,880.37</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>YTD NET PROFIT</p>
                                                <h1>$37,831.55</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>Profit % of Revenue</p>
                                                <h1>25.27%</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>Expenses % to Revenue</p>
                                                <h1>74.73%</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>Return On Marketing (ROI)</p>
                                                <h1>1217.46%</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kpis-block">
                                                <p>OVERALL</p>
                                                <h1>323</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
