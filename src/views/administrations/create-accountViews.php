<?php

use App\Database\Querries\Users;

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'functionsToGenerateViews.php';
session_start();

if (isset($_SESSION['user-state']) || isset($_SESSION['user-role'])) {
    header('Location:/');
}

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repeated-password'])) {
    $usersList = null;
    $username = strtolower(htmlentities($_POST['username']));
    $password = htmlentities($_POST['password']);
    $repeatedPassword = htmlentities($_POST['repeated-password']);
    
    try {
        $usersList = Users::getUsersByUsername($username);
    } catch (Exception $e) {}
    if ($usersList) {
        $message = 'The username are already exit please choose another.';
        unset($username, $password);
    } else if ($password == '' || $repeatedPassword == '') {
        $message = 'You must write your password.';
    } else if ($password !== $repeatedPassword) {
        $message = 'You must write the identic passord for the two last form input.';
    }
}

if (is_null($message) && isset($username) && isset($password) && isset($repeatedPassword)) {
    $userCreationState = Users::createUser(strtolower($username), $password, 'user');
    if (!$userCreationState) {
        $message = 'There are some problem, recreate your account later.';
    }
}

if (isset($userCreationState) && $userCreationState) {
    ob_start();
    echo '<main>';
    echo '<div class="container">';
    echo '<article>';
    echo '<h1>Your account was created successfuly.</h1>';
    echo '<p><a href="/connect-to">You can connect to access to your private space.</a></p>';
    echo '</article>';
    echo '</div>';
    echo '</main>';
    $pageContent = ob_get_clean();

} else {

    ob_start();
    echo '<main>';
    echo '<article>';
    echo '<div class="container">';
    echo '<h1>Create a new account.</h1>';
    if (isset($message)) {
        echo "<p class=\"text-warning\">{$message}</p>";
    }
    echo '<form method="post">';
    echo '<label for="username">Your username</label>';
    echo '<input class="form-controls" type="text" name="username" id="username"';
    if (isset($username)) {
        echo ' value="' . $username . '"';
    }
    echo '>';
    echo '<label for="password">Your password</label>';
    echo '<input class="form-controls" type="password" name="password" id="password">';
    echo '<label for="repeated-password">Confirm your password</label>';
    echo '<input class="form-controls" type="password" name="repeated-password" id="repeated-password">';
    echo '<input type="submit" value="Create account">';
    echo '</form>';
    echo '</article>';
    echo '</div>';
    echo '</main>';
    $pageContent = ob_get_clean();
}

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR .'basicTemplate.php';
