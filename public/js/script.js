$(function(){


			$('body').on('click','#back-top',function(e){
				 $('html, body').animate({ scrollTop: 0}, 500);
			});

			var swiper = new Swiper('#main-banner .swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
         nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        loop:true,
        autoplay: 2000
    });

});


$(window).scroll(function() {
if ($(this).scrollTop() > 100){
  $('#back-top').fadeIn(500);

}
else {
	$('#back-top').fadeOut(500);
}


    $("#img-product").fileinput({
        language: 'ru',
        'showUpload':false,
        'maxFileSize':4096

    });

});