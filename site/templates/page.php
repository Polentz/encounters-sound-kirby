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
<header class="header"></header>
    <h1 class="site-title"><a href="<?= $site->url() ?>"><?= $site->title() ?></a></h1>
    <a class="header-link" href="<?= $page->url($href) ?>"><?= $languageString ?></a>
</header>

<section id="info" class="info">
    <?php foreach ($page->children()->listed() as $info) : ?>
        <?php snippet($info->intendedTemplate(), compact('info')) ?>
    <?php endforeach ?>
</section>

<footer class="footer">
    <a class="footer-link">Credits</a>
    <a class="footer-link">All about the project</a>
</footer>

<?= snippet('footer') ?>
