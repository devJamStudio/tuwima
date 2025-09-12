<?php
$profit = get_field('profit'); // Fetch the group field
?>

<?php if (!empty($profit)) : ?>
    <section    data-aos-delay="100"  data-aos="fade-up" class="profit-section my-10   profit-overlay">
		<div class="container mx-auto px-12 lg:px-24 2xl:px-16 text-black font-barlow ">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <!-- Left Column (Image) -->
                <?php if (!empty($profit['image'])) : ?>
                    <div class=" relative text-center md:text-left">
						<div class="absolute top-0 left-0 w-full h-full icon-pln-hand icon-coins "></div>
						<div class="absolute top-0 left-0 w-full h-full icon-moneybag icon-pig "></div>

						<img src="<?php echo esc_url($profit['image']['url']); ?>" alt="Profit Image" class=" w-full h-auto">
                    </div>
                <?php endif; ?>

                <!-- Right Column (Content) -->
                <div class="flex flex-col justify-start h-full gap-4 ">
                    <?php if (!empty($profit['header'])) : ?>
                        <h2 class="font-barlow text-3xl lg:text-4xl font-bold text-black   mb-4"><?php echo strip_tags(($profit['header']),['</br>','<strong>','<span>']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($profit['content'])) : ?>
                        <div class="text-gray-700 mb-4">
                            <?php echo wp_kses_post($profit['content']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($profit['list'])) : ?>
                        <ul class="profit__list pl-5 mb-4 dotted_arrow-bottom-left__profit relative">
                            <?php foreach ($profit['list'] as $list_item) : ?>
                                <li class="mb-2"><?php echo strip_tags($list_item['list_item'],['</br>', '<strong>','<span>']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (!empty($profit['button']['content']) && !empty($profit['button']['url'])) : ?>
                        <a href="<?php echo esc_url($profit['button']['url']); ?>" class="inline-block">
                           <button class="btn btn--primary text-white"> <?php echo esc_html($profit['button']['content']); ?></button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
