import '../css/choix-profil.scss';

$(function() {
	$('#form_save').attr('disabled', 'disabled');

	$('.jumbotron-pro').click(function() {
		$('.jumbotron-pro').removeClass('active');
		$('.jumbotron-pro').find('.fa-check-circle').remove();
		$(this).addClass('active');
		$(this).append('<i class="fas fa-check-circle"></i>');
		$('#form_profil').val($(this).data('val'));
		$('#form_save').removeAttr('disabled');
	});

	$('#form_save').click(function() {
		if ($('#form_profil').val() != '') {
			$(this).removeAttr('disabled');
		} else {
			$(this).attr('disabled', 'disabled');
		}
	});
});
