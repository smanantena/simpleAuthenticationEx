<?php
session_start();

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'functionsToGenerateViews.php';


ob_start();

if (isset($_SESSION['user-role']) && isset($_SESSION['user-state'])) {
    echo generateNavBar(['Home' => '/', 'Your ' . $_SESSION['user-role'] . ' space' => '/' . $_SESSION['user-role'] . '-views', 'Disconnect' => '/disconnect']);
} else {
    echo generateNavBar(['Home' => '/', 'Connect' => '/connect-to']);
}
echo '<main>';
echo '<div class="container">';
echo '<article>';
echo '<section>';
echo '<h1>Welcome to the blog</h1>';
echo '<p>' . nl2br('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde, ea? Repudiandae, ex illo? Culpa officiis distinctio quos corrupti, quisquam dolorum sunt vel fuga magnam eos labore consectetur ratione optio repellendus blanditiis nam perspiciatis perferendis illo dignissimos voluptate molestiae molestias natus? Unde officiis harum doloribus voluptates eveniet aut! Esse vitae quis non sapiente reprehenderit consectetur culpa eaque dolor quam sequi itaque maxime explicabo numquam, exercitationem, in accusamus ut nemo minus quos debitis animi dolore! Dolorem expedita necessitatibus ut, corporis dolore repudiandae magni, beatae accusamus omnis laborum consequatur. Consequatur, cum itaque hic aut sint vero sunt dolores dignissimos impedit voluptatem. Fuga mollitia nesciunt tempora sed quidem ullam, voluptatem iste, voluptate omnis sapiente consequatur cumque eaque? Rem enim alias id excepturi ullam illum tempore dignissimos unde molestias quasi! Laborum distinctio doloribus excepturi tempora quas modi quod suscipit cum, eum culpa porro fugit cupiditate minima. Tenetur ab, inventore libero similique distinctio laborum animi reprehenderit et earum eos, omnis quam doloribus assumenda ducimus necessitatibus magni illum, nemo voluptate ullam maiores vitae minus. Qui quo, optio, dolorum earum eius ad iure vel necessitatibus nulla sunt quia. Temporibus nam consequatur eaque veniam autem nihil dolor quisquam. Molestiae cum rerum expedita vitae iste voluptatum quaerat maxime perspiciatis quos atque necessitatibus dolor ad tempore dolorum dicta, eum beatae distinctio libero unde veritatis labore minima. Similique facere delectus alias reiciendis adipisci, reprehenderit assumenda cumque harum! Explicabo reiciendis at nostrum unde provident cum nemo! Alias deleniti qui corporis recusandae adipisci, aspernatur veniam necessitatibus sed dicta eveniet libero quas inventore itaque modi, quis consequuntur deserunt nobis sit voluptate dolore maxime reiciendis eligendi. Veritatis, vitae inventore asperiores eos dolores modi molestias totam ex perferendis ipsum rerum vel cumque nisi id expedita officiis libero architecto minima saepe. Porro eos reiciendis laboriosam consequatur non nobis corporis, saepe, aliquid rerum dolores, voluptatum repudiandae doloribus? Facilis, harum?') . '</p>';
echo '</section>';
echo '</article>';
echo '</div>';
echo '</main>';
$pageContent = ob_get_clean();

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'basicTemplate.php';
?>

