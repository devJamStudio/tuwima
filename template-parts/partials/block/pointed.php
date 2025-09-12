<?php
// Retrieve the data passed to this template.
$block = $args;

// Determine content and image order based on index
$is_image_left = $block['index'] % 2 === 0;
$content_order = $is_image_left ? 'order-2 text-right ' : 'order-1 text-left ';
$image_order = $is_image_left ? 'order-1 ' : 'order-2';
$circle_order = $is_image_left ? 'order-3' : 'order-1';
$inner_order = $is_image_left ? 'order-3' : 'order-2';
$arrow_order = $is_image_left ? 'pointed-block__dotted__arrow-bottom-left' : 'pointed-block__dotted__arrow-bottom-right';
?>
<div data-aos-delay="100"  data-aos="fade-up"  class="flex  gap-2 lg:gap-[3rem] my-20 text-black   text-black font-barlow  max-w-[65rem] justify-between items-center   mx-auto">
	<div class="image w-full flex items-center  justify-center <?php echo $image_order; ?>">
		<img src="<?php echo esc_url($block['image']['url']); ?>" alt="<?php echo esc_attr($block['image']['alt']); ?>" class="">
	</div>
	<div class="content flex  max-h-fit justify-center w-full  min-w-[20rem] max-w-[30rem]  items-center  <?php echo $content_order; ?>">
		<div class="flex  max-h-fit  gap-6 ">
			<div class="flex flex-col max-h-fit <?php echo $inner_order; ?>">
		<h3 class="text-3xl text-black font-barlow font-bold mb-4"><?php echo $block['header']; ?></h3>

		<p class="text-md text-black" ><?php echo $block['content']; ?></p>
			</div>
			<div class="flex items-center <?php echo $circle_order; ?>">
			<span class="bg-primary w-20 h-20  text-white text-4xl font-bold rounded-[50rem] aspect-square flex items-center justify-center  <?php echo $arrow_order; ?>"><?php echo $block['index']; ?></span>
			</div>
		</div>

	</div>
</div>
