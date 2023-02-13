<?php
    if ($kirby->language()->code() == 'it') {
        $href = 'en';
        $languageString = 'English';
        $button = 'Entra';
    } else if ($kirby->language()->code() == 'en') {
        $href = 'it';
        $languageString = 'Italiano';
        $button = 'Enter';
    }

    $listenings = page('listenings')->children()->listed();
?>

<?= snippet('header') ?>
<body class="home">
    <header class="header">
        <h1 class="site-title"><a class="js-href" href="#info"><?= $site->title() ?></a></h1>
    </header>

    <main class="main"> 
        <div class="main-wrapper">
            <h2 class="main-title"><?= $listenings->first()->title() ?></h2>
            <a class="main-link" href="<?= $site->page('listenings')->url() ?>"><?= $button ?></a>
            <h2 class="main-title"><?= $listenings->last()->title() ?></h2>
        </div>
    </main>

    <section id="info" class="info">
        <?php foreach ($page->children()->listed() as $info) : ?>
            <?php snippet($info->intendedTemplate(), compact('info')) ?>
        <?php endforeach ?>
    </section>

    <footer class="footer">
        <a class="footer-link" href="<?= page('credits')->url() ?>"><?= page('credits')->title() ?></a>
        <a class="footer-link" href="<?= $page->url($href) ?>"><?= $languageString ?></a>
    </footer>

<?= snippet('footer') ?>
