jQuery(document).ready(function () {
	// HOME com animação

	if (jQuery('#page-home').length) {
		AOS.init();
	}

	// Popups A BELAPEDRA

	jQuery('.abelapedra-gestao-imagens .item').on('click', function () {
		jQuery(this).find('.popup').addClass('show');
		jQuery('.abelapedra-gestao-imagens .close').addClass('show');
	});
	jQuery('.abelapedra-gestao-imagens .close img').on('click', function () {
		jQuery('.abelapedra-gestao-imagens .item .popup').removeClass('show');
		jQuery('.abelapedra-gestao-imagens .close').removeClass('show');
	});

	// HEADER branco

	if (jQuery('#page-contato').length) {
		jQuery('header').addClass('branco');
	}

	// HEADER BLOG

	if (jQuery('#page-blog').length) {
		jQuery('header').addClass('branco blog');
	}

	// HEADER SIMPLE PAGE BLOG

	if (jQuery('#simple-page-blog').length) {
		jQuery('header').addClass('branco blog');
	}

	// Seleção de País/Estado/Cidade automatizado com API

	const selectStates = jQuery('#contato-estado');
	const selectCities = jQuery('#contato-cidade');

	jQuery('#contato-pais').change(function () {
		clearStates();
		clearCities();

		idCountry = jQuery(this).find('option:selected').data('id');

		console.log(idCountry);

		fetch('http://www.geonames.org/childrenJSON?geonameId=' + idCountry)
			.then((response) => response.json())
			.then((jsondata) => {
				let states = jsondata.geonames;

				states.map((state) => {
					const option = document.createElement('option');

					option.setAttribute('value', state.name);
					option.setAttribute('data-id', state.geonameId);
					option.textContent = state.name;

					selectStates.append(option);
				});
			});
	});

	jQuery('#contato-estado').change(function () {
		clearCities();

		idState = jQuery(this).find('option:selected').data('id');
		console.log(idState);

		fetch('http://www.geonames.org/childrenJSON?geonameId=' + idState)
			.then((response) => response.json())
			.then((jsondata) => {
				let cities = jsondata.geonames;

				cities.map((city) => {
					const option = document.createElement('option');

					option.setAttribute('value', city.name);
					option.setAttribute('data-id', city.geonameId);
					option.textContent = city.name;

					selectCities.append(option);
				});
			});
	});

	function clearStates() {
		selectStates
			.find('option')
			.remove()
			.end()
			.append(
				'<option id="option-disable" value disabled selected hidden>ESTADO</option>'
			);
	}

	function clearCities() {
		selectCities
			.find('option')
			.remove()
			.end()
			.append(
				'<option id="option-disable" value disabled selected hidden>CIDADE</option>'
			);
	}

	jQuery('#form-contato').on('submit', function () {});
});

function mask(o, f) {
	setTimeout(function () {
		var v = mphone(o.value);
		if (v != o.value) {
			o.value = v;
		}
	}, 1);
}

function mphone(v) {
	var r = v.replace(/\D/g, '');
	r = r.replace(/^0/, '');
	if (r.length > 10) {
		r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, '($1) $2-$3');
	} else if (r.length > 5) {
		r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, '($1) $2-$3');
	} else if (r.length > 2) {
		r = r.replace(/^(\d\d)(\d{0,5})/, '($1) $2');
	} else {
		r = r.replace(/^(\d*)/, '($1');
	}
	return r;
}
