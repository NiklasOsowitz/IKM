<?php /** @var \Kirby\Cms\Block $block */

$text        = $block->text();

$textstyle   = $block->elmtextstyle()->html();
$tcolor      = $block->elmtextcolor()->html();
$bcolor      = $block->elmbackgroundcolor()->html();
$radius      = $block->elmradius()->html();
$spacer      = $block->elmspacer()->html();
$padding     = $block->elmpadding()->html();

$attributes  = $block->elmattributes()->value();
$class       = $block->elmclass()->html();

$classes     = trim($textstyle . ' ' . $tcolor . ' ' . $bcolor . ' ' . $radius . ' ' . $spacer . ' ' . $padding . ' ' . $class);

$text = preg_replace(
    '/<p(.*?)>/',
    '<p class="' . htmlspecialchars($classes) . '"' . (!empty($attributes) ? ' ' . $attributes : '') . '$1>',
    $text
);

echo $text;

?>