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

    <div class="marquee-container">
        <svg class="marquee" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1366 100.35">
            <g>
                <path
                    d="m1366,50.18c-29.75,0-37.91-6.04-72.59-7.75-45.71-2.25-59.67,34.13-100.53,27.05-26.56-4.6-29.21-19.14-55.24-19.5-26.52-.37-34.61,14.59-57.45,12-23.71-2.68-25.68-44.27-46.41-45.29-22.47-1.1-31.35,79.43-58.02,83.08-30.49,4.17-64.94-68.83-102.67-68.83-60.01,0-71.36,55.88-117.23,44.55h0c-10.2-3.46-26.76-10.06-40.98-15.87-24.47-10.01-54.73-9.98-79.19.04-16.69,6.84-32.34,13.55-53.92,9.81-26.56-4.6-36.09-38.88-62.12-39.24-26.52-.37-27.73,34.33-50.57,31.74-23.71-2.68-27.75-60.53-48.47-61.54-22.47-1.1-26.5,59.39-53.17,63.04-30.49,4.17-40.53-19.44-77.33-24-60.14-7.46-99.48,47.35-145.35,36.03h0c-20.77-7.05-34.55-42.21-69.23-43.91-31.67.72-47,18.59-75.53,18.59" />
            </g>
        </svg>
        <svg class="marquee" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1366 100.35">
            <g>
                <path
                    d="m1366,50.18c-29.75,0-37.91-6.04-72.59-7.75-45.71-2.25-59.67,34.13-100.53,27.05-26.56-4.6-29.21-19.14-55.24-19.5-26.52-.37-34.61,14.59-57.45,12-23.71-2.68-25.68-44.27-46.41-45.29-22.47-1.1-31.35,79.43-58.02,83.08-30.49,4.17-64.94-68.83-102.67-68.83-60.01,0-71.36,55.88-117.23,44.55h0c-10.2-3.46-26.76-10.06-40.98-15.87-24.47-10.01-54.73-9.98-79.19.04-16.69,6.84-32.34,13.55-53.92,9.81-26.56-4.6-36.09-38.88-62.12-39.24-26.52-.37-27.73,34.33-50.57,31.74-23.71-2.68-27.75-60.53-48.47-61.54-22.47-1.1-26.5,59.39-53.17,63.04-30.49,4.17-40.53-19.44-77.33-24-60.14-7.46-99.48,47.35-145.35,36.03h0c-20.77-7.05-34.55-42.21-69.23-43.91-31.67.72-47,18.59-75.53,18.59" />
            </g>
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
        <a class="footer-link" href="mailto:info@soundobjectsofmigrations.it">Email</a>
    </footer>

<?= snippet('footer') ?>
