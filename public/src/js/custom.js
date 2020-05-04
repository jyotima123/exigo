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
    $( ".datepicker" ).datepicker();
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
                
            }

        })
    })

 //to match old password
    $(document).ready(function () {

         $('.xyz').on('input', function() {

           alert('hello');

        });
    });  