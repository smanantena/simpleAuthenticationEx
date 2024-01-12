<?php
$uriPatern = '/^\/user\/role=[a-zA-Z]+/';
if (preg_match($uriPatern, $_SERVER['REQUEST_URI'])) {
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'administrations' . DIRECTORY_SEPARATOR . 'usersViews.php';
} else {
    switch ($_SERVER['REQUEST_URI']) {
        case '/':
            require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'visitors' . DIRECTORY_SEPARATOR . 'visitorsViews.php';
            break;
        case '/error':
            require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'errors' . DIRECTORY_SEPARATOR . 'notFoundViews.php';
            break;
        case '/connect-to':
            require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'administrations' . DIRECTORY_SEPARATOR . 'connectionViews.php';
            break;
        case '/user-views':
            require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'administrations' . DIRECTORY_SEPARATOR . 'usersViews.php';
            break;
        case '/admin-views':
            require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'administrations' . DIRECTORY_SEPARATOR . 'adminViews.php';
            break;
        case '/disconnect':
            require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'administrations' . DIRECTORY_SEPARATOR . 'disconnectViews.php';
            break;
        case '/create-account':
            require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'administrations' . DIRECTORY_SEPARATOR . 'create-accountViews.php';
            break;
        

        default:
            header('Location:/error');
            break;
    }
}
