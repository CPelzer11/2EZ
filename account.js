$(document).ready(function() {
	$("#input").on("keyup", function() {
		var x = $(this).val();
		$("#tab tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(x) > -1)
		});
	});
});