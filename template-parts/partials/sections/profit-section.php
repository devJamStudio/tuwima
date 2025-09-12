<?php
$profit_header = get_field('profit_header', get_the_ID());
$profit_content = get_field('profit_content', get_the_ID());
$profit_image = get_field('profit_image', get_the_ID());
$profit_list = get_field('profit_list', get_the_ID());
$profit_button = get_field('profit_button', get_the_ID());
?>

<?php if (!empty($profit_header) || !empty($profit_content) || !empty($profit_image)) : ?>
    <section    data-aos-delay="100"  data-aos="fade-up" class="profit-section my-10   profit-overlay">
		<div class="container mx-auto px-12 lg:px-24 2xl:px-16 text-black font-barlow ">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <!-- Left Column (Image) -->
                <?php if (!empty($profit_image)) : ?>
                    <div class=" relative text-center md:text-left">
						<div class="absolute top-0 left-0 w-full h-full icon-pln-hand icon-coins "></div>
						<div class="absolute top-0 left-0 w-full h-full icon-moneybag icon-pig "></div>

						<img src="<?php echo esc_url($profit_image['url']); ?>" alt="<?php echo esc_attr($profit_image['alt'] ?? 'Profit Image'); ?>" class=" w-full h-auto">
                    </div>
                <?php endif; ?>

                <!-- Right Column (Content) -->
                <div class="flex flex-col justify-start h-full gap-4 ">
                    <?php if (!empty($profit_header)) : ?>
                        <h2 class="font-barlow text-3xl lg:text-4xl font-bold text-black   mb-4"><?php echo wp_kses_post($profit_header); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($profit_content)) : ?>
                        <div class="text-gray-700 mb-4">
                            <?php echo wp_kses_post($profit_content); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($profit_list)) : ?>
                        <ul class="profit__list pl-5 mb-4 dotted_arrow-bottom-left__profit relative">
                            <?php foreach ($profit_list as $list_item) : ?>
                                <li class="mb-2"><?php echo wp_kses_post($list_item['list_item']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (!empty($profit_button['text']) && !empty($profit_button['url'])) : ?>
                        <a href="<?php echo esc_url($profit_button['url']); ?>" class="inline-block">
                           <button class="btn btn--primary text-white"> <?php echo esc_html($profit_button['text']); ?></button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
