/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#customForm");
	var name = $("#name");
	var nameInfo = $("#nameInfo");
	var email = $("#email");
	var emailInfo = $("#emailInfo");
	var pass1 = $("#pass1");
	var pass1Info = $("#pass1Info");
	var pass2 = $("#pass2");
	var pass2Info = $("#pass2Info");
	var cellphone = $("#cellphone");
	var cellphoneInfo = $("#cellphoneInfo");
	var qq = $("#qq");
	var qqInfo = $("#qqInfo");
	var studentid = $("#studentid");
	var studentidInfo = $("#studentidInfo");
	
	//On blur
	name.blur(validateName);
	email.blur(validateEmail);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	cellphone.blur(validateCellphone);
	studentid.blur(validateStudentid);
	//On key press
	name.keyup(validateName);
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);
	cellphone.keyup(validateCellphone);
	qq.keyup(validateQQ);
	studentid.keyup(validateStudentid);
	//On Submitting
	form.submit(function(){
		if(validateName() & validateEmail() & validatePass1() & validatePass2() & validateCellphone() & validateStudentid())
			return true
		else
			return false;
	});
	
	//validation functions
	function validateEmail(){
		//testing regular expression
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(a)){
			email.removeClass("error");
			emailInfo.text("");
			emailInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			email.addClass("error");
			emailInfo.text("您的电子邮件不合法，请检查重新输入");
			emailInfo.addClass("error");
			return false;
		}
	}
	function validateName(){
		//if it's NOT valid
		if(name.val().length < 3 || name.val().length >20 ){
			name.addClass("error");
			nameInfo.text("您的用户名输入不合法，请检查重新输入");
			nameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			name.removeClass("error");
			nameInfo.text("");
			nameInfo.removeClass("error");
			return true;
		}
	}
	function validatePass1(){
		var a = $("#password1");
		var b = $("#password2");

		//it's NOT valid
		if(pass1.val().length <5 || pass1.val().length >20){
			pass1.addClass("error");
			pass1Info.text("密码的长度需为6-20");
			pass1Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			pass1.removeClass("error");
			pass1Info.text("");
			pass1Info.removeClass("error");
			//validatePass2();
			return true;
		}
	}
	function validatePass2(){
		var a = $("#password1");
		var b = $("#password2");
		//are NOT valid
		if( pass1.val() != pass2.val() ){
			pass2.addClass("error");
			pass2Info.text("您两次输入的密码并不相同");
			pass2Info.addClass("error");
			return false;
		}
		//are valid
		else{
			pass2.removeClass("error");
			pass2Info.text("");
			pass2Info.removeClass("error");
			return true;
		}
	}
	function validateCellphone(){
		var a = $("#cellphone").val();
		var filter = /^[0-9]{8,11}$/;
		//if it's valid cellphone number
		if(filter.test(a)){
			cellphone.removeClass("error");
			cellphoneInfo.text("");
			cellphoneInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			cellphone.addClass("error");
			cellphoneInfo.text("您的电话号码不合法，请检查重新输入");
			cellphoneInfo.addClass("error");
			return false;
		}
	
	}
	function validateQQ(){
		var a = $("#qq").val();
		var filter = /^[0-9]{0,12}$/;
		//if it's valid qq number
		if(filter.test(a)){
			qq.removeClass("error");
			qqInfo.text("");
			qqInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			qq.addClass("error");
			qqInfo.text("您的QQ号码不合法，请检查重新输入");
			qqInfo.addClass("error");
			return false;
		}
	
	}
	function validateStudentid(){
		var a = $("#studentid").val();
		var filter = /^[0-9]{10}$/;
		//if it's valid studentid number
		if(filter.test(a)){
			studentid.removeClass("error");
			studentidInfo.text("");
			studentidInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			studentid.addClass("error");
			studentidInfo.text("您的学号不合法，请检查重新输入");
			studentidInfo.addClass("error");
			return false;
		}
	
	}
});