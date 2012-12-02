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
	var author = $("#author");
	var authorInfo = $("#authorInfo");
	var isbn = $("#isbn");
	var isbnInfo = $("#isbnInfo");
	var publisher = $("#publisher");
	var publisherInfo = $("#publisherInfo");
	var oprice = $("#oprice");
	var opriceInfo = $("#opriceInfo");
	var nprice = $("#nprice");
	var npriceInfo = $("#npriceInfo");
	var contact = $("#contact");
	var contactInfo = $("#contactInfo");

	//On blur
	name.blur(validateName);
	author.blur(validateAuthor);
	isbn.blur(validateIsbn);
	publisher.blur(validatePublisher);
	oprice.blur(validateOprice);
	nprice.blur(validateNprice);
	contact.blur(validateContact);
	//On key press
	// name.keyup(validateName);
	// pass1.keyup(validatePass1);
	// pass2.keyup(validatePass2);
	//On Submitting
	form.submit(function(){
		if( batchValidation() )
			return true
		else
			return false;
	});
	
	function batchValidation(){
		return validateName() && validateIsbn() && validateAuthor() 
				&& validatePublisher() && validateOprice()
				&& validateNprice() && validateContact();
	
	}
	
	//validation functions
	function validateName(){
		//if it's NOT valid
		if(name.val().length < 3 || name.val().length >20 ){
			name.addClass("error");
			nameInfo.text("您的书名输入不合法，请检查重新输入");
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
	function validateAuthor(){
		//if it's NOT valid
		if(author.val().length < 3 || author.val().length >20 ){
			author.addClass("error");
			authorInfo.text("您的作者输入不合法，请检查重新输入");
			authorInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			author.removeClass("error");
			authorInfo.text("");
			authorInfo.removeClass("error");
			return true;
		}
	}
	function validateIsbn(){
		//if it's NOT valid
		if(isbn.val().length < 3 || isbn.val().length >20 ){
			isbn.addClass("error");
			isbnInfo.text("您的ISBN输入不合法，请检查重新输入");
			isbnInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			isbn.removeClass("error");
			isbnInfo.text("");
			isbnInfo.removeClass("error");
			return true;
		}
	}
	function validatePublisher(){
		//if it's NOT valid
		if(publisher.val().length < 3 || publisher.val().length >20 ){
			publisher.addClass("error");
			publisherInfo.text("您的出版社输入不合法，请检查重新输入");
			publisherInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			publisher.removeClass("error");
			publisherInfo.text("");
			publisherInfo.removeClass("error");
			return true;
		}
	}
	function validateOprice(){
		var filter = /^[0-9.]{1,}$/;
		//if it's NOT valid
		if( !filter.test(oprice.val()) ){
			oprice.addClass("error");
			opriceInfo.text("您的原价输入不合法，请检查重新输入");
			opriceInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			oprice.removeClass("error");
			opriceInfo.text("");
			opriceInfo.removeClass("error");
			return true;
		}
	}
	function validateNprice(){
		var filter = /^[0-9.]{1,}$/;
		//if it's NOT valid
		if( !filter.test(nprice.val()) ){
			nprice.addClass("error");
			npriceInfo.text("您的现价输入不合法，请检查重新输入");
			npriceInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			nprice.removeClass("error");
			npriceInfo.text("");
			npriceInfo.removeClass("error");
			return true;
		}
	}
	function validateContact(){
		var filter = /^[0-9]{5,}$/;
		//if it's NOT valid
		if( !filter.test(contact.val()) ){
			contact.addClass("error");
			contactInfo.text("您的联系电话输入不合法，请检查重新输入");
			contactInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			contact.removeClass("error");
			contactInfo.text("");
			contactInfo.removeClass("error");
			return true;
		}
	}
});