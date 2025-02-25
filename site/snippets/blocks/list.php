<?php /** @var \Kirby\Cms\Block $block */

$listtype    = $block->listtype()->html();
$textstyle   = $block->elmtextstyle()->html();
$tcolor      = $block->elmtextcolor()->html();
$bcolor      = $block->elmbackgroundcolor()->html();
$radius      = $block->elmradius()->html();
$spacer      = $block->elmspacer()->html();
$padding     = $block->elmpadding()->html();

$attributes  = $block->elmattributes()->value();
$class       = $block->elmclass()->html();
$id          = $block->elmid()->html();

$classes     = trim($listtype . ' ' . $textstyle . ' ' . $tcolor . ' ' . $bcolor . ' ' . $radius . ' ' . $spacer . ' ' . $padding . ' ' . $class);

$htmlContent = $block->text();

$htmlContent = preg_replace(
    '/<ul([^>]*)>/',
    '<ul id="' . htmlspecialchars($id) . '" class="' . htmlspecialchars($classes) . '"' . (!empty($attributes) ? ' ' . $attributes : '') . '$1>',
    $htmlContent);

echo $htmlContent;