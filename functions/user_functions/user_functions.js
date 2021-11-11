
//get login data 
$(document).ready(function(){
    $( ".login-form" ).submit(function( event ) {
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "functions/user_functions/getlogin.php", 
			dataType: "html",
			data: $(this).serialize(),
			success: function(response){
				location.reload();
				//$("body").append(response);
			}
		});
		
	});
});

//register
$(document).ready(function(){
    $( ".register-form" ).submit(function( event ) {
		event.preventDefault();
		var getData = new FormData($(this)[0]);

		$.ajax({
			type: "POST",
			url: "functions/user_functions/register.php", 
			cache: false,
			contentType: false,
			processData: false,
			data: getData,
			success: function(response){
				$("body").append(response);
				$(".register-form input").val("");
				//change this to make it more effeient 
			}
		});
		
	});
});
$(document).on("click", ".navbar-brand", function(){
	event.preventDefault();
	$("body").load("templates/find_group_page.html");
});


//change url dir
$(document).on("click", "a", function(){
	event.preventDefault();
	$.ajax({
		url: "functions/get_page.php",
		method: "POST",
		data: {link: $(this).text()},
		success: function(response){
			if(response !== "") {
				$("body").html(response);
			}
		}
	});
});


//logout
$(document).on("click", "#logout", function(){
	$.ajax({
		url: "functions/user_functions/logout.php",
		method: "POST",
		success: function(response){
			location.reload();
			//$("body").append(response);
		}
	});
});

//find group list
$(document).ready(function(){
	$( "#interests" ).ready(function( event ) {
		$.ajax({
			url: "functions/user_functions/findgroup.php",
			method: "POST",
			success: function(response){
				$("#interests").html(response);
				//$("body").append(response);
			}
		});
	});
	$( "#searchMenu" ).keyup(function( event ) {
		event.preventDefault();
		$.ajax({
			url: "functions/user_functions/findgroup.php",
			method: "POST",
			data: $("form").serialize(),
			success: function(response){
				$("#interests").html(response);
				//$("body").append(response);
			}
		});
	});
});
$(document).on("click",function(){
    $( "#interests" ).ready(function( event ) {
		$.ajax({
			url: "functions/user_functions/findgroup.php",
			method: "POST",
			success: function(response){
				$("#interests").html(response);
				//$("body").append(response);
			}
		});
	});
	
    $( "#searchMenu" ).keyup(function( event ) {
		event.preventDefault();
		$.ajax({
			url: "functions/user_functions/findgroup.php",
			method: "POST",
			data: $("form").serialize(),
			success: function(response){
				$("#interests").html(response);
				//$("body").append(response);
			}
		});
	});
	
});



//load group list
$(document).on("click",function(){
    $("#joined").ready(function( event ) {
		$.ajax({
			url: "functions/user_functions/loadgroup.php",
			method: "POST",
			success: function(response){
				$("#joined").html(response);
				//$("body").append(response);
			}
		});
	});
	
    $( ".openGroup form" ).submit( function( event ) {
		event.preventDefault();
		$.ajax({
			url: "functions/chat_functions/constructchat.php",
			method: "POST",
			data: $(this).serialize(),
			success: function(response){
				$("body").html(response);
			}
		});
	});	
});

//user settings
$(document).bind('DOMSubtreeModified', function() {
  $('#settings-form').submit( function(event){
	  event.preventDefault();
	  
	$.ajax({
		url: "functions/user_functions/settings.php",
		method: "POST",
		data: $(this).serialize(),
		success: function(response){
			$("body").append(response);
		}
	});
  });
});


