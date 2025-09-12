<?php
$sections = get_field('sections');// Fetch the sections
?>
<?php if (!empty($sections)) :; ?>

    <!-- Alternating Sections -->
    <section  class="my-10 container mx-auto font-barlow text-black p-12  text-black font-barlow lg:px-24 2xl:px-16 ">
        <?php foreach ($sections as $index => $section) : ?>
            <?php

			$is_even = $index % 2 === 0; // Determine alternating layout
            $img_class = $is_even ? 'order-1' : 'order-2';
            $content_class = $is_even ? 'order-2   ' : 'order-1';
			$bg_class = $is_even ? 'dots__overlay-right__start' : '';
			$arrow_class  = $is_even ? 'dotted__arrow-bottom-left__start' : 'dotted_arrow-bottom-right__start';
            ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:gap-24 items-center mb-10 relative <?php echo $bg_class?>" >
                <!-- Image -->
                <?php if (!empty($section['section']['img']['url'])) : ?>
                    <div data-aos-delay="100"  data-aos="fade-up"  class="<?php echo $img_class; ?>">
                        <img src="<?php echo esc_url($section['section']['img']['url']); ?>" alt="" class="w-full h-auto ">
                    </div>
                <?php endif; ?>

                <!-- Content -->
                <div class="<?php echo $content_class; ?>">
                    <?php if (!empty($section['section']['header'])) : ?>
                        <h2 class="font-barlow text-3xl lg:text-4xl font-bold text-black mb-8 relative  <?php echo $arrow_class; ?>"><?php echo wp_kses_post($section['section']['header']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($section['section']['content'])) : ?>
					<div class="my-4">
                        <p class=""><?php echo wp_kses_post($section['section']['content']); ?></p>
					</div>
                    <?php endif; ?>

                    <?php if (!empty($section['section']['list']['list_item'])) : ?>
                        <ul class="ml-8 start__list list-inside my-4">
                            <?php foreach ($section['section']['list']['list_item'] as $list_item) : ?>
								<li class="mb-2"><?php echo strip_tags($list_item['content'],['</br>', '<strong>']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (!empty($section['section']['button']['content']) && !empty($section['section']['button']['url'])) : ?>
                        <a href="<?php echo esc_url($section['section']['button']['url']); ?>" class="inline-block text-white rounded">
							<button class="btn btn--primary my-4"> <?php echo esc_html($section['section']['button']['content']); ?></button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php endif; ?>
