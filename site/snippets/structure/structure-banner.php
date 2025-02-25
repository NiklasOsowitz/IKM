<?php if ($site->bannertoggle()->toBool() && $site->bannercontent()->isNotEmpty()): ?>
    <?php
        $bannerclass    = $site->bannerclass()->isNotEmpty() ? $site->bannerclass()->html() : '';
        $bannerid       = $site->bannerid()->isNotEmpty() ? $site->bannerid()->html() : '';
        $bannerbimg     = $site->bannerbackgroundimg()->isNotEmpty() ? 'background-image: url(' . $site->bannerbackgroundimg()->toFile()->url() . ');' : '';
    ?>
    <div class="banner">
        <div class="frame-ui">
            <div class="banner-content <?= $bannerclass ?>" id="<?= $bannerid ?>" style="<?= $bannerbimg ?>">
                <?php foreach ($site->bannercontent()->toLayouts() as $area): ?>
                    <?php
                        
                        $display        = $area->areadisplay()->html();
                        $gridgap        = $area->areagridgap()->html();
                        $gridspan       = $area->areagridspan()->html();
                        $flexdirection  = $area->areaflexdirection()->html();
                        $flexgap        = $area->areaflexgap()->html();
                        $flexalign      = $area->areaflexalign()->html();
                        $flexjustify    = $area->areaflexjustify()->html();
                        
                        $tcolor         = $area->areatextcolor()->html();
                        $bcolor         = $area->areabackgroundcolor()->html();
                        $bimg           = $area->areabackgroundimg()->isNotEmpty() ? 'background-image: url(' . $area->areabackgroundimg()->toFile()->url() . ');' : '';
                        $spacer         = $area->areaspacer()->html();
                        $padding        = $area->areapadding()->html();

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
                            case '1/3, 1/3, 1/3':
                                $gridtemplate = 'g-13';
                                break;
                            case '1/6, 1/6, 1/6, 1/6, 1/6, 1/6':
                                $gridtemplate = 'g-16';
                                break;
                            default:
                                $gridtemplate = '';
                        }

                        $classes = trim($display . ' ' . $gridgap . ' ' . $gridspan . ' ' . $gridtemplate . ' ' . $flexdirection . ' ' . $flexgap . ' ' . $flexalign . ' ' . $flexjustify  . ' ' . $tcolor . ' ' . $bcolor . ' ' . $spacer . ' ' . $padding . ' ' . $class);
                    ?>

                    <div id="<?= $id ?>" class="<?= $classes ?>" style="<?= $bimg ?>">
                        <?php foreach ($area->columns() as $tile): ?>
                            <div>
                                <?php foreach ($tile->blocks() as $element): ?>
                                    <?php snippet('blocks/' . $element->type(), ['block' => $element, 'layout' => $area]) ?>
                                <?php endforeach ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>