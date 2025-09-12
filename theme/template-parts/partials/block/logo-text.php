<?php
$block = $args ?? null;
if ($block) : ?>
	<div  data-aos-delay="100"  data-aos="fade-up" class="block  p-12 rounded-md flex items-center text-center  flex-col gap-3 justify-start">
		<?php if (!empty($block['img'])) : ?>
			<img class="object-contain h-[128px]" src="<?php echo $block['img']['url']; ?> "/>
		<?php endif; ?>

		<?php if (!empty($block['content'])) : ?>
			<p class="text-3xl font-barlow font-bold text-black"><?php echo $block['content']; ?></p>
		<?php endif; ?>

	</div>
<?php endif; ?>
