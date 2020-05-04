<section class="page page-dashboard">
    <!-- PAGE-TITLE -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title large text-center">
                        <!-- <span class="title-icon"><i class="fa fa-user"></i></span> -->
                        Track Leads
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
                                <span class="v-btn v-btn-primary mr-1" data-toggle="tooltip" data-placement="top" title="Click for previous day" id="lead_previous_month"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text" name="track_date" id="track_date" class="form-control mr-1 leaddatepicker" value="<?= date('d-m-Y');?>">
                                <span data-toggle="tooltip" data-placement="top" title="Click for next day" class="v-btn v-btn-primary" id="lead_next_month"><i class="fa fa-angle-double-right"></i></span>
                            </div>
                        </li>
                        <li>
                            <label for="">Select Employee</label>
                            <select name="" id="" class="form-control">
                                <option value="">Overall</option>
                                <option value="" disabled>Employee’s KPI Coming Soon</option>
                            </select>
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
                        <div class="content table-responsive">
                            <table id="" class="track_lead_tbl">
                                <thead>
                                    <tr>
                                        <th  style="width:200px">Metrics</th>
                                        <th>Total Leads</th>
                                        <th>Offers Sent</th>
                                        <th>Offers Accepted</th>
                                        <th>Contracts Signed</th>
                                        <th>Deals Closed</th>
                                        <th>Profit &nbsp; &nbsp; <span  data-toggle="tooltip" class="icon icon-shadow icon-xs " data-placement="top" title="Revenue for an Assignment or the Gross Profit after Closing Cost’s on a Double Close transaction"><i class="fas fa-question"></i> </span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>All Campaigns </td>
                                        <td><input type="text" class="form-control input-calc" readonly="" id="totalLead"></td>
                                        <td><input type="text" class="form-control input-calc" readonly="" id="totalSent"></td>
                                        <td><input type="text" class="form-control input-calc" readonly="" id="totalAccept"></td>
                                        <td><input type="text" class="form-control input-calc" readonly="" id="totalContract"></td>
                                        <td><input type="text" class="form-control input-calc" readonly="" id="totalClosed"></td>
                                        <td><input type="text" class="form-control input-calc" readonly="" id="totalProfit"></td>
                                    </tr>
                                    <?php if($resourceData): ?>
                            <?php foreach($resourceData as $r): ?>
                            <?php if(count($r['cat'])>0){ ?>
                                    <tr class="active">
                                        <td>
                                            <label for="title_<?= $r['id'];?>">
                                            <?= $r['resource'];?> <span  class="icon icon-primary collaps-icon float-right"><i class="fa fa-chevron-down"></i></span></label>
                                            <input type="checkbox" name="" id="title_<?= $r['id'];?>" data-toggle="toggle">    
                                        </td>    
                                        
                                        <td><input type="text" class="form-control input-calc leads" readonly="" id="cat_lead_<?= $r['id'];?>"></td>
                                        <td><input type="text" class="form-control input-calc sent" readonly="" id="cat_sent_offer_<?= $r['id'];?>"></td>
                                        <td><input type="text" class="form-control input-calc accept" readonly="" id="cat_accept_offer_<?= $r['id'];?>"></td>
                                        <td><input type="text" class="form-control input-calc contract" readonly="" id="cat_contract_<?= $r['id'];?>"></td>
                                        <td><input type="text" class="form-control input-calc deal" readonly="" id="cat_closed_<?= $r['id'];?>"></td>
                                        <td><input type="text" class="form-control input-calc profit" readonly="" id="cat_profit_<?= $r['id'];?>"></td>
                                    </tr>
                                </tbody>
                                <tbody class="hide track-leads-collaps">
                                <?php foreach($r['cat'] as $c): ?>    
                                    <tr>
                                        <td><?= $c['category']; ?></td> 
                                        <td><input type="text" class="form-control input-calc xyz catlead catlead_<?= $c['resource_id'];?> lead_category_<?= $c['id'];?>" data-id="<?= $c['id'];?>" data-type="category" data-resource="<?= $c['resource_id'];?>" data-modal="total_leads" value="<?= $c['lead']; ?>"></td>
                                        <td><input type="text" class="form-control input-calc xyz catsent catsent_<?= $c['resource_id'];?> sent_category_<?= $c['id'];?>" data-id="<?= $c['id'];?>" data-type="category" data-resource="<?= $c['resource_id'];?>" data-modal="sent_offers" value="<?= $c['offer_sent']; ?>"></td>
                                        <td><input type="text" class="form-control input-calc xyz cataccept cataccept_<?= $c['resource_id'];?> accept_category_<?= $c['id'];?>" data-id="<?= $c['id'];?>" data-type="category" data-resource="<?= $c['resource_id'];?>" data-modal="accepted_offers" value="<?= $c['offer_accepted']; ?>"></td>
                                        <td><input type="text" class="form-control input-calc xyz catsign catsign_<?= $c['resource_id'];?> sign_category_<?= $c['id'];?>" data-id="<?= $c['id'];?>" data-type="category" data-resource="<?= $c['resource_id'];?>" data-modal="contract_signed" value="<?= $c['signed']; ?>"></td>
                                        <td><input type="text" class="form-control input-calc xyz catdeal catdeal_<?= $c['resource_id'];?> deal_category_<?= $c['id'];?>" data-id="<?= $c['id'];?>" data-type="category" data-resource="<?= $c['resource_id'];?>" data-modal="deal_closed" value="<?= $c['deal_closed']; ?>"></td>
                                        <td><input type="text" class="form-control input-calc xyz catprofit catprofit_<?= $c['resource_id'];?> profit_category_<?= $c['id'];?>" data-resource="<?= $c['resource_id'];?>" data-id="<?= $c['id'];?>" data-type="category" data-modal="profit" value="<?= $c['profit']; ?>"></td>
                                    </tr>
                                 <?php endforeach; ?>   
                                </tbody>
                            <?php } else{ ?>
                                <tbody>
                                    <tr>
                                        <td><?= $r['resource']; ?></td>
                                        <td><input type="text" class="form-control input-calc xyz leads lead_<?= $r['id'];?>" data-id="<?= $r['id'];?>" data-type="resource" data-resource="0" data-modal="total_leads" value="<?= $r['lead']; ?>"></td>
                                        <td><input type="text" class="form-control input-calc xyz sent sent_<?= $r['id'];?>" data-id="<?= $r['id'];?>" data-type="resource" data-resource="0" data-modal="sent_offers" value="<?= $r['offer_sent']; ?>"></td>
                                        <td><input type="text" class="form-control input-calc xyz accept accept_<?= $r['id'];?>" data-id="<?= $r['id'];?>" data-type="resource" data-modal="accepted_offers" value="<?= $r['offer_accepted']; ?>"></td>
                                        <td><input type="text" class="form-control input-calc xyz contract sign_<?= $r['id'];?>" data-id="<?= $r['id'];?>" data-type="resource" data-modal="contract_signed" value="<?= $r['signed']; ?>" ></td>
                                        <td><input type="text" class="form-control input-calc xyz deal deal_<?= $r['id'];?>" data-id="<?= $r['id'];?>" data-type="resource" data-modal="deal_closed" value="<?= $r['deal_closed']; ?>" ></td>
                                        <td><input type="text" class="form-control input-calc xyz profit profit_<?= $r['id'];?>" data-id="<?= $r['id'];?>" data-type="resource" data-modal="profit" value="<?= $r['profit']; ?>"></td>
                                    </tr>
                                  </tbody>  
                                 <?php } endforeach; ?>  
                                 <?php endif; ?>  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
   

