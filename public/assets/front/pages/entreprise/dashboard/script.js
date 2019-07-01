$(function() {
	//Initialize Swiper
	var swiper = new Swiper('.swiper-container', {
		hashNavigation: {
			watchState: true
		},
		slidesPerView: 10,
		spaceBetween: 0,
		freeMode: true,
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		}
	});

	function loadProfessionnel() {
		var currentSecteur = $('#liste-secteurs').find('.swiper-slide.active');
		var donnees = {
			id: currentSecteur.data('id')
		};
		$.get(currentSecteur.data('path'), donnees, function(data) {
			$('#liste-professionnels .on-loading-liste').hide();
			$('#liste-professionnels').append(JSON.parse(data));
		});
	}
	loadProfessionnel();

	$('#liste-secteurs .swiper-slide').each(function() {
		$(this).click(function() {
			$('#liste-secteurs').find('.swiper-slide.active').removeClass('active');
			$(this).addClass('active');
			$('#liste-professionnels').children().not('.on-loading-liste').remove();
			$('#liste-professionnels .on-loading-liste').show();
			loadProfessionnel();
		});
	});
});
