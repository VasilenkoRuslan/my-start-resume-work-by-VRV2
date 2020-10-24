$(document).ready(function () {
	/* Кнопка наверх */
	$(window).scroll(function() {
	if ($(this).scrollTop() !== 0) {
	$('#toTop').fadeIn();
	} else {
	$('#toTop').fadeOut();
	}
	});
	$('#toTop').click(function() {
		$('html, body').animate({ scrollTop: 0 }, 800);
	});
});


