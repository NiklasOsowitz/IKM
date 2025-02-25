<footer>
    <?php foreach ($site->contentsFooter()->toBlocks() as $section): ?>
        <?= $section ?>
    <?php endforeach ?>
    <div class="frame-ui">
        <div class="container">
            <!-- mainmenu -->
            <?php if ($site->footermenu()->isNotEmpty()): ?>
                <?php $mainpages = $site->footermenu()->toStructure() ?>
                <div class="nav-item nav-item-main">
                    <?php foreach ($mainpages as $mainpage): ?>
                        <div class="nav-item-mainmenu">
                            <a href="<?= $mainpage->itemlink()->toUrl() ?>" class="mainmenu-link">
                                <?= $mainpage->itemtitle()->or($mainpage->itemlink()->html()) ?>
                            </a>

                            <?php
                            $submenutoggle = $mainpage->submenutoggle()->isTrue();
                            $subpages = $mainpage->subpages()->toStructure();

                            if ($submenutoggle && $subpages->isNotEmpty()): ?>
                                <div class="nav-item-submenu">
                                    <?php foreach ($subpages as $subpage): ?>
                                        <a href="<?= $subpage->itemlink()->toUrl() ?>" class="submenu-link">
                                            <?= $subpage->itemtitle()->or($subpage->itemlink()->html()) ?>
                                        </a>
                                    <?php endforeach ?>
                                </div>
                            <?php endif ?>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>
        <div class="container footer-tag">
            <div class="footer-tag-cnt">
                <p><?= $site->name()->value() ?></p>
                <p><?= $site->subline()->value() ?></p>
                <p><?= str_replace(['<br>', '<br/>', '<br />'], ', ', $site->adress()->kt()) ?></p>
                <a href="<?= $site->email()->toUrl() ?>"><?= str_replace('mailto:', '', $site->email()->toUrl()) ?></a>
                <a href="<?= $site->phone()->toUrl() ?>"><?= str_replace('tel:', '', $site->phone()->toUrl()) ?></a>
            </div>
            <div class="footer-tag-cnt">
                <?= $site->copyright()->kirbytext() ?>
                <?= $site->creatortag()->kirbytext() ?>
            </div>
        </div>
    </div>
</footer>
<?php snippet('structure/scripts'); ?>
<?php snippet('cookieconsentJs'); ?>
<?php snippet('seo/schemas') ?>