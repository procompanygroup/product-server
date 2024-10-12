var valid=true;
var year=0;
$(document).ready(function() {
  
  $("#name").focusout(function (e) {
		if (!validatempty($(this))) {
  valid=valid && false;
			return false;
		}  
		if(!stringlength($(this).val(),1,15)){
			errorstyle($(this));
			valid=valid && false;
			return false;
		}else{
			validStyle($(this));
			valid=valid && true;
			return true;
		}
		 
	});


	
	$('.next').on('click', function (e) {
		e.preventDefault();
	 valid=true;
 var step=$(this).attr('data-step');

 stepvalidate(step);

 if(valid){
	var stepnum=parseInt(step);
	stepnum--;
	var width=25*stepnum;
	$('.signup-form__steps--progress').css('width',width+'%');
	$('#st'+step).addClass('active');
	$('.signup-form__content').hide();
	$('#signup-step'+step).show();

	if(step==6){
//alert('6');
sendform('#form-signup');
	}
 }
	});

	$('.prev').on('click', function (e) {	

	
		var step=$(this).attr('data-step');
		var stepnum=parseInt(step);
		var nextstep=stepnum+1;
		stepnum--;
		var width=25*stepnum;
		$('.signup-form__steps--progress').css('width',width+'%');
		$('#st'+nextstep).removeClass('active');
		$('.signup-form__content').hide();
		$('#signup-step'+step).show();			   
		   });

	function stepvalidate(step){
		var gender=$('input[name="gender"]').val();
if(step==2){
	$('#name').trigger('focusout');
	$('#email').trigger('focusout');
	$('#password').trigger('focusout');
	$('#confirm_password').trigger('focusout');
	//$('select').trigger('focusout');
if(gender=='male'){
	selectcheck($('#wife_num'));
	selectcheck($('#family_status'));
}else{
	selectcheck($('#wife_num_female'));
	selectcheck($('#family_status_female'));
}
	 

	selectcheck($('#children_num'));
	$('#birthdate').trigger('focusout');
	$('#birthdate').trigger('change');

}else if(step==3){
	selectcheck($('#residence'));
	selectcheck($('#nationality'));
	selectcheck($('#city'));
	selectcheck($('#weight'));
	selectcheck($('#height'));
	selectcheck($('#skin'));
	selectcheck($('#body'));	
}else if(step==4){
	selectcheck($('#religiosity'));
	selectcheck($('#prayer'));
	selectcheck($('#smoking'));
	if(gender=='male'){
		selectcheck($('#beard'));
	}else{
		selectcheck($('#veil'));
 
	}
	
	selectcheck($('#education'));
	selectcheck($('#financial'));
	selectcheck($('#work'));
	$('#job').trigger('focusout');
	selectcheck($('#income'));
	selectcheck($('#health'));
 
}else if(step==6){
	$('#first_name').trigger('focusout');
	$('#mobile').trigger('focusout');
	$('#acceptConditions').trigger('focusout');

}
return valid;
	}	   
	
  $("#email").focusout(function (e) {
	$('#validate-email').text("").hide();
    if (!validatempty($(this))) {
			
			valid=valid && false;
			return false;
		}  
		if (!validateinputemail($(this),emailmsg)) {
			
			valid=valid && false;
			return false;
		} else {
			checkmail($(this).val());
			return valid; 
		}
	}); 
  $("#password").focusout(function (e) {
		if (!validatempty($(this))) {
			valid=valid && false;
			return false;
		} else {
			valid=valid && true;
			return true;
		}
	});
  $("#confirm_password").focusout(function (e) {
		if (!validatempty($(this))) {
			valid=valid && false;
			return false;
		} 
	if($(this).val()== $("#password").val())
	{
		validStyle($(this));
		valid=valid && true;
		return true;
	}else{
		errorstyle($(this));
		valid=valid && false;
		return false;
	}

	});

	$("select").focusout(function (e) {
		if (!validatempty($(this))) {
			valid=valid && false;
			return false;
		}  
		var option = $(this).find(":selected").val(); 
		if($(this).attr('id')=='children_num'){
			if (option==-1)  {
				errorstyle($(this));
				valid=valid && false;
			return false;
			}else{
				validStyle($(this));
				valid=valid && true;
				return true;
			}
		
		}else{
			if (option==0)  {

				errorstyle($(this));
				valid=valid && false;
			return false;
			}else{
				validStyle($(this));
				valid=valid && true;
				return true;
			}
		}
		
	
	});

	 function selectcheck(selElement) {
		if (!validatempty(selElement)) {
			valid=valid && false;
			return false;
		}  
		var option = selElement.find(":selected").val(); 
		if(selElement.attr('id')=='children_num'){
			if (option==-1)  {
				errorstyle(selElement);
				valid=valid && false;
			return false;
			}else{
				validStyle(selElement);
				valid=valid && true;
				return true;
			}		
		}else{
			if (option==0)  {

				errorstyle(selElement);
				valid=valid && false;
			return false;
			}else{
				validStyle(selElement);
				valid=valid && true;
				return true;
			}
		}
	};
	// $('#birthdate').on('change', function (e) {
	// 	validDate($(this).val());
		
	// });
	$('#birthdate').focusout(function (e) {
		if (!validatempty($(this))) {
			valid=valid && false;
			return false;
		} 
		validDate($(this).val());
if(nowyear-year>17){
	validStyle($(this));
	valid=valid && true;
	 	return true;
}else{
	errorstyle($(this));
	valid=valid && false;
	  	return false;
}
	});
	$('#birthdate').on('change', function (e) {
		if (!validatempty($(this))) {
			valid=valid && false;
			return false;
		} 
		validDate($(this).val());
if(nowyear-year>17){
	validStyle($(this));
	valid=valid && true;
	 	return true;
}else{
	errorstyle($(this));
	valid=valid && false;
	  	return false;
}
	 

	});

	$("#job").focusout(function (e) {
		if (!validatempty($(this))) {
			valid=valid && false;
			return false;
		} else {
			valid=valid && true;
			return true;
		}
	});

   
 
	$("#first_name").focusout(function (e) {
		if (!validatempty($(this))) {
			valid=valid && false;
			return false;
		} else {
			valid=valid && true;
			return true;
		}
	});
	$("#mobile").focusout(function (e) {
		if (!validatempty($(this))) {
			valid=valid && false;
			return false;
		}  
		if(!allnumeric($(this).val())){
			errorstyle($(this));
			valid=valid && false;
			return false;
		} 

	if(!stringlength($(this).val(),9,14)){
		errorstyle($(this));
		valid=valid && false;
			return false;
		} else{
			validStyle($(this));
			valid=valid && true;
			return true;
		}

	});

	$("#acceptConditions").focusout(function (e) {
		if( !$(this).is(':checked')  ){

			errorstyle($(this).parent());
			valid=valid && false;
			return false;
		} else{
			validStyle($(this).parent());
			valid=valid && true;
			return true;
		}
	});

	function ClearErrors() {
		$("." + "invalid-feedback").html('').hide();
		$('.is-invalid').removeClass('is-invalid');
	}

	function sendform(formid) {
		ClearErrors();
		var form = $(formid)[0];
		var formData = new FormData(form);
		urlval = $(formid).attr("action");
		$.ajax({
			url: urlval,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,

			success: function (data) {
				$('.loading img').hide();
				if (data.length == 0) {
					noteError();
				} else if (data == "ok") {
					noteSuccess(); 	        
					$(location).attr('href',verifurl); 
				} else {
					noteError();
				}

			}, error: function (errorresult) {
				var response = $.parseJSON(errorresult.responseText);
				noteError();
				$.each(response.errors, function (key, val) {
				//	$("#" + "info-form-error").append('<li class="text-danger">' + val[0] + '</li>');
					$("#" + key + "-error").addClass('invalid-feedback').text(val[0]).show();
					$("#" + key).addClass('is-invalid');
				});

			}, finally: function () {		 

			}
		});
	}

   //end register
   
   $("#birthdatepicker").datepicker();
//new Date() 

function validDate(value) {
	var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
	if (m){
		value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);
		year=m[5];
	}
 
	return value;
}
//city
function fillCities(data) {
	var choose="اختر ..."
$("#city").html('<option title="" value="0" >'+choose+'</option>');
$.each(data, function( key,value) {

// if(selcntry==value.alpha2){
// $("#country").append('<option selected value="' + value.alpha2 + '">'+value.name+'</option>');

// 	}else
// 	{
		$("#city").append('<option value="' + value.id + '">'+value.name_ar+'</option>');

//	}
	}); // close each()
}

$('#residence').on('change', function (e) {

	var option = $(this).find(":selected").val(); 
	loading('.city-load');
	getcities(option);
	//endloading() ;

});
function getcities(option) {
	var newurl=cityurl;
	newurl=newurl.replace("ItemId", option);
	 
	$.ajax({
		url:newurl,
		type: "GET",  
	//	contentType: false,
	//	processData: false,
		//contentType: 'application/json',
		success: function (data) {			 
			if (data.length == 0) {			 
			} else   {
				fillCities(data);	 
			}	
			endloading('.city-load');	 
		}, error: function (errorresult) {	
			endloading('.city-load');		 
		} 
	});
}
function loading(cls) {
	//'.city-load'
$(cls).show();
}
function endloading(cls) {
	$(cls).hide();
}

function checkmail(email) {
	loading('.mail-load');
	var newurl=checkmailurl;
	 
	$.ajax({
		url:newurl,
		method: "POST",
	
		data:{  _token : token, data:{email:email}} ,
	//   contentType: false,
	//	processData: false,
		// contentType: 'application/json',
		success: function (data) {			 
			if (data.length == 0) {	
				errorstyle($('#email'));
				valid=valid && false;	
				$('#validate-email').text("غير متاح").removeClass('available').addClass('notav').show();
			} else  if(data=="ok") {
				validStyle($('#email'));
				valid=valid && true;
				$('#validate-email').text("متاح").removeClass('notav').addClass('available').show();
			}	
			endloading('.mail-load');	 
		}, error: function (errorresult) {	
			errorstyle($('#email'));
			valid=valid && false;	
			$('#validate-email').text("غير متاح").removeClass('available').addClass('notav').show();
			endloading('.mail-load');	

		} 
	});
}

  });
  function noteSuccess() {
    swal(success_msg);
  }
  function noteError() {
    swal(fail_msg);
  }