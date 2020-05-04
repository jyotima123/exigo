$(document).ready(function() {
  $('#example').DataTable( {
      "scrollX": true
  } );

//   var table = $('#example-report').DataTable( {
//     lengthChange: false,
//     buttons: ['excel', 'pdf' ]
// } );

// table.buttons().container()
//     .appendTo( '#example-report_wrapper .col-md-6:eq(0)' );

  // JQUERY CALANDER
  $( function() {
    $( ".leaddatepicker" ).datepicker({
        dateFormat: 'dd-mm-yy',
        onSelect: function(dateText) {
        console.log("Selected date: " + dateText + "; input's current value: " + this.value);
                $.ajax({
               url:'lead_track',
                data:{leaddate : dateText},
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
  });


    $( function() {
    $( ".expensedatepicker" ).datepicker({
        dateFormat: 'dd-mm-yy',
        onSelect: function(dateText) {
        console.log("Selected date: " + dateText + "; input's current value: " + this.value);
            $.ajax({
               url:'expense_track',
                data:{expensedate : dateText},
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
  });


  $('[data-toggle="toggle"]').change(function(){
    // $("i", this).toggleClass("fa-chevron-down fa-chevron-up");
		$(this).parents().next('.hide').toggle();
	});


} );


// TOOL TIP
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$('.status').change(function(){

    if($(this).prop("checked") == true){
        var val = '1';
    }else{
        var val = '0';
    }
    var id = $(this).attr('id');
    $.ajax({
       url:'status',
        data:{id : id, status : val},
        method:'POST',
        success:function(returnData){
            location.reload();
        }
    })
});

$('.setup_status').change(function(){

    if($(this).prop("checked") == true){
        var val = '1';
    }else{
        var val = '0';
    }
    var id = $(this).attr('id');
    var table = $(this).attr('data-name');
    $.ajax({
       url:'setup-status',
        data:{id : id, status : val,table:table},
        method:'POST',
        success:function(returnData){
            location.reload();
        }
    })
})

$('.delete').click(function () {
        //alert($(this).attr('data-delete')); return false;
        var id = $(this).attr('data-id');
        var type = $(this).attr('data-type');
        var name = $(this).attr('data-name');
        $('#id').val(id);
        if (type == 'entry') {
            $('input[name=user_active]').prop('disabled', true);
            $('input[name=mode]').prop('disabled', false);
            $('input[name=mode]').val(name);
            $('.name').html('this entry');
            $('.modal-title').html("Confirm Delete Entry");
        }
    })

 $('#deleteConfirm').click(function () {
        var formData = $('#delete-data').serialize();
        $.ajax({
            data: formData,
            url: 'delete',
            method: 'POST',
            success: function (returnData) {
                 location.reload();
            }
        })
    })


 //to match old password
    $(document).ready(function () {

         $('.input-password').focus(function() {

            var old = $('#old').val();
            var newpwd = CryptoJS.MD5($('#old_password').val());
            // alert(newpwd);
            if(old != newpwd)
            {
                $('.old_password').html('Please Enter Correct Password');
                $( "#old_password" ).val('');
                $( "#old_password" ).focus();
            }

        });
    });  


/***** Function To Update Hygienist / Patient / EOD / EOM / EOMH Modal Form ******/
    $(document).on('click', '.edit-user', function () {
        /* $('.widget-content').html('');*/
        $("#loader").css('display', 'block');
        var id = $(this).attr('data-id');
        var type = $(this).attr('data-type');
        var modal = $(this).attr('data-modal');
        if (modal == 'company') {
            var url = 'modalCompanyDetails';
          }
          if (modal == 'expense') {
            var url = 'modalExpenseDetails';
          }
          if (modal == 'resource') {
            var url = 'modalResourceDetails';
          }
          if (modal == 'user') {
            var url = 'modalUserDetails';
          }
        $.ajax({
            data: {id: id, type: type},
            url: url,
            type: 'POST',
            dataType: 'JSON',
            success: function (returnData) {
                $('.inner_form').html(returnData.inner_form);
                $("#loader").css('display', 'none');
                if (modal == 'company') {
                    $('#send_company_form').attr('data-type', 'company');
                }
                if (modal == 'expense') {
                    $('#send_company_form').attr('data-type', 'expense');
                }
                if (modal == 'resource') {
                    $('#send_company_form').attr('data-type', 'resource');
                }
                if (modal == 'user') {
                    $('#send_company_form').attr('data-type', 'user');
                }
                
            }

        })
    })

    //to save lead track data
    $(document).ready(function () {

        sumLead();

         $('.xyz').change(function() {

           var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            var resource = $(this).attr('data-resource');
            var modal = $(this).attr('data-modal');
            var date= $('#track_date').val();
            var val = $(this).val();
                $.ajax({
                data: {id: id, type: type,resource:resource,date:date,modal:modal,val:val},
                url: 'track_leads',
                type: 'POST',
                dataType: 'JSON',
                success: function (returnData) {
                    
                }

            })

        });



         $('.catlead').keyup(function () {
 
            // initialize the sum (total price) to zero
            var sum = sum1 = 0;
            // we use jQuery each() to loop through all the textbox with 'price' class
            // and compute the sum for each loop
            var resource = $(this).attr('data-resource');
            $('.catlead_'+resource).each(function() {
                sum += Number($(this).val());
            });
            // set the computed value to 'totalPrice' textbox
            $('#cat_lead_'+resource).val(sum);

            $('.leads').each(function() {
                sum1 += Number($(this).val());
            });
            // set the computed value to 'totalPrice' textbox
            $('#totalLead').val(sum1);
             
        });

         $('.catsent').keyup(function () {

             var sum = sum1 = 0;
             var resource = $(this).attr('data-resource');
            $('.catsent_'+resource).each(function() {
                sum += Number($(this).val());
            });
            $('#cat_sent_offer_'+resource).val(sum);

            $('.sent').each(function() {
                sum1 += Number($(this).val());
            });
            $('#totalSent').val(sum1);
             
        });
         $('.cataccept').keyup(function () {

             var sum = sum1 = 0;
             var resource = $(this).attr('data-resource');
            $('.cataccept_'+resource).each(function() {
                sum += Number($(this).val());
            });
            $('#cat_accept_offer_'+resource).val(sum);

            $('.accept').each(function() {
                sum1 += Number($(this).val());
            });
            $('#totalAccept').val(sum1);
             
        });
         $('.catsign').keyup(function () {

             var sum = sum1 = 0;
             var resource = $(this).attr('data-resource');
            $('.catsign_'+resource).each(function() {
                sum += Number($(this).val());
            });
            $('#cat_contract_'+resource).val(sum);

            $('.contract').each(function() {
                sum1 += Number($(this).val());
            });
            $('#totalContract').val(sum1);
             
        });
         $('.catdeal').keyup(function () {

             var sum = sum1 = 0;
             var resource = $(this).attr('data-resource');
            $('.catdeal_'+resource).each(function() {
                sum += Number($(this).val());
            });
            $('#cat_closed_'+resource).val(sum);

            $('.deal').each(function() {
                sum1 += Number($(this).val());
            });
            $('#totalClosed').val(sum1);
             
        });
         $('.catprofit').keyup(function () {

             var sum = sum1 = 0;
             var resource = $(this).attr('data-resource');
            $('.catprofit_'+resource).each(function() {
                sum += Number($(this).val());
            });
            $('#cat_profit_'+resource).val(sum);

            $('.profit').each(function() {
                sum1 += Number($(this).val());
            });
            $('#totalProfit').val(sum1);
             
        });

         //for all campaign
         $('.leads').keyup(function () {
 
            // initialize the sum (total price) to zero
            var sum = 0;
            // we use jQuery each() to loop through all the textbox with 'price' class
            // and compute the sum for each loop
            $('.leads').each(function() {
                sum += Number($(this).val());
            });
            // set the computed value to 'totalPrice' textbox
            $('#totalLead').val(sum);
             
        });

         $('.sent').keyup(function () {

             var sum = 0;
            $('.sent').each(function() {
                sum += Number($(this).val());
            });
            $('#totalSent').val(sum);
             
        });
         $('.accept').keyup(function () {

             var sum = 0;
            $('.accept').each(function() {
                sum += Number($(this).val());
            });
            $('#totalAccept').val(sum);
             
        });
         $('.contract').keyup(function () {

             var sum = 0;
            $('.contract').each(function() {
                sum += Number($(this).val());
            });
            $('#totalContract').val(sum);
             
        });
         $('.deal').keyup(function () {

             var sum = 0;
            $('.deal').each(function() {
                sum += Number($(this).val());
            });
            $('#totalClosed').val(sum);
             
        });
         $('.profit').keyup(function () {

             var sum = 0;
            $('.profit').each(function() {
                sum += Number($(this).val());
            });
            $('#totalProfit').val(sum);
             
        });

    });  


    function sumLead()
    { 
            // initialize the sum (total price) to zero
            
             
            // we use jQuery each() to loop through all the textbox with 'price' class
            // and compute the sum for each loop
            $('.catlead').each(function() {
        
                id = $(this).attr('data-resource');
                var sum = 0;
                $('.catlead_'+id).each(function() {
                        sum += Number($(this).val());
                        id = $(this).attr('data-resource');
                    });
                $('#cat_lead_'+id).val(sum);
            });
             
            // set the computed value to 'totalPrice' textbox
           
             
            $('.catsent').each(function() {
                 id = $(this).attr('data-resource');
                var sum = 0;
                $('.catsent_'+id).each(function() {
                        sum += Number($(this).val());
                        id = $(this).attr('data-resource');
                    });
                $('#cat_sent_offer_'+id).val(sum);
            });
            
            
            $('.cataccept').each(function() {
                id = $(this).attr('data-resource');
                var sum = 0;
                $('.cataccept_'+id).each(function() {
                        sum += Number($(this).val());
                        id = $(this).attr('data-resource');
                    });
                $('#cat_accept_offer_'+id).val(sum);
            });
            
            
            $('.catsign').each(function() {
                id = $(this).attr('data-resource');
                var sum = 0;
                $('.catsign_'+id).each(function() {
                        sum += Number($(this).val());
                        id = $(this).attr('data-resource');
                    });
                $('#cat_contract_'+id).val(sum);
            });
            
            $('.catdeal').each(function() {
                id = $(this).attr('data-resource');
                var sum = 0;
                $('.catdeal_'+id).each(function() {
                        sum += Number($(this).val());
                        id = $(this).attr('data-resource');
                    });
                $('#cat_closed_'+id).val(sum);
            });
            
            $('.catprofit').each(function() {
                id = $(this).attr('data-resource');
                var sum = 0;
                $('.catprofit_'+id).each(function() {
                        sum += Number($(this).val());
                        id = $(this).attr('data-resource');
                    });
                $('#cat_profit_'+id).val(sum);
            });
            

            //for all campaign
            var sum = 0;
            // we use jQuery each() to loop through all the textbox with 'price' class
            // and compute the sum for each loop
            $('.leads').each(function() {
                sum += Number($(this).val());
            });
            // set the computed value to 'totalPrice' textbox
            $('#totalLead').val(sum);

             var sum = 0;
            $('.sent').each(function() {
                sum += Number($(this).val());
            });
            $('#totalSent').val(sum);

            var sum = 0;
            $('.accept').each(function() {
                sum += Number($(this).val());
            });
            $('#totalAccept').val(sum);

            var sum = 0;
            $('.contract').each(function() {
                sum += Number($(this).val());
            });
            $('#totalContract').val(sum);

            var sum = 0;
            $('.deal').each(function() {
                sum += Number($(this).val());
            });
            $('#totalClosed').val(sum);

             var sum = 0;
            $('.profit').each(function() {
                sum += Number($(this).val());
            });
            $('#totalProfit').val(sum);
    } 


    $(document).ready(function () {

         $('.changeExpense').change(function() {

           var id = $(this).attr('data-id');
            var date= $('#track_date').val();
            var val = $(this).val();
                $.ajax({
                data: {id: id, date:date,val:val},
                url: 'track_expenses',
                type: 'POST',
                dataType: 'JSON',
                success: function (returnData) {
                    var val1 = Number($('.mtd_'+id).val());
                    var sum = val1+Number(val);
                    $('.mtd_'+id).val(sum);
                    
                }

            })

        });  

    });   


    