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
