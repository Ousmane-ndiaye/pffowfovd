$(function() {
	initForm();
	$('#information_profil_competences').tagsInput({
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
	$('.account-settings-form').each(function() {
		$(this).validate();
	});
	$('#modalEdit').on('show.bs.modal', function(e) {
		$(this).find('.modal-content').children().not('.spinner-waiting').remove();
	});

	$('#modalEdit').on('hidden.bs.modal', function(e) {
		$(this).find('.modal-content').children('.spinner-waiting').show();
	});
	$('.edit-profil').each(function() {
		$(this).click(function() {
			var donnees = {
				id: $(this).data('id'),
				entity: $(this).data('model'),
				nameForm: $(this).data('nameform'),
				namePage: $(this).data('namepage')
			};
			$.get($(this).data('path'), donnees, function(data) {
				$('#modalEdit .modal-content').children().hide();
				$('#modalEdit .modal-content').append(JSON.parse(data));
				initForm();
			});
		});
	});
});

function onHelpOverlay() {
	document.getElementById('help-overlay').style.display = 'block';
}

function offHelpOverlay() {
	document.getElementById('help-overlay').style.display = 'none';
}

function initForm() {
	$('.tagsInput').each(function(){
		$(this).tagsInput({
			unique: true,
			interactive: true,
			placeholder: 'Compétence...',
			delimiter: ';',
			removeWithBackspace: true
		});
	});

	$('.overflow-control-input').each(function(){
		$(this).click(function() {
			if ($(this).prop('checked') == true) {
				$('.detail-date-fin').hide();
				$('.date-encours').show();
			} else if ($(this).prop('checked') == false) {
				$('.date-encours').hide();
				$('.detail-date-fin').show();
			}
		});
	});
}
