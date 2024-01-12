<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/globals.css">
    <?= (isset($pageStyle)) ? ("<link rel=\"stylesheet\" href=\"css/{$pageStyle}\">") : null ?>
    <title><?= (isset($pageTitle)) ? $pageTitle : 'Blog of tech' ?></title>
</head>
<body>
   <?= ($pageContent) ?? '' ?> 
</body>
</html>