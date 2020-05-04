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
                                <span class="v-btn v-btn-primary mr-1" data-toggle="tooltip" data-placement="top" title="Click for previous day" id="previous_month"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text" name="track_date" id="track_date" class="form-control expensedatepicker" value="<?= date('d-m-Y');?>" placeholder="">
                                <span data-toggle="tooltip" data-placement="top" title="Click for next day" class="v-btn v-btn-primary  mr-1" id="next_month"><i class="fa fa-angle-double-right"></i></span>
                            </div>
                        </li>
                        <!-- <li>
                            <a href="#" class="v-btn v-btn-primary btn-block">Filter</a>
                        </li> -->
                    </ul>
                </div>
                <!-- <div class="col-md-4 text-md-right align-self-center">
                    <p><label for="">Downlaod files</label></p>
                    <a href="#"><span class="icon icon-sm icon-secondary"><i class="fa fa-file-excel"></i></span></a>
                    <a href="#"><span class="icon icon-sm icon-secondary"><i class="fa fa-file-pdf"></i></span></a>
                    <a href="#"><span class="icon icon-sm icon-secondary"><i class="fa fa-file-csv"></i></span></a>
                </div> -->
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
                                     <?php if($expenses): ?>
                            <?php foreach($expenses as $e): ?>
                                <?php if($e['type'] == 'overhead'): ?>
                                    <tr>
                                        <td><?= $e['expense']; ?></td>
                                        <td><input type="text" class="form-control changeExpense expense_<?= $e['id'];?>" data-id="<?= $e['id'];?>" value="<?= $e['amount']; ?>"></td>
                                        <td><input type="text" value="<?= $e['mtd']; ?>" class="form-control mtd mtd_<?= $e['id'];?>" disabled></td>
                                    </tr>
                                 <?php endif; ?> 
                                  <?php  endforeach; ?>  
                                   <?php endif; ?> 
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
                                     <?php if($expenses): ?>
                                    <?php foreach($expenses as $e): ?>
                                <?php if($e['type'] == 'payroll'): ?>
                                    <tr>
                                        <td><?= $e['expense']; ?></td>
                                        <td><input type="text" class="form-control changeExpense expense_<?= $e['id'];?>" data-id="<?= $e['id'];?>" value="<?= $e['amount']; ?>"></td>
                                        <td><input type="text" value="<?= $e['mtd']; ?>" class="form-control mtd mtd_<?= $e['id'];?>" disabled></td>
                                    </tr>
                                    <?php endif; ?> 
                                  <?php  endforeach; ?>  
                                   <?php endif; ?> 
                                </tbody>
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
  $("#next_month").click(function(){
  
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
    change(someFormattedDate);
      
  });
  
  $("#previous_month").click(function(){
  
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
change(someFormattedDate);

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
                change(someFormattedDate);
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
                    change(someFormattedDate);
        break;

        case 40: //alert('down');
        break;

        default: return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
});

  function change(expense_date)
  {
         $.ajax({
               url:'expense_track',
                data:{expensedate : expense_date},
                method:'POST',
                success:function(returnData){

                    $('.changeExpense').val(0);
                    $('.mtd').val(0);
                    if(returnData.data.length >0)
                    {
                        for(var i=0; i<returnData.data.length;i++)
                        {
                            $.each(returnData.data[i], function(key, value ){
                                
                                    
                                $('.expense_'+returnData.data[i]['expense_id']).val(returnData.data[i]['amount']);                                   
                                 $('.mtd_'+returnData.data[i]['expense_id']).val(returnData.data[i]['mtd']);
                            }); 
                            
                        }
                    }
                    

                }
            });

  }
  
});

    </script>



