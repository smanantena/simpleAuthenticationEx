<?php
session_start();
if (is_null($_SESSION['user-state']) && is_null($_SESSION['user-role'])) {
    header('Location:/not-found');
}

if ($_SERVER['REQUEST_URI'] === '/disconnect' && in_array($_SESSION['user-role'], ['admin', 'user'])) {
    unset($_SESSION['user-state'], $_SESSION['user-role']);
    header('Location:/');
} else if (in_array($_SESSION['user-role'], ['admin', 'user'])) {
    header('Location:/not-found');
} else {
    unset($_SESSION['user-state'], $_SESSION['user-role']);
    header('Location:/');
}

