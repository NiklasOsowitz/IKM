<?php /** @var \Kirby\Cms\Block $block */

$name               = $block->scname()->html();

$height             = $block->scheight()->html();
$scframe            = $block->scframe()->html();
$scgridtemp         = $block->scgridtemp()->html();
$scgridgap          = $block->scgridgap()->html();

$theme              = $block->sctheme()->html();
$imgLocation = $block->scimglocation()->value();
if ($imgLocation === 'local' && $block->sclocalimg()->isNotEmpty()) {
    $bimg = 'background-image: url(' . $block->sclocalimg()->toFile()->url() . ');';
} elseif ($imgLocation === 'media' && $block->scmediaimg()->isNotEmpty()) {
    $bimg = 'background-image: url(' . $block->scmediaimg()->toFile()->url() . ');';
} else {
    $bimg = '';
}

$spacer             = $block->scspacer()->html();
$padding            = $block->scpadding()->html();

$attributes         = $block->scattributes()->value();
$class              = $block->scclass()->html();
$id                 = $block->scid()->html();

$classes            = trim($name . ' ' . $height . ' ' . $scgridtemp . ' ' . $scgridgap . ' ' . $theme . ' ' . $spacer . ' ' . $padding . ' ' . $class);
$frame              = trim($scframe . ' ' . $scgridtemp . ' ' . $scgridgap);

?>

<?php if ($block->scshow()->toBool() && $block->grid()->isNotEmpty()): ?>
    <section id="<?= $id ?>" class="section <?= $classes ?>" style="<?= $bimg ?>" <?= $attributes ?>>
        <div class="<?= $frame ?>">
            <?php foreach ($block->grid()->toLayouts() as $area): ?>
                <?php
                    $display        = $area->areadisplay()->html();
                    $gridgap        = $area->areagridgap()->html();
                    $gridspan       = $area->areagridspan()->html();
                    $gridalign      = $area->areagridalign()->html();
                    $gridjustify    = $area->areagridjustify()->html();
                    $flexdirection  = $area->areaflexdirection()->html();
                    $flexgap        = $area->areaflexgap()->html();
                    $flexalign      = $area->areaflexalign()->html();
                    $flexjustify    = $area->areaflexjustify()->html();
                    
                    $tcolor         = $area->areatextcolor()->html();
                    $bcolor         = $area->areabackgroundcolor()->html();

                    $imgLocation = $area->areaimglocation()->value();
                    if ($imgLocation === 'local' && $area->arealocalimg()->isNotEmpty()) {
                        $bimg = 'background-image: url(' . $area->arealocalimg()->toFile()->url() . ');';
                    } elseif ($imgLocation === 'media' && $area->areamediaimg()->isNotEmpty()) {
                        $bimg = 'background-image: url(' . $area->areamediaimg()->toFile()->url() . ');';
                    } else {
                        $bimg = '';
                    }

                    $radius         = $area->arearadius()->html();
                    $spacer         = $area->areaspacer()->html();
                    $padding        = $area->areapadding()->html();
                    $span       = $area->gridspan()->html();
                    
                    $attributes     = $area->areaattributes()->value();
                    $class          = $area->areaclass()->html();
                    $id             = $area->areaid()->html();

                    $columnWidths = [];
                    foreach ($area->columns() as $column) {
                        $columnWidths[] = $column->width();
                    }
                    $columnKey = implode(', ', $columnWidths);
                    switch ($columnKey) {
                        case '1/1':
                            $gridtemplate = 'g-11';
                            break;
                        case '1/2, 1/2':
                            $gridtemplate = 'g-12';
                            break;
                        case '1/4, 1/4, 1/4, 1/4':
                            $gridtemplate = 'g-14';
                            break;
                        case '2/4, 1/4, 1/4':
                            $gridtemplate = 'g-14-a';
                            break;
                        case '1/4, 2/4, 1/4':
                            $gridtemplate = 'g-14-b';
                            break;
                        case '1/4, 1/4, 2/4':
                            $gridtemplate = 'g-14-c';
                            break;
                        case '1/3, 1/3, 1/3':
                            $gridtemplate = 'g-13';
                            break;
                        case '2/3, 1/3':
                            $gridtemplate = 'g-13-a';
                            break;
                        case '1/3, 2/3':
                            $gridtemplate = 'g-13-b';
                            break;
                        case '1/6, 1/6, 1/6, 1/6, 1/6, 1/6':
                            $gridtemplate = 'g-16';
                            break;
                        case '2/6, 1/6, 1/6, 1/6, 1/6':
                            $gridtemplate = 'g-16-a';
                            break;
                        case '1/6, 1/6, 1/6, 1/6, 2/6':
                            $gridtemplate = 'g-16-b';
                            break;
                        default:
                            $gridtemplate = '';
                    }

                    $classes = trim($display . ' ' . $gridgap . ' ' . $gridspan . ' ' . $gridtemplate . ' ' . $gridalign . ' ' . $gridjustify . ' ' . $flexdirection . ' ' . $flexgap . ' ' . $flexalign . ' ' . $flexjustify  . ' ' . $tcolor . ' ' . $bcolor . ' ' . $radius . ' ' . $spacer . ' ' . $padding . ' ' . $span . ' ' . $class);
                ?>

                <div id="<?= $id ?>" class="area <?= $classes ?>" style="<?= $bimg ?>" <?= $attributes ?>>
                    <?php foreach ($area->columns() as $tile): ?>
                        <div class="tile">
                            <?php foreach ($tile->blocks() as $element): ?>
                                <?php snippet('blocks/' . $element->type(), ['block' => $element, 'layout' => $area]) ?>
                            <?php endforeach ?>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endforeach ?>
        </div>
    </section>
<?php endif ?>