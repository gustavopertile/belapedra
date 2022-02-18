jQuery(document).ready(function () {
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

	// Seleção de País/Estado/Cidade automatizado com API

	const selectStates = jQuery('#contato-estado');
	const selectCities = jQuery('#contato-cidade');

	jQuery('#contato-pais').change(function () {
		clearStates();
		clearCities();

		idCountry = jQuery(this).val();
		console.log(idCountry);

		fetch('http://www.geonames.org/childrenJSON?geonameId=' + idCountry)
			.then((response) => response.json())
			.then((jsondata) => {
				let states = jsondata.geonames;

				states.map((state) => {
					const option = document.createElement('option');

					option.setAttribute('value', state.geonameId);
					option.textContent = state.name;

					selectStates.append(option);
				});
			});
	});

	jQuery('#contato-estado').change(function () {
		clearCities();

		idState = jQuery(this).val();
		console.log(idState);

		fetch('http://www.geonames.org/childrenJSON?geonameId=' + idState)
			.then((response) => response.json())
			.then((jsondata) => {
				let cities = jsondata.geonames;

				cities.map((city) => {
					const option = document.createElement('option');

					option.setAttribute('value', city.geonameId);
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
});
