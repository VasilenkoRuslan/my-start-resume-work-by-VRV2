$(document).ready(function () {
	/* Меню */
	$('ul.menu a[href^="#"]').click(function(){
		var target = $(this).attr('href');
		$('html, body').animate({
			scrollTop: $(target).offset().top
		}, 500);
		$("ul.menu a[href^='#']").css({'color':'#212121'});
		$(this).css({'color':'#004bee'});
		return false;
	});
	/* Выпадающее меню */
	$('.menu-icon').click(function() {
		$('nav').slideToggle(500);
		$('.menu-bar ul').css({'display':'flex', 'flex-direction':'column'});
		if($(this).html()==='<i class="fas fa-bars"></i>') {
			$(this).html('<i class="fas fa-times"></i>');
			$(this).css({'font-size':'30px'});
		} else {
			$(this).html('<i class="fas fa-bars"></i>');
			$(this).css({'font-size':'25px'});
		}
	});
	/* Кнопка наверх */
	$(window).scroll(function() {
	if ($(this).scrollTop() !== 0) {
	$('#toTop').fadeIn();
	/* $('#toTop').css({"display":"block"}); */
	} else {
	$('#toTop').fadeOut();
	/* $('#toTop').css({"display":"none"}); */
	}
	});
	$('#toTop').click(function() {
		$('html, body').animate({ scrollTop: 0 }, 800);
	});
});


