<?php
$privacyPolicy = get_field('privacy_policy', 'options');
$contactHeader = get_field('contact_form_header', 'options');

return array(
	'<div class="form-wrapper p-6 xl:p-12 flex flex-col gap-6 font-barlow relative">', // Added wrapper with styling
	'<h2 class="text-5xl text-black mb-4">' . $contactHeader . '</h2>', // Added header inside wrapper

	// First row with two inputs
	'<div class="form-row grid gap-4">',
		'<div>',
			'<label for="your-name">Imię i nazwisko</label>',
			'[text* your-name id:your-name placeholder "Wypełnij pole"]',
		'</div>',
	'</div>',

	// Second row with two inputs
	'<div class="form-row grid md:grid-cols-2 gap-4">',
		'<div>',
			'<label for="your-phone">Telefon</label>',
			'[text* your-phone id:your-phone placeholder "Wypełnij pole"]',
		'</div>',
		'<div>',
			'<label for="your-mail">Email</label>',
			'[email* your-mail id:your-mail placeholder "Wypełnij pole"]',
		'</div>',
	'</div>',

	// Last row with full-width text area


	// Acceptance field and submit in same row
	'<div class="form-row flex gap-4 items-center justify-end">',
		'[acceptance acceptance-872] Wyrażam zgodę na przekazanie i przetwarzanie moich danych osobowych w celu odpowiedzi na przesłaną wiadomość [/acceptance]',
		'<div class="btn--row flex justify-end">',
			'[submit "Wyśli Zapytanie"]',
		'</div>',
	'</div>',

	// Commented out privacy policy button
	/*
	'<div class="form-row flex gap-4 justify-start">',
		'<div class="show-more-content" style="display: none;">',
			'<p>' . $privacyPolicy . '</p>',
			'<div class="btn--row row flex justify-end">',
				'<button type="button" class="btn btn--secondary__flex w-full" id="show_less">Schowaj politykę prywatności</button>',
			'</div>',
		'</div>',
		'<button type="button" class="btn btn--secondary" id="show_more">Polityka prywatności</button>',
	'</div>',
	*/
	'</div>'
);
