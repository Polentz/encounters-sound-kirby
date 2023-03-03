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

    <!-- <div class="draw-line">
        <svg class="line-svg" viewBox="0 0 61 776" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="line-path"  d="M42.3923 775.502C45.6396 729.725 1.8659 712.419 12.0841 671.494C18.723 644.891 39.7079 642.24 40.2274 616.173C40.7614 589.614 19.1705 581.518 22.9085 558.637C26.7764 534.887 51.759 532.917 53.2167 512.165C54.8043 489.66 26.0114 483.563 20.7436 456.844C14.7252 426.302 48.8003 416.252 55.3816 379.396C66.1482 319.166 -12.913 279.283 3.42461 233.347C12.8057 206.961 41.9016 211.697 48.8869 184.659C58.4268 147.774 7.52343 126.486 12.0841 82.8666C16.284 42.6362 62.3957 33.9327 59.7257 0.986572" />
        </svg>
    </div> -->

    <div class="marquee-container">
        <svg class="marquee" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.24 800.15">
            <path d="m54.13.21C43.84,22.23,16.97,36.84,14.5,73.6c-3.25,48.46,40.53,66.78,30.31,110.1-6.64,28.16-27.62,30.97-28.14,58.56-.53,28.12,21.06,36.69,17.32,60.91-3.87,25.14-28.85,27.23-30.31,49.2-1.59,23.82,27.21,30.28,32.47,58.56,6.02,32.33-28.06,42.97-34.64,81.99-10.77,63.76,68.33,105.47,51.99,154.1h0c-10.18,22.02-36.76,36.63-39.2,73.4-2.35,35.46,20.19,54.78,28.5,79.57"/>
        </svg>
        <svg class="marquee" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 59 800.17">
            <path d="m46.26.16c3.05,9.09,4.19,18.93,1.47,30.56-6.57,28.17-27.32,30.97-27.83,58.57-.53,28.12,20.83,36.69,17.13,60.92-3.83,25.15-28.53,27.23-29.97,49.2-1.57,23.83,26.91,30.28,32.12,58.57,5.95,32.34-27.75,42.98-34.26,82.01-10.65,63.77,67.54,106,51.39,154.64-9.28,27.94-38.05,22.92-44.96,51.56-9.43,39.05,40.91,61.59,36.4,107.77-4.15,42.6-49.76,51.82-47.12,86.7,2.24,29.29,35.48,36.82,47.4,59.28"/>
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
        <p class="footer-link">© <?= $site->year() ?></p>
    </footer>

<?= snippet('footer') ?>
