<?php
    if ($kirby->language()->code() == 'it') {
        $href = 'en';
        $languageString = 'Ita';
    } else if ($kirby->language()->code() == 'en') {
        $href = 'it';
        $languageString = 'Eng';
    }
    if ($kirby->language()->code() == 'it') {
        $storiesFilterButton = 'Filtra per Storie';
        $objectsFilterButton = 'Filtra per Oggetti';
        $storiesTopic = 'Filtra per argomento';
        $storiesSubject = 'Filtra per soggetto';
        $clearFilters = 'Nessun Filtro';
    } else if ($kirby->language()->code() == 'en') {
        $storiesFilterButton = 'Filter by Stories';
        $objectsFilterButton = 'Filter by Objects';
        $storiesTopic = 'Filter by topic';
        $storiesSubject = 'Filter by subject';
        $clearFilters = 'Clear Filters';
    }
?>

<?= snippet('header') ?>
<body>
<header class="header">
        <h1 class="site-title"><a href="<?= $site->url() ?>"><?= $site->title() ?></a></h1>
        <a class="header-link" href="<?= $page->url($href) ?>"><?= $languageString ?></a>
</header>

<main class="audio">
    <section class="audio-wrapper">
        <div class="audio-column">
            <?php foreach ($storiesAudio as $audioelement): ?>
                <?php snippet('audioelement', ['audioelement' => $audioelement]); ?>
            <?php endforeach ?>
        </div>
        <div class="audio-column">
            <?php foreach ($objectsAudio as $audioelement): ?>
                <?php snippet('audioelement', ['audioelement' => $audioelement]); ?>
            <?php endforeach ?>
        </div>
    </section>
</main>

<section id="filters-stories" class="filters">
    <div class="filters-container">
            <div class="filters-wrapper">   
                <p class="filters-title"><?= $storiesSubject ?></p>
                <?php foreach ($storiesSubjects as $subject): ?>
                    <?php if ($subject->isNotEmpty()) : ?>
                        <button class="btn-component filter-button" data-filter="<?= $subject->slug() ?>"><?= $subject ?></button>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            <div class="filters-wrapper">
                <p class="filters-title"><?= $storiesTopic ?></p>
                <?php foreach ($storiesFilters as $filter): ?>
                    <?php if ($filter->isNotEmpty()) : ?>
                        <button class="btn-component filter-button" data-filter="<?= $filter->slug() ?>"><?= $filter ?></button>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            <div class="filters-wrapper">
                <button class="btn-component filter-clear"><?= $clearFilters ?></button>
            </div>
            <div class="filters-wrapper">
                <svg id="filters-stories-close"  viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2L2 10M10 10L2 2" stroke-linecap="square" stroke-linejoin="round" />
                </svg>
            </div>
    </div>
</section>

<section id="filters-objects" class="filters">
    <div class="filters-container">
        <div class="filters-wrapper">
            <?php foreach ($objectsFilters as $filter): ?>
                <?php if ($filter->isNotEmpty()) : ?>
                    <button class="btn-component filter-button" data-filter="<?= $filter->slug() ?>"><?= $filter ?></button>
                <?php endif ?>
            <?php endforeach ?>
        </div>
        <div class="filters-wrapper">
            <button class="btn-component filter-clear"><?= $clearFilters ?></button>
        </div>
        <div class="filters-wrapper">
            <svg id="filters-objects-close"  viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2L2 10M10 10L2 2" stroke-linecap="square" stroke-linejoin="round" />
            </svg>
        </div>
    </div>
</section>

<footer class="footer">
    <a id="filters-stories-btn" class="footer-link"><?= $storiesFilterButton ?></a>
    <a id="filters-objects-btn" class="footer-link"><?= $objectsFilterButton ?></a>
</footer>

<script src="https://unpkg.com/draggabilly@3/dist/draggabilly.pkgd.min.js"></script>
<?= snippet('footer') ?>