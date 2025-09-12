<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CertExpert
 */

?>

<header id="masthead"  class="absolute  w-full z-[9] top-0 font-barlow ">
	<div class="navbar__container flex  flex-row fixed w-full top-0   items-center justify-between  border-b border-gray-300 md:border-b-0 <?php if (is_404()){ echo 'bg-white';};?>">
		<div class="logo__wrapper max-w-16 sm:max-w-[100%] bg-white  p-2 sm:m-1 lg:p-0 lg:ml-8 xl:mt-12    justify-center  lg:max-w-full flex align-center items-center flex-col gap-2   xl:ml-16   ">
			<?php echo the_custom_logo();?>

			<?php echo scroll_logo();?>

		</div>

		<div class="nav__wrapper bg-white flex items-end md:items-center justify-end xl:justify-between xl:gap-12 2xl:gap-[6rem]  md:mr-12   md:border-b md:border-gray-300  md:pb-6 w-full ">

			<nav id="site-nav"  class="hidden xl:flex flex-1     w-full " aria-label="<?php esc_attr_e( 'Main Navigation', 'future' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'main__menu',
						'menu_class' => 'flex w-full pl-8 text-black justify-between   text-sm xl:text-md w-full gap-2   font-lato font-semibold break-all',
						'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
					)
				);
				?>

			</nav><!-- #site-navigation -->


		<div class="justify-self-center md:justify-self-end    relative flex-row-reverse order-3 md:pr-1 xl:pr-6  items-start justify-end md:items-end flex">
			<button name="toggle-menu" id="mobile-menu__toggle" class=" hamburger-toggle self-center  pr-6 flex xl:hidden">
				<span class="hamburger-lines">
					<span></span>
					<span></span>
					<span></span>
    			</span>
			</button>
			<div class="contact__bar  flex  xl:relative w-fit xl:w-full right-0 top-[180px] xl:top-0 xl:flex flex-col">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'contact',
						'menu_id'        => 'social__menu',
						'menu_class' => 'flex w-full  mb-[-5px] items-end justify-end flex-row gap-3 xl:gap-4 text-sm barlow-semibold text-right break-all',
						'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
					)
				);
				?>
			</div>
		</div>
		</div>
	</div>
</header><!-- #masthead -->
<div id="nav__bg--overlay" class="fixed    h-screen w-full top-0 left-0 "></div>
<nav id="mobile-navigation" class=" z-[99] flex-col px-4  pt-8 sm:pt-10 lg:pt-20 fixed top-0 right-0 w-75 py-8 bg-white" aria-label="<?php esc_attr_e( 'Main Navigation', 'future' ); ?>">
	<button name="toggle-menu" id="mobile-menu__toggle-close" class=" hamburger-close self-end  text-black flex xl:hidden">
				<span class="hamburger-lines active">
					<span></span>
					<span></span>
					<span></span>
    			</span>
	</button><?php

	wp_nav_menu(
		array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'mobile__menu',
			'menu_class' => 'flex w-full flex-col h-full align-center p-4 justify-start text-black font-bold h-full gap-6 text-md  font-lato ',
			'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
		)
	);
	?>
</nav><!-- #mobile-navigation -->
