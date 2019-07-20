$(function() {
	function swipeFilter(nbreFilter) {
		var swiper = new Swiper('.swiper-container', {
			hashNavigation: {
				watchState: true
			},
			slidesPerView: nbreFilter,
			spaceBetween: 0,
			freeMode: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev'
			}
		});
	}

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

	//Initialize Swiper
	swipeFilter(parseInt(window.innerWidth / 130));

	$(window).on('resize', function() {
		var win = $(this);
		var nbreFilter = parseInt(win.width() / 130);
		swipeFilter(nbreFilter);
	});

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
