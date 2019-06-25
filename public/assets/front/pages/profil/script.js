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
});
