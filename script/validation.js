$(document).ready(function() {
    //imp vars
	var form = $("#form");
	var name = $("#name");
	var nameInfo = $("#nameInfo");
	var email = $("#email");
	var emailInfo = $("#emailInfo");
	var number = $("#number");
	var numberInfo= $("#numberInfo");
	var validateMail,validateName,validateNum;
	
		//On Submitting
	form.submit(function(){
		if(validateMail & validateName &  validateNum)
			return true;
			else
			return false;
	});
	name.keyup(function(e) {
        if(name.val().length > 3 && name.val().length < 12){
			$.ajax({
				type: "POST",
				url: "check_register.php",
				data: "name="+name.val(),
				success: function(ms){
					nameInfo.ajaxComplete(function(event, XMLHttpRequest, ajaxOptions) {
            if(ms=='valid'){
				validateName =true;
				name.addClass("valid");
			nameInfo.text("Username is valid and available");
			nameInfo.addClass("valid");}
			else{
			validateName =false;
			nameInfo.text("Username is alreay in use");}
            name.addClass("error");
			nameInfo.addClass("error");
                    });
				}
			});
			}
			else{
				validateName =false;
				if(name.hasClass("valid")){
					name.removeClass("valid");
					nameInfo.removeClass("valid");}
				 name.addClass("error");
				nameInfo.text("We want names with more than 3 letters and less than 12");
				nameInfo.addClass("error");
				}
    });
	number.keyup(function(e) {
        if(number.val().match(/^[0-9]{10}/) && number.val().length==10){
			$.ajax({
				type: "POST",
				url: "check_register.php",
				data: "number="+number.val(),
				success: function(ms){
					nameInfo.ajaxComplete(function(event, XMLHttpRequest, ajaxOptions) {
            if(ms=='valid'){
				validateNum =true;
				number.addClass("valid");
			numberInfo.text("Mobile Number is valid and available");
			numberInfo.addClass("valid");}
			else{
			validateNum =false;
			numberInfo.text("Mobile No. is alreay in use");}
            number.addClass("error");
			numberInfo.addClass("error");
                    });
				}
			});
			}
			else{
				validateNum =false;
				if(number.hasClass("valid")){
					number.removeClass("valid");
					numberInfo.removeClass("valid");}
				 number.addClass("error");
				numberInfo.text("Mobile Number must be 10 digit");
				numberInfo.addClass("error");
				}
    });
	email.keyup(function(e) {
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
        if(filter.test(a)){
			$.ajax({
				type: "POST",
				url: "check_register.php",
				data: "email="+email.val(),
				success: function(ms){
					nameInfo.ajaxComplete(function(event, XMLHttpRequest, ajaxOptions) {
            if(ms=='valid'){
				validateMail =true;
				email.addClass("valid");
			emailInfo.text("Email is valid and available");
			emailInfo.addClass("valid");}
			else{
			validateMail =false;
			emailInfo.text("Email is alreay in use");}
            email.addClass("error");
			emailInfo.addClass("error");
                    });
				}
			});
			}
			else{		
				validateMail =false;
			if(email.hasClass("valid")){
				email.removeClass("valid");
				emailInfo.removeClass("valid");}
				 email.addClass("error");
				emailInfo.text("Type a valid e-mail please ");
				emailInfo.addClass("error");
				}
    });
	$("#reset").click(function(){
		location.reload();
		});
/**	$("#number").onfocus(function(e) {hin();
    });**/
	$("#send").hover(function(){
		hin();},
	function(){
		$("#send").css("background-color","");
		});
	function hin(){
		if(validateMail & validateName &  validateNum)
		$("#send").css("background-color","#CEFFCE");
		else
		$("#send").css("background-color","#f8dbdb");}
	
});