<?php
/**
 * The template for displaying 404 pages (not found)
 * Custom 404 page for Green House Tuwima
 *
 * @package Future
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section for 404 -->
    <section class="error-404-hero">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="container mx-auto px-4 py-20 text-center relative z-10">
            <div class="max-w-4xl mx-auto">
                <!-- 404 Number with Animation -->
                <div class="mb-8" data-aos="fade-up">
                    <h1 class="error-number">404</h1>
                    <div class="error-line"></div>
                </div>

                <!-- Error Message -->
                <div class="mb-12" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="error-title">
                        <?php echo get_field('404_title', 'option') ?: 'Strona nie została znaleziona'; ?>
                    </h2>
                    <p class="error-description">
                        <?php echo get_field('404_description', 'option') ?: 'Przepraszamy, ale strona której szukasz nie istnieje lub została przeniesiona. Sprawdź adres URL lub skorzystaj z wyszukiwarki poniżej.'; ?>
                    </p>
                </div>

                <!-- Search Form -->
                <div class="mb-12" data-aos="fade-up" data-aos-delay="400">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="search-container">
                            <input type="search" class="search-field" placeholder="Szukaj na stronie..." value="<?php echo get_search_query(); ?>" name="s" />
                            <button type="submit" class="search-submit">
                                <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Szukaj
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons" data-aos="fade-up" data-aos-delay="600">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <?php echo get_field('404_home_button', 'option') ?: 'Strona główna'; ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/kontakt')); ?>" class="btn btn-outline">
                        <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <?php echo get_field('404_contact_button', 'option') ?: 'Kontakt'; ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Helpful Links Section -->
    <section class="helpful-links">
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-6xl mx-auto">
                <h3 class="section-title" data-aos="fade-up">Może Cię zainteresuje:</h3>
                <div class="links-grid">
                    <div class="link-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="link-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h4>Mieszkania</h4>
                        <p>Zobacz dostępne mieszkania w naszym projekcie</p>
                        <a href="<?php echo esc_url(home_url('/#mieszkania')); ?>" class="link-btn">Zobacz mieszkania</a>
                    </div>

                    <div class="link-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="link-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h4>Lokalizacja</h4>
                        <p>Sprawdź lokalizację i okolicę naszego projektu</p>
                        <a href="<?php echo esc_url(home_url('/#lokalizacja')); ?>" class="link-btn">Zobacz lokalizację</a>
                    </div>

                    <div class="link-card" data-aos="fade-up" data-aos-delay="600">
                        <div class="link-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h4>Galeria</h4>
                        <p>Zobacz zdjęcia i wizualizacje projektu</p>
                        <a href="<?php echo esc_url(home_url('/#galeria')); ?>" class="link-btn">Zobacz galerię</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Content -->
    <?php if (get_field('404_additional_content', 'option')): ?>
    <section class="additional-content">
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <?php echo wp_kses_post(get_field('404_additional_content', 'option')); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>

<style>
/* 404 Hero Section */
.error-404-hero {
    min-height: 80vh;
    position: relative;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('<?php echo get_template_directory_uri(); ?>/html/images/hero-bg.jpg') center/cover;
    opacity: 0.1;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0, 169, 6, 0.1) 0%, rgba(0, 169, 6, 0.05) 100%);
}

/* 404 Number Styling */
.error-number {
    font-size: clamp(6rem, 15vw, 12rem);
    font-weight: 900;
    color: #00a906;
    margin: 0;
    line-height: 0.8;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    font-family: 'Montserrat', sans-serif;
}

.error-line {
    width: 120px;
    height: 4px;
    background: linear-gradient(90deg, #00a906, #008a05);
    margin: 20px auto;
    border-radius: 2px;
}

/* Error Title and Description */
.error-title {
    font-size: clamp(1.5rem, 4vw, 2.5rem);
    font-weight: 700;
    color: #2c3e50;
    margin: 0 0 20px 0;
    font-family: 'Montserrat', sans-serif;
}

.error-description {
    font-size: clamp(1rem, 2.5vw, 1.25rem);
    color: #6c757d;
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
    font-family: 'Lato', sans-serif;
}

/* Search Form */
.search-form {
    max-width: 500px;
    margin: 0 auto;
}

.search-container {
    display: flex;
    background: white;
    border-radius: 50px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.search-container:focus-within {
    border-color: #00a906;
    box-shadow: 0 10px 30px rgba(0, 169, 6, 0.2);
}

.search-field {
    flex: 1;
    padding: 16px 24px;
    border: none;
    outline: none;
    font-size: 1rem;
    background: transparent;
    color: #2c3e50;
}

.search-field::placeholder {
    color: #adb5bd;
}

.search-submit {
    background: #00a906;
    color: white;
    border: none;
    padding: 16px 24px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Montserrat', sans-serif;
}

.search-submit:hover {
    background: #008a05;
    transform: translateY(-1px);
}

.search-icon {
    width: 20px;
    height: 20px;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    justify-content: center;
    margin-top: 40px;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 16px 32px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    font-family: 'Montserrat', sans-serif;
    position: relative;
    overflow: hidden;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn:hover::before {
    left: 100%;
}

.btn-primary {
    background: #00a906;
    color: white;
    border: 2px solid #00a906;
    box-shadow: 0 4px 15px rgba(0, 169, 6, 0.3);
}

.btn-primary:hover {
    background: #008a05;
    border-color: #008a05;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 169, 6, 0.4);
}

.btn-outline {
    background: transparent;
    color: #00a906;
    border: 2px solid #00a906;
}

.btn-outline:hover {
    background: #00a906;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 169, 6, 0.3);
}

.btn-icon {
    width: 20px;
    height: 20px;
}

/* Helpful Links Section */
.helpful-links {
    background: #f8f9fa;
    padding: 80px 0;
}

.section-title {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 700;
    color: #2c3e50;
    text-align: center;
    margin-bottom: 60px;
    font-family: 'Montserrat', sans-serif;
}

.links-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    max-width: 1000px;
    margin: 0 auto;
}

.link-card {
    background: white;
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.link-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    border-color: #00a906;
}

.link-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #00a906, #008a05);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
}

.link-icon svg {
    width: 30px;
    height: 30px;
}

.link-card h4 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2c3e50;
    margin: 0 0 15px 0;
    font-family: 'Montserrat', sans-serif;
}

.link-card p {
    color: #6c757d;
    line-height: 1.6;
    margin: 0 0 25px 0;
    font-family: 'Lato', sans-serif;
}

.link-btn {
    display: inline-block;
    background: #00a906;
    color: white;
    padding: 12px 24px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    font-family: 'Montserrat', sans-serif;
}

.link-btn:hover {
    background: #008a05;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 169, 6, 0.3);
}

/* Additional Content */
.additional-content {
    background: white;
    padding: 80px 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .error-404-hero {
        min-height: 70vh;
        padding: 40px 0;
    }

    .action-buttons {
        flex-direction: column;
        align-items: center;
    }

    .btn {
        width: 100%;
        max-width: 280px;
        justify-content: center;
    }

    .search-container {
        flex-direction: column;
        border-radius: 15px;
    }

    .search-submit {
        border-radius: 0 0 15px 15px;
        justify-content: center;
    }

    .links-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .link-card {
        padding: 30px 20px;
    }
}

@media (max-width: 480px) {
    .error-number {
        font-size: 4rem;
    }

    .error-title {
        font-size: 1.5rem;
    }

    .error-description {
        font-size: 1rem;
    }
}
</style>

<?php
get_footer();
