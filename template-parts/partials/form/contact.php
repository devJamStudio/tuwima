<?php
$privacyPolicy = get_field('privacy_policy', 'options');
$contactHeader = get_field('contact_form_header', 'options');

return array(
	'<div class="form-wrapper   p-6  xl:p-12 flex flex-col gap-6 font-barlow  relative " >', // Added wrapper with styling
	'<h2  class="text-5xl text-black mb-4" >' . $contactHeader . '</h2>', // Added header inside wrapper

	// First row with two inputs
	'<div class="form-row grid md:grid-cols-2 gap-4">',
	'<div >',
	'<label>[text* your-name autocomplete:name placeholder "Imię i nazwisko"]</label>',
	'</div>',
	'<div >',
	'<label>[text company autocomplete:company placeholder "Firma"]</label>',
	'</div>',
	'</div>',
	// Second row with two inputs
	'<div class="form-row grid md:grid-cols-2 gap-4">',
	'<div>',
	'<label>[text* your-phone placeholder "Telefon"]</label>',
	'</div>',
	'<div>',
	'<label>[email* your-mail autocomplete:email placeholder "Email"]</label>',
	'</div>',
	'</div>',

	// Last row with full-width text area
	'<div class=" w-full" >',
	'<label>[textarea your-message placeholder "Wiadomość"]</label>',
	'</div>',

	// Acceptance field
	'<div class="consent__wrapper flex flex-col gap-4" >',

	'<div class="form-row flex gap-4">',
	'[acceptance acceptance-872] Wyrażam zgodę na przekazanie i przetwarzanie moich danych osobowych w celu odpowiedzi na przesłaną wiadomość [/acceptance]',
	'</div>',

	// Privacy policy
	'<div class="form-row flex gap-4 justify-start">',

	'<div class="show-more-content" style="display: none;">',
	'<p>' . $privacyPolicy . '</p>',

	'<div class="btn--row row flex justify-end">',
	'<button type="button" class="btn btn--secondary__flex w-full" id="show_less">Schowaj politykę prywatności</button>',
	'</div>',
	'</div>',

	// Show more button
	'<button type="button" class="btn btn--secondary" id="show_more">Polityka prywatności</button>',

	'</div>',	'</div>',
	// Submit button
	'<div class="form-row flex justify-end">',
	'<button type="button" class="btn btn--primary" id="show_more">',
	'[submit "Wyślij"]',
	'</button>',
	'</div>',
	'</div>'
);
