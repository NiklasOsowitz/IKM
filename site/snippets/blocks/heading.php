<?php /** @var \Kirby\Cms\Block $block */

$level       = $block->level();
$text        = $block->text();

$textstyle   = $block->elmtextstyle()->html();
$tcolor      = $block->elmtextcolor()->html();
$bcolor      = $block->elmbackgroundcolor()->html();
$radius      = $block->elmradius()->html();
$spacer      = $block->elmspacer()->html();
$padding     = $block->elmpadding()->html();

$attributes  = $block->elmattributes()->value();
$class       = $block->elmclass()->html();
$id          = $block->elmid()->html();

$classes     = trim($textstyle . ' ' . $tcolor . ' ' . $bcolor . ' ' . $radius . ' ' . $spacer . ' ' . $padding . ' ' . $class);

?>

<<?= $level ?> id="<?= $id ?>" class="<?= $classes ?>" <?= $attributes ?>><?= $text ?></<?= $level ?>>