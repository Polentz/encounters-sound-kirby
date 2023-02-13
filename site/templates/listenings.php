<?= snippet('header') ?>
<body>
<header class="header">
        <h1 class="site-title"><a href="<?= $site->url() ?>"><?= $site->title() ?></a></h1>
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
    <div class="filters-wrapper">
        <?php foreach ($storiesFilters as $filter): ?>
            <button class="btn-component filter-button" data-filter="<?= $filter->slug() ?>"><?= $filter ?></button>
        <?php endforeach ?>
        <button class="btn-component filter-clear">Clear Filters</button>
        <svg id="filters-stories-close"  viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 2L2 10M10 10L2 2" stroke-linecap="square" stroke-linejoin="round" />
        </svg>
    </div>
</section>

<section id="filters-objects" class="filters">
    <div class="filters-wrapper">
        <?php foreach ($objectsFilters as $filter): ?>
            <button class="btn-component filter-button" data-filter="<?= $filter->slug() ?>"><?= $filter ?></button>
        <?php endforeach ?>
        <button class="btn-component filter-clear">Clear Filters</button>
        <svg id="filters-objects-close"  viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 2L2 10M10 10L2 2" stroke-linecap="square" stroke-linejoin="round" />
        </svg>
    </div>
</section>

<footer class="footer">
    <a id="filters-stories-btn" class="footer-link">Filter by Stories</a>
    <a id="filters-objects-btn" class="footer-link">Filter by Objects</a>
</footer>

<script src="https://unpkg.com/draggabilly@3/dist/draggabilly.pkgd.min.js"></script>
<?= js("assets/js/audio.js") ?>
<?= js("assets/js/filter.js") ?>
<?= snippet('footer') ?>