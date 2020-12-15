$(document).ready(function () {
    $('.accordion-item__trigger').click(function () {
        $(this).next().slideToggle();
        $('.accordion-item__trigger').not(this).next().slideUp();
    });
});