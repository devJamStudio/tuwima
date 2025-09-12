<?php
$card = $args;

// Render the card content.
?>
<div class="card flex flex-col rounded-lg bg-white shadow-lg gap-6 mb-8">

		<div class="image">
			<img src="<?php echo esc_url($card['img']['url']); ?>"
				 alt="<?php echo esc_attr($card['img']['alt']); ?>"
				 class="rounded-md shadow-lg w-full">
		</div>
	<div class="content flex flex-col justify-center font-barlow p-8">
		<h3 class="text-xl text-black font-bold mb-4">
			<?php echo esc_html($card['header']); ?>
		</h3>
		<p><?php echo $card['content']; ?></p>
		<?php if (!empty($card['button']['content'])) : ?>
			<a href="<?php echo esc_url($card['button']['url']); ?>" class="btn btn--primary rounded-lg text-center text-white font-barlow font-bold mt-4">
				<?php echo esc_html($card['button']['content']); ?>
			</a>
		<?php endif; ?>
	</div>

</div>
