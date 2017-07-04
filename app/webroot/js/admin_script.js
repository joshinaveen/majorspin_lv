$(document).ready(function() {
	var isChecked = false;
	$(".check_all").click(function(){
		if($(this).is(":checked"))
		{
			$(".check_all").prop('checked', true);
			$('.check-box-select').prop('checked', true);
			$('.check-box-select').parent().parent('tr').addClass('active');
			isChecked = true;
		}
		else
		{
			$(".check_all").prop('checked', false);
			$('.check-box-select').prop('checked', false);
			$('.check-box-select').parent().parent('tr').removeClass('active');
			isChecked = false;
		}
	});

	$('.check-box-select').click(function() {
		$('.check-box-select').each(function() {
			if(!$(this).is(':checked'))
			{
				$(".check_all").prop('checked', false);	
				$(this).parent().parent('tr').removeClass('active');
			}

			if($(this).is(':checked'))
			{
				$(this).parent().parent('tr').addClass('active');
				isChecked = true;
			}
		});
	});
});


function triggerAction(formName){
	var isChecked = false;
	$('.check-box-select').each(function() {
		if($(this).is(':checked'))
		{
			isChecked = true;
		}
	});
	
	if(isChecked)
	{
		var selectValue = $('.selectAction').val();
		if(selectValue == 'delete'){
			dalert.confirm("Are You Sure?, This will delete record permanently.","Alert Confirm !",function(result){
				if(result){
					$('.'+formName).submit();
				}
				else{
					return false;
				}
			});	
			return false;
		}

		if(selectValue == ""){
			dalert.alert("Select some option to continue.","Alert!");
			return false;
		}
	}
	else
	{
		dalert.alert("Select atleast one record to continue.","Alert!");
		return false;
	}
	return true;
}


$(window).load(function(){
	$('form').find('input').each(function(){
		if($(this).prop('required')){
			$(this).parents('.form-group').find('label').addClass('is-required');
		}
	});

	$('form').find('select').each(function(){
		if($(this).prop('required')){
			$(this).parents('.form-group').find('label').addClass('is-required');
		}
	});

	$('form').find('textarea').each(function(){
		if($(this).prop('required')){
			$(this).parents('.form-group').find('label').addClass('is-required');
		}
	});
});

