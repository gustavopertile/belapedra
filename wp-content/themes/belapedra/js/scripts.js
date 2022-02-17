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

	// var myHeaders = {
	// 	headers: {
	// 		Accept: 'application/json',
	// 	},
	// };
	var myInit = {
		method: 'GET',
		headers: {
			Accept: 'application/json',
		},
		mode: 'cors',
		cache: 'default',
	};

	jQuery('#contato-pais').change(function () {
		idCountry = jQuery(this).val();
		console.log(idCountry);

		jQuery.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'gambiarra',
				url: 'http://www.geonames.org/childrenJSON?geonameId=' + idCountry,
			},
			success: function (data) {
				if (data) {
					console.log(data);
				}
			},
		});
	});
});
