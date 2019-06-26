$(function() {
	$('#information_profil_comptences').tagsInput({
		unique: true,
		interactive: true,
		placeholder: 'Compétence...',
		delimiter: ';',
		removeWithBackspace: true
	});

	$('#experience_competences').tagsInput({
		unique: true,
		interactive: true,
		placeholder: 'Compétence...',
		delimiter: ';',
		removeWithBackspace: true
	});
	$('.btn-modal-popover').each(function() {
		$(this).popover({
			html: true,
			trigger: 'hover',
			container: 'body',
			placement: 'left',
			content: function() {
				return $(this).data('content');
			}
		});
		$(this).popover('show');
		$(this).click(function() {
			$($(this).data('target')).modal('show');
			$(this).popover('hide');
		});
	});
});