$(document).ready(function(){
  $("#lead_next_month").click(function(){
  
  var str = $('#track_date').val();
  var res = str.split("-");
  var date = res[2]+'-'+res[1]+'-'+res[0];
   var someDate = new Date(date);
    // console.log(someDate);
var numberOfMonthsToAdd = 1;
someDate.setDate(someDate.getDate() + numberOfMonthsToAdd); 

var someFormattedDate = ('0' + someDate.getDate()).slice(-2) + '-'
             + ('0' + (someDate.getMonth()+1)).slice(-2) + '-'
             + someDate.getFullYear();
$('#track_date').val(someFormattedDate);
    leadChange(someFormattedDate);
      
  });
  
  $("#lead_previous_month").click(function(){
  
    var str = $('#track_date').val();
  var res = str.split("-");
  var date = res[2]+'-'+res[1]+'-'+res[0];
   var someDate = new Date(date);
var numberOfMonthsToSubtract = 1;
someDate.setDate(someDate.getDate() - numberOfMonthsToSubtract); 

var someFormattedDate = ('0' + someDate.getDate()).slice(-2) + '-'
             + ('0' + (someDate.getMonth()+1)).slice(-2) + '-'
             + someDate.getFullYear();
$('#track_date').val(someFormattedDate);
leadChange(someFormattedDate);

  }); 

   $(document).keydown(function(e) {
    switch(e.which) {
        case 37: var str = $('#track_date').val();
                  var res = str.split("-");
                  var date = res[2]+'-'+res[1]+'-'+res[0];
                   var someDate = new Date(date);
                var numberOfMonthsToSubtract = 1;
                someDate.setDate(someDate.getDate() - numberOfMonthsToSubtract); 

                var someFormattedDate = ('0' + someDate.getDate()).slice(-2) + '-'
                             + ('0' + (someDate.getMonth()+1)).slice(-2) + '-'
                             + someDate.getFullYear();
                $('#track_date').val(someFormattedDate);
                leadChange(someFormattedDate);
        break;

        case 38: //alert('uper');
        break;

        case 39: var str = $('#track_date').val();
                  var res = str.split("-");
                  var date = res[2]+'-'+res[1]+'-'+res[0];
                   var someDate = new Date(date);
                    // console.log(someDate);
                var numberOfMonthsToAdd = 1;
                someDate.setDate(someDate.getDate() + numberOfMonthsToAdd); 

                var someFormattedDate = ('0' + someDate.getDate()).slice(-2) + '-'
                             + ('0' + (someDate.getMonth()+1)).slice(-2) + '-'
                             + someDate.getFullYear();
                $('#track_date').val(someFormattedDate);
                    leadChange(someFormattedDate);
        break;

        case 40: //alert('down');
        break;

        default: return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
});

  function leadChange(lead_date)
  {
        $.ajax({
               url:'lead_track',
                data:{leaddate : lead_date},
                method:'POST',
                success:function(returnData){
                        
                        $('.xyz').val(0);
                        $('.leads').val(0);
                        $('.sent').val(0);
                        $('.accept').val(0);
                        $('.contract').val(0);
                        $('.deal').val(0);
                        $('.profit').val(0);

                    if(returnData.data.length >0)
                    {
                        for(var i=0; i<returnData.data.length;i++)
                        {
                            $.each(returnData.data[i], function(key, value ){
                                
                                    if((key=='resource_category_id') && value>0)
                                    {
                                        $('.lead_category_'+value).val(returnData.data[i]['total_leads']);
                                        $('.sent_category_'+value).val(returnData.data[i]['sent_offers']);
                                        $('.accept_category_'+value).val(returnData.data[i]['accepted_offers']);
                                        $('.sign_category_'+value).val(returnData.data[i]['contract_signed']);
                                        $('.deal_category_'+value).val(returnData.data[i]['deal_closed']);
                                        $('.profit_category_'+value).val(returnData.data[i]['profit']);
                                    }
                                    else if((key=='resource_category_id') && value==0){ 
                                        $('.lead_'+returnData.data[i]['resource_id']).val(returnData.data[i]['total_leads']);
                                        $('.sent_'+returnData.data[i]['resource_id']).val(returnData.data[i]['sent_offers']);
                                        $('.accept_'+returnData.data[i]['resource_id']).val(returnData.data[i]['accepted_offers']);
                                        $('.sign_'+returnData.data[i]['resource_id']).val(returnData.data[i]['contract_signed']);
                                        $('.deal_'+returnData.data[i]['resource_id']).val(returnData.data[i]['deal_closed']);
                                        $('.profit_'+returnData.data[i]['resource_id']).val(returnData.data[i]['profit']);
                                    }

                            }); 
                            
                        }
                    }
                    
                    sumLead();
                    
                }
            });
  }
});  
    </script>