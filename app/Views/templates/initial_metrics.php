<section class="page page-dashboard">
    <!-- PAGE-TITLE -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <div class="title large text-center">
                        <!-- <span class="title-icon"><i class="fa fa-user"></i></span> -->
                        Setup Initial Metrics
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
         <?= form_open(base_url('/initial_metrics'), array('id'=>'initial_metrics'));?>
        <div class="container">
            <?php  $session = session();  echo $session->getFlashdata('Message'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="content">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="">Annual Revenue</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="annual_revenue" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Acquisition</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="acquisition" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Average Profit Per Deal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="avg_profit_per_lead" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="">Leads Per Closed Deal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="lead_per_closed_deal" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Cost Per Lead</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" name="cost_per_lead" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
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
                           <button type="submit" class="v-btn v-btn-primary">Save Metrics</button>
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
   if ($("#initial_metrics").length > 0) {
      $("#initial_metrics").validate({
      
    rules: {
      annual_revenue: {
        required: true,
      },
  
     acquisition: {
        required: true,
      }, 
      avg_profit_per_lead: {
        required: true,
      }, 
      cost_per_lead: {
        required: true,
      },
      lead_per_closed_deal: {
        required: true,
      },    
    },
    messages: {
        
      annual_revenue: {
        required: "Please enter revenue",
      },
  
     acquisition: {
        required: "Please enter acquisition",
      }, 
      avg_profit_per_lead: {
        required: "Please enter profit",
      }, 
      cost_per_lead: {
        required: "Please enter lead",
      },
      lead_per_closed_deal: {
        required: "Please enter deal",
      }, 
    },
  })
}
</script>
