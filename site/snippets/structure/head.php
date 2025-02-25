<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= url('favicon.ico') ?>" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Schoolbell&display=swap" rel="stylesheet">
    <?= css([
        'assets/css/structure.css',
        'assets/css/structure-header.css',
        'assets/css/structure-banner.css',
        'assets/css/structure-footer.css',
        'assets/css/sections.css',
        'assets/css/areas.css',
        'assets/css/tiles.css',
        'assets/css/forms.css',
        'assets/css/cookieconsent.css',
    ]) ?>
    <?php snippet('structure/head-style'); ?>
    <?php snippet('seo/head'); ?>
    <?php snippet('cookieconsentCss'); ?>
</head>