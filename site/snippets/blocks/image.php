<?php /** @var \Kirby\Cms\Block $block */

$format      = $block->format()->html();
$radius      = $block->elmradius()->html();
$bcolor      = $block->elmbackgroundcolor()->html();
$spacer      = $block->elmspacer()->html();
$padding     = $block->elmpadding()->html();

$attributes  = $block->elmattributes()->value();
$class       = $block->elmclass()->html();
$id          = $block->elmid()->html();

$classes     = trim($format . ' ' . $radius . ' ' . $bcolor . ' ' . $spacer . ' ' . $padding . ' ' . $class);

$alt         = $block->alt();
$link        = $block->link();
$src         = null;

if ($block->location() == 'web' && $block->srcimg()->isNotEmpty()) {
    $src = $block->srcimg()->esc();
} elseif ($block->location() == 'local' && $block->localimg()->toFile()) {
    $image = $block->localimg()->toFile();
    $alt = $alt->or($image->alt());
    $src = $image->url();
} elseif ($block->location() == 'media' && $block->mediaimg()->toFile()) {
    $image = $block->mediaimg()->toFile();
    $alt = $alt->or($image->alt());
    $src = $image->url();
}

?>

<?php if ($src): ?>
    <div id="<?= $id ?>" class="imgfig <?= $classes ?>" <?= $attributes ?>>
        <?php if ($link->isNotEmpty()): ?>
            <a href="<?= $link->esc() ?>">
                <img src="<?= $src ?>" alt="<?= $alt->esc() ?>">
            </a>
        <?php else: ?>
            <img src="<?= $src ?>" alt="<?= $alt->esc() ?>">
        <?php endif ?>
    </div>
<?php endif ?>
