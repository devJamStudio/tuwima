<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Future
 */

get_header(); ?>

<main id="primary" class="site-main">
    <section class="error-404 not-found">
        <div class="container mx-auto px-4 py-16 text-center">
            <div class="max-w-2xl mx-auto">
                <!-- 404 Number -->
                <div class="mb-8" data-aos="fade-up">
                    <h1 class="text-9xl font-bold text-primary mb-4">404</h1>
                    <div class="w-24 h-1 bg-primary mx-auto"></div>
                </div>
                
                <!-- Error Message -->
                <div class="mb-8" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">
                        <?php echo get_field('404_title', 'option') ?: 'Strona nie została znaleziona'; ?>
                    </h2>
                    <p class="text-lg text-gray-600 mb-6">
                        <?php echo get_field('404_description', 'option') ?: 'Przepraszamy, ale strona której szukasz nie istnieje lub została przeniesiona.'; ?>
                    </p>
                </div>
                
                <!-- Search Form -->
                <div class="mb-8" data-aos="fade-up" data-aos-delay="400">
                    <form role="search" method="get" class="search-form max-w-md mx-auto" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="flex">
                            <input type="search" class="search-field flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Szukaj..." value="<?php echo get_search_query(); ?>" name="s" />
                            <button type="submit" class="search-submit bg-primary text-white px-6 py-3 rounded-r-lg hover:bg-primary-dark transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="600">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        <?php echo get_field('404_home_button', 'option') ?: 'Strona główna'; ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/kontakt')); ?>" class="btn btn-outline">
                        <?php echo get_field('404_contact_button', 'option') ?: 'Kontakt'; ?>
                    </a>
                </div>
                
                <!-- Additional Content -->
                <?php if (get_field('404_additional_content', 'option')): ?>
                <div class="mt-12" data-aos="fade-up" data-aos-delay="800">
                    <?php echo wp_kses_post(get_field('404_additional_content', 'option')); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<style>
.error-404 {
    min-height: 70vh;
    display: flex;
    align-items: center;
}

.btn {
    display: inline-block;
    padding: 12px 24px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #00a906;
    color: white;
    border: 2px solid #00a906;
}

.btn-primary:hover {
    background-color: #008a05;
    border-color: #008a05;
    color: white;
}

.btn-outline {
    background-color: transparent;
    color: #00a906;
    border: 2px solid #00a906;
}

.btn-outline:hover {
    background-color: #00a906;
    color: white;
}

.search-form .search-field:focus {
    border-color: #00a906;
    box-shadow: 0 0 0 3px rgba(0, 169, 6, 0.1);
}

.search-submit:hover {
    background-color: #008a05;
}
</style>

<?php
get_footer();
