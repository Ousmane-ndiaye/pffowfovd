$(function() {
	$.datetimepicker.setLocale('fr');
	$('#general_user_info_birthday').datetimepicker({
		lang: 'fr',
		timepicker: false,
		format: 'd/m/Y',
		formatDate: 'd/m/Y'
	});

	$('#general_user_info_tel').mask('99 999 99 99');

	$('#liste-secteurs .secteur').click(function() {
		var hiddenInput = $(this).find('.form-secteur');
		if (hiddenInput.is(':checked') == true) {
			hiddenInput.prop('checked', false);
			$(this).removeClass('active');
		} else if (hiddenInput.is(':checked') == false) {
			hiddenInput.prop('checked', true);
			$(this).addClass('active');
		}
	});
});
