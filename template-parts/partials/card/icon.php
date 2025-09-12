<?php
// Access the card data from the passed arguments
$card = $args ?? null;
if ($card) : ?>
	<div class="card shadow-lg p-12  bg-white rounded-md flex items-center flex-col gap-3 justify-center">
		<?php if (!empty($card['icon'])) : ?>
			<img src="<?php echo $card['icon']['url']; ?> "/>
		<?php endif; ?>

		<?php if (!empty($card['header'])) : ?>
			<h5 class="text-3xl font-barlow font-bold text-black"><?php echo strip_tags($card['header'],['<br>','<span>','<strong>']); ?></h5>
		<?php endif; ?>

	</div>
<?php endif; ?>
