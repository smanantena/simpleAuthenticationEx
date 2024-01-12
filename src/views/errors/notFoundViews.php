<?php

$pageStyle = 'errors-not-found.css';

ob_start();
echo '<main class="center-absolute-content">';
echo '<article>';
echo '<section>';
echo '<h1>Errors !</h1>';
echo '<p><a href="/">The url that you want does not exist. Please ! Return to the homepage</a></p>';
echo '</section>';
echo '</article>';
echo '</main>';
$pageContent = ob_get_clean();

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'basicTemplate.php';
