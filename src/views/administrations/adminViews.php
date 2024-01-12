<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'functionsToGenerateViews.php';

session_start();


if (is_null($_SESSION['user-state']) || is_null($_SESSION['user-role'])) {
    header('Location:/not-found');
}

if (isset($_SESSION['user-state']) && isset($_SESSION['user-role'])) {
    if ($_SESSION['user-state'] === 'connected' && $_SESSION['user-role'] === 'admin') {
        
        
        $pageTitle = 'Administration';
        ob_start();
        echo '<main>';
        echo generateNavBar(['Home' => '/', 'Profile' => '/admin-views/profile', 'Your user\'s view' => '/user-views', 'Disconnect' => '/disconnect']);
        echo '<div class="container">';
        echo '<article>';
        echo '<h1>Administration space</h1>';
        echo '<p>Welcome to manage the website.</p>';
        echo '</article>';
        echo '</div>';
        echo '</main>';
        $pageContent = ob_get_clean();
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'basicTemplate.php';
    } else if ($_SESSION['user-state'] === 'connected' && $_SESSION['user-role'] === 'user') {
        
        header('Location:/user-views');
    } else {
        header('Location:/not-found');
    }
}
