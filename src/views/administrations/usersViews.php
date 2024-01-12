<?php
session_start();

if (is_null($_SESSION['user-state']) || is_null($_SESSION['user-role'])) {
    header('Location:/not-found');
}

if (isset($_SESSION['user-state']) && isset($_SESSION['user-role']) && isset($_SESSION['user-name'])) {
    if ($_SESSION['user-state'] === 'connected' && in_array($_SESSION['user-role'], ['admin', 'user'])) {
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'functionsToGenerateViews.php';

        $pageTitle = 'User\'s views';
        ob_start();
        echo '<main>';
        if ($_SESSION['user-role'] === 'user') {
            echo generateNavBar(['Home' => '/', 'Profile' => '/user-views/profile', 'Disconnect' => '/disconnect']);
        }
        if ($_SESSION['user-role'] === 'admin') {
            echo generateNavBar(['Home' => '/', 'Profile' => '/user-views/profile', 'Your admin\'s view' => '/admin-views', 'Disconnect' => '/disconnect']);
        }
        echo '<div class="container">';
        echo '<article>';
        echo '<h1>' . htmlentities($_SESSION['user-name']) . '\'s private space</h1>';
        echo '</article>';
        echo '</div>';
        echo '</main>';
        $pageContent = ob_get_clean();

        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'basicTemplate.php';
    }
}