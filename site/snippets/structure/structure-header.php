<nav>
    <div class="frame-ui">
        <div class="container">
            <header class="nav-header">
                <div class="nav-brandmark">IKM</div>
                <div></div>
                <div id="nav-button-icon">
                    <span></span>
                </div>
            </header>
            <div class="nav-menu">
                <!-- info -->
                <?php if ($site->menuinfotoggle()->toBool()): ?>
                    <div class="nav-item nav-info">
                        <?= $site->menuinfocontent()->text() ?>
                    </div>
                <?php endif ?>
                <!-- mainmenu -->
                <?php if ($site->navmenu()->isNotEmpty()): ?>
                    <?php $mainpages = $site->navmenu()->toStructure() ?>
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
                <!-- submenu -->
                <?php if ($site->submenu()->isNotEmpty()): ?>
                    <div class="nav-item nav-item-sub">
                        <?php $mainpages = $site->submenu()->toStructure() ?>
                        <?php if ($mainpages->isNotEmpty()): ?>
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
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</nav>
<?php snippet('structure/structure-banner') ?>
<div class="nav-backdrop"></div>