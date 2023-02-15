<?php
    if ($kirby->language()->code() == 'it') {
        $href = 'en';
        $languageString = 'Ita';
        $button = 'Entra';
    } else if ($kirby->language()->code() == 'en') {
        $href = 'it';
        $languageString = 'Eng';
        $button = 'Enter';
    }
    $listenings = page('listenings')->children()->listed();
?>

<?= snippet('header') ?>
<body>
    <header class="header">
        <h1 class="site-title"><a class="js-href" href="#info"><?= $site->title() ?></a></h1>
        <a class="header-link" href="<?= $page->url($href) ?>"><?= $languageString ?></a>
    </header>

    <div class="draw-line">
        <svg class="line-svg"  viewBox="0 0 61 776" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="line-path"  d="M42.3923 775.502C45.6396 729.725 1.8659 712.419 12.0841 671.494C18.723 644.891 39.7079 642.24 40.2274 616.173C40.7614 589.614 19.1705 581.518 22.9085 558.637C26.7764 534.887 51.759 532.917 53.2167 512.165C54.8043 489.66 26.0114 483.563 20.7436 456.844C14.7252 426.302 48.8003 416.252 55.3816 379.396C66.1482 319.166 -12.913 279.283 3.42461 233.347C12.8057 206.961 41.9016 211.697 48.8869 184.659C58.4268 147.774 7.52343 126.486 12.0841 82.8666C16.284 42.6362 62.3957 33.9327 59.7257 0.986572" />
        </svg>
    </div>

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
        <!-- <a class="footer-link" href="<?= $page->url($href) ?>"><?= $languageString ?></a> -->
        <p class="footer-link">© <?= $site->year() ?></p>
    </footer>

<?= snippet('footer') ?>
