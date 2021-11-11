
function sendmessage() {
	event.preventDefault();
	$.ajax({
		type: "POST",
		url: "functions/chat_functions/sendmessage.php", 
		dataType: "html",
		data: $("form").serialize(),
		success: function(response){
			$('input:text').val("");
			//$("body").append(response);
		}
	});
}

function getmessage() {
	var counter = $("#messages p").length;
	$.ajax({
		type: "GET",
		url: "functions/chat_functions/getmessage.php",
		dataType: "html",
		data: {currentLog : counter},
		success: function(response){
			$("#messages").append(response);
		}
	});	
	repeat = setTimeout(getmessage, 500);
}
getmessage();

