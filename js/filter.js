
$(document).ready(function() {   



$('.startedFilter').click(function(){
	  $('#taskTable tbody tr').show();
      var $rowsNo = $('#taskTable tbody tr').filter(function () {
        return $.trim($(this).find('td').eq(1).text()) === "Completed" || $.trim($(this).find('td').eq(1).text()) === "Pending" || $.trim($(this).find('td').eq(1).text()) === "Late";

    }).toggle();

});


$('.lateFilter').click(function(){
	$('#taskTable tbody tr').show();
      var $rowsNo = $('#taskTable tbody tr').filter(function () {
        return $.trim($(this).find('td').eq(1).text()) === "Completed" || $.trim($(this).find('td').eq(1).text()) === "Pending" || $.trim($(this).find('td').eq(1).text()) === "Started";

    }).toggle();
    

});


$('.pendingFilter').click(function(){
	$('#taskTable tbody tr').show();
      var $rowsNo = $('#taskTable tbody tr').filter(function () {
        return $.trim($(this).find('td').eq(1).text()) === "Completed" || $.trim($(this).find('td').eq(1).text()) === "Late" || $.trim($(this).find('td').eq(1).text()) === "Started";

    }).toggle(); 
    

});


$('.completedFilter').click(function(){
	$('#taskTable tbody tr').show();
      var $rowsNo = $('#taskTable tbody tr').filter(function () {
        return $.trim($(this).find('td').eq(1).text()) === "Late" || $.trim($(this).find('td').eq(1).text()) === "Pending" || $.trim($(this).find('td').eq(1).text()) === "Started";

    }).toggle();
    

});

$('.showAllFilter').click(function(){
	$('#taskTable tbody tr').show();
    

});


});