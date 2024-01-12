<?php

function generateNavBar(array $navToCreate) : string
{
    ob_start();
    echo '<nav class="navbar">';
    echo '<div class="container">';
    echo '<ul class="nav-list">';
    foreach ($navToCreate as $navLabel => $navLink) {
        echo '<li class="nav-item">';
        echo "<a class=\"nav-link\" href=\"{$navLink}\">";
        echo $navLabel;
        echo '</a>';
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>';
    echo '</nav>';
    $nav = ob_get_clean();
    return $nav;
}
