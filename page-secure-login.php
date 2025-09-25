<?php
/**
 * Template Name: Secure Login
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Redirect to WordPress login if not already logged in
if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
    exit;
}

// Check if user has admin privileges
if (!current_user_can('administrator')) {
    wp_die('Access denied. Administrator privileges required.');
}

get_header();
?>

<div class="secure-login-container">
    <div class="secure-login-content">
        <h1>Secure Admin Access</h1>
        <p>Welcome to the secure admin panel for Green House Tuwima.</p>

        <div class="admin-info">
            <h2>Admin Credentials</h2>
            <ul>
                <li><strong>Username:</strong> admin_tuwima</li>
                <li><strong>Password:</strong> GREENHOUSEtuwima</li>
                <li><strong>Email:</strong> biuro@budraise.pl</li>
            </ul>
        </div>

        <div class="admin-links">
            <a href="<?php echo admin_url(); ?>" class="btn btn--primary">Go to WordPress Admin</a>
            <a href="<?php echo wp_logout_url(); ?>" class="btn btn--secondary">Logout</a>
        </div>
    </div>
</div>

<style>
.secure-login-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #00a906 0%, #008a05 100%);
    padding: 20px;
}

.secure-login-content {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    max-width: 500px;
    width: 100%;
    text-align: center;
}

.secure-login-content h1 {
    color: #00a906;
    margin-bottom: 20px;
    font-size: 2rem;
}

.secure-login-content p {
    color: #666;
    margin-bottom: 30px;
    font-size: 1.1rem;
}

.admin-info {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
    text-align: left;
}

.admin-info h2 {
    color: #333;
    margin-bottom: 15px;
    font-size: 1.3rem;
}

.admin-info ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.admin-info li {
    padding: 8px 0;
    border-bottom: 1px solid #e9ecef;
    font-family: monospace;
}

.admin-info li:last-child {
    border-bottom: none;
}

.admin-links {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn {
    display: inline-block;
    padding: 12px 24px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    min-width: 150px;
}

.btn--primary {
    background: #00a906;
    color: white;
}

.btn--primary:hover {
    background: #008a05;
    transform: translateY(-2px);
}

.btn--secondary {
    background: transparent;
    color: #00a906;
    border: 2px solid #00a906;
}

.btn--secondary:hover {
    background: #00a906;
    color: white;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .secure-login-content {
        padding: 30px 20px;
    }

    .admin-links {
        flex-direction: column;
    }

    .btn {
        width: 100%;
    }
}
</style>

<?php get_footer(); ?>
