$( document ).on( "focus", "#contact_form", function() {
	$("#contact_form").validate({
		rules:{
			first_name : "required",
			last_name : "required",
			email : {
				email : true,
				required : true
			},
			phone : {
				required : true,
				validatePhoneNumber : true	
			},
			comment : "required"
		},
		messages : {
			first_name : "Enter your first name",
			last_name : "Enter your last name",
			email : {
				email : "Enter a valid email address",
				required : "Enter your email address" 
			},
			phone : {
				required : "Enter phone number",
				validatePhoneNumber : "Numbers only : 1-999-222-1252 or 19992221252"
			},
			comment: "Enter your comment"
		},
		errorPlacement: function(error, element){
			error.insertBefore(element);
		},
		submitHandler : submit_form
	});
});

$.validator.addMethod("validatePhoneNumber", function(value, element){
	result = true;
	pattern_to_match =  /^(1\s*[-\/\.]?)?(\((\d{3})\)|(\d{3}))\s*[-\/\.]?\s*(\d{3})\s*[-\/\.]?\s*(\d{4})\s*(([xX]|[eE][xX][tT])\.?\s*(\d+))*$/;
	if(value.search(pattern_to_match) == -1){
		result = false;
	}else{
		result = true;
	}
    return this.optional(element) || result;
});	

function submit_form(){
	var post_data;
	post_data = $("#contact_form").serialize();
	$.post("controller/",post_data,
		function(data){
			if(data.status == "success"){
				$("#contact_form").remove();
				$("#thankyou").show();
			}
		},"json"
	);
}




