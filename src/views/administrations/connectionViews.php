<?php

use App\Database\Querries\Users;

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';


session_start();


if (isset($_SESSION['user-state']) && isset($_SESSION['user-role'])) {
    if ($_SESSION['user-state'] === 'connected') {
        if ($_SESSION['user-role'] === 'user') {
            header('Location:/user-views');
        }
        if ($_SESSION['user-role'] === 'admin') {
            header('Location:/admin-views');
        }
    }
}

if (isset($_POST['username'])) {
    if (!is_null($_POST['username'])) {
        $username = htmlentities($_POST['username']);
    }
}

if (isset($_POST['password'])) {
    if (!is_null($_POST['password'])) {
        $password = htmlentities($_POST['password']);
    }
}

if (isset($username) && isset($password)) {
    
    $user = Users::getUsersByUsername($username)[0];
    if (!is_null($user)) {
        if ($user->check_password($password)) {
            $_SESSION['user-state'] = 'connected';
            $_SESSION['user-name'] = $user->get_username();
            $_SESSION['user-role'] = $user->get_role();
            header('Location:/connect-to');
        }
    }
}

$pageStyle = 'connect-styles.css';

$pageTitle = 'Connect to your space !';

ob_start();
echo '<main>';
echo '<div class="container">';
echo '<article>';
echo '<h1>Connect to your space</h1>';
echo '<form method="post">';
echo '<label class="form-controls" for="username">Your username</label>';
echo '<input class="form-controls" type="text" name="username" placeholder="" id="username"'; 
if (isset($username)) {
    echo "value={$username}";
}
echo '>';
echo '<label class="form-controls" for="password">Your password</label>';
echo '<input class="form-controls" type="password" name="password" id="password"';
if (isset($password)) {
    echo "value={$password}";
}
echo '>';
echo '<input class="form-controls" type="submit">';
echo '</form>';
echo '<hr>';
echo '<section>';
echo '<p class="text-center mt-3">Or - <a href="/create-account">create your account</a></p>';
echo '</section>';
echo '</article>';
echo '</div>';
echo '</main>';
$pageContent = ob_get_clean();

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'basicTemplate.php';
