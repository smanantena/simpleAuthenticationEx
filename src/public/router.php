<?php

if (preg_match('/\.(?:gif|png|jpeg|jpg|svg|ico|mp3|mp4|webm|js|css)$/', $_SERVER['REQUEST_URI'])) {
    return false;
} else {
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php';
}
