<?php use Kirby\Cms\Html; /** @var \Kirby\Cms\Block $block */

$format      = $block->format()->html();
$radius      = $block->elmradius()->html();
$spacer      = $block->elmspacer()->html();
$padding     = $block->elmpadding()->html();

$attributes  = $block->elmattributes()->value();
$class       = $block->elmclass()->html();
$id          = $block->elmid()->html();

$classes     = trim($format . ' ' .  $radius . ' ' . $spacer . ' ' . $padding . ' ' . $class);

if (
    $block->location() == 'kirby' &&
    $video = $block->video()->toFile()
) {
    $url   = $video->url();
    $attrs = array_filter([
        'autoplay' => $block->autoplay()->toBool(),
        'controls' => $block->controls()->toBool(),
        'loop'     => $block->loop()->toBool(),
        'muted'    => $block->muted()->toBool(),
        'poster'   => $block->poster()->toFile()?->url(),
        'preload'  => $block->preload()->value(),
    ]);
} else {
    $url = $block->url();
}

?>

<?php if ($video = Html::video($url, [], $attrs ?? [])): ?>
    <div id="<?= $id ?>" class="videofig <?= $classes ?>" <?= $attributes ?>>
        <?= $video ?>
    </div>
<?php endif ?>