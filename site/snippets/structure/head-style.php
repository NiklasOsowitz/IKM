<style>
    :root {
    <?php 
    $styles = page('styles'); 

    $colors = $styles->coloritems()->toStructure();

    foreach ($colors as $color): ?>
    --<?= $color->colorname() ?>: <?= $color->colorvalue() ?>;
            
    <?php endforeach ?>
    }
</style>