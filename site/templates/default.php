<html lang="<?= $site->lang() ?>">
    <?php snippet('structure/head') ?>
    <body class="<?= $page->title()->lower() ?>">
        <?php snippet('structure/structure-header') ?>
        <main id="<?= $page->title()->lower() ?>" class="main">
            <?php foreach ($page->contents()->toBlocks() as $section): ?>
                <?= $section ?>
            <?php endforeach ?>
        </main>
        <?php snippet('structure/structure-footer') ?>
    </body>
</html>