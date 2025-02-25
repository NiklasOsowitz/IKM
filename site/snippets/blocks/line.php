<?php /** @var \Kirby\Cms\Block $block */

$linetype    = $block->linetype()->html();
$linecolor   = $block->elmlinecolor()->html();
$spacer      = $block->elmspacer()->html();
$padding     = $block->elmpadding()->html();

$attributes  = $block->elmattributes()->value();
$class       = $block->elmclass()->html();

$classes     = trim($linetype . ' ' . $linecolor . ' ' . $spacer . ' ' . $padding . ' ' . $class);

?>

<hr class="<?= $classes ?>" <?= $attributes ?> />