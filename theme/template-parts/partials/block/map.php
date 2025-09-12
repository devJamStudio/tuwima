<section>
	<!-- CSSMap - Poland -->
	<?php
	$ordered_terms = [
		'Dolnośląskie', 'Kujawsko-Pomorskie', 'Lubelskie', 'Lubuskie', 'Łódzkie', 'Małopolskie', 'Mazowieckie',
		'Opolskie', 'Podkarpackie', 'Podlaskie', 'Pomorskie', 'Śląskie', 'Świętokrzyskie', 'Warmińsko-Mazurskie',
		'Wielkopolskie', 'Zachodniopomorskie'
	];

	echo '<section><div id="map-poland" data-aos="fade-up" data-aos-duration="1000">';
	echo '<ul class="poland">';

	foreach ($ordered_terms as $index => $term_name) {
		$term = get_term_by('name', $term_name, 'wojewodztwa');
		if ($term && !is_wp_error($term)) {
			$term_link = get_term_link($term);

			// Add AOS animations to each list item with incremental delays
			$delay = 200 + ($index * 100); // Incremental delay for staggered animation
			echo '<li class="pl' . ($index + 1) . '" data-aos="fade-in" data-aos-delay="' . esc_attr($delay) . '">';
			echo '<a href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a>';
			echo '</li>';
		}
	}

	echo '</ul></div></section>';
	?>
</section>
