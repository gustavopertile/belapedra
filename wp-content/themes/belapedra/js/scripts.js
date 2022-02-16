console.log('teste');

jQuery(document).ready(function () {
	jQuery('.abelapedra-gestao-imagens .item').on('click', function () {
		jQuery(this).find('.popup').addClass('show');
		jQuery('.abelapedra-gestao-imagens .close').addClass('show');
	});
	jQuery('.abelapedra-gestao-imagens .close img').on('click', function () {
		jQuery('.abelapedra-gestao-imagens .item .popup').removeClass('show');
		jQuery('.abelapedra-gestao-imagens .close').removeClass('show');
	});
	if (jQuery('#page-contato').length) {
		jQuery('header').addClass('branco');
	}
});
