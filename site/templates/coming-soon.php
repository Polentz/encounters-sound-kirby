<?php
    if ($kirby->language()->code() == 'it') {
        $href = 'en';
        $languageString = 'English';
    } else if ($kirby->language()->code() == 'en') {
        $href = 'it';
        $languageString = 'Italiano';
    }
?>

<?= snippet('header') ?>
<body>
    <header class="header">
        <h1 class="site-title"><a href="/"><?= $site->title() ?></a></h1>
    </header>

    <main class="main" style="height: 100vh"> 
        <div class="main-wrapper">
            <h2 class="main-title">Coming soon</h2>
        </div>
    </main>

    <footer class="footer">
        <a class="footer-link" href="<?= page('credits')->url() ?>"><?= page('credits')->title() ?></a>
        <a class="footer-link" href="<?= $page->url($href) ?>"><?= $languageString ?></a>
    </footer>

<?= snippet('footer') ?>
