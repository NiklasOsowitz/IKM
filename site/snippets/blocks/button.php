<?php use Kirby\Cms\Html; use Kirby\Toolkit\Str; /** @var \Kirby\Cms\Block $block */

$type        = $block->btntype()->value();
$url         = $block->btnurl()->toUrl();
$href        = $block->btnhref()->value();
$attributes  = $block->btnattributes()->value();

$title       = $block->btntitle()->html();

$style       = $block->btnstyle()->html();
$icon        = $block->btnicon();
$size        = $block->btniconsize()->html();
$gap         = $block->btngap()->html();
$show        = $block->elmshow()->toBool();
$theme       = $block->elmtheme()->html();
$radius      = $block->elmradius()->html();
$spacer      = $block->elmspacer()->html();
$padding     = $block->elmpadding()->html();

$class       = $block->elmclass()->html();
$id          = $block->elmid()->html();

$classes     = trim($style . ' ' . $size . ' ' . $gap . ' ' . $theme . ' ' . $radius . ' ' . $spacer . ' ' . $padding . ' ' . $class);

if (Str::startsWith($href, '#')) {
    $fullHref = url($page->url() . $href);
} elseif (Str::startsWith($href, '/')) {
    $fullHref = url($href);
} else {
    $fullHref = url($href);
}

?>

<?php if ($show && $type === 'hyperlink'): ?>
    <a href="<?= Html::encode($url) ?>" <?= $attributes ?> id="<?= $id ?>" class="<?= $classes ?>">
        <?php if ($title->isNotEmpty()): ?>
            <div class="btn-title"><?= $title ?></div>
        <?php endif ?>
        <?php if ($icon->isNotEmpty()): ?>
            <div class="btn-icon">
                <?= svg('assets/icons/icon-' . $icon . '.svg') ?>
            </div>
        <?php endif ?>
    </a>
<?php elseif ($show && $type === 'button'): ?>
    <button type="button" <?= $attributes ?> id="<?= $id ?>" class="<?= $classes ?>">
        <?php if ($title->isNotEmpty()): ?>
            <div class="btn-title"><?= $title ?></div>
        <?php endif ?>
        <?php if ($icon->isNotEmpty()): ?>
            <div class="btn-icon">
                <?= svg('assets/icons/icon-' . $icon . '.svg') ?>
            </div>
        <?php endif ?>
    </button>
<?php elseif ($show && $type === 'expert'): ?>
    <a href="<?= Html::encode($fullHref) ?>" <?= $attributes ?> id="<?= $id ?>" class="<?= $classes ?>">
        <?php if ($title->isNotEmpty()): ?>
            <div class="btn-title"><?= $title ?></div>
        <?php endif ?>
        <?php if ($icon->isNotEmpty()): ?>
            <div class="btn-icon">
                <?= svg('assets/icons/icon-' . $icon . '.svg') ?>
            </div>
        <?php endif ?>
    </a>
<?php endif ?>