<?php
    if ($kirby->language()->code() == 'it') {
        $href = 'en';
        $languageString = 'Ita';
    } else if ($kirby->language()->code() == 'en') {
        $href = 'it';
        $languageString = 'Eng';
    }
?>

<?= snippet('header') ?>
<body>
<header class="header">
    <h1 class="site-title"><a href="<?= $site->url() ?>"><?= $site->title() ?></a></h1>
    <a class="header-link" href="<?= $page->url($href) ?>"><?= $languageString ?></a>
</header>

<section>
    <div class="text-wrapper">
        <div class="info-block">
            <div class="info-column">
                <?= $page->columnone()->kt() ?>
            </div>
            <div class="info-column">
                <div class="logo-wrapper">
                    <div class="overlay"></div>
                    <?php foreach($page->images()->sortBy('sort') as $image): ?>
                        <img src="<?= $image->url() ?>" height="<?= $image->customheight() ?>px">
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <p class="footer-link"><?= $page->footerleft()->inline() ?></p>
    <p class="footer-link"><?= $page->footerright()->inline() ?></p>
</footer>

<?= snippet('footer') ?>
