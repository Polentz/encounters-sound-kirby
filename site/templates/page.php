<?= snippet('header') ?>
<body>
<header class="header">
        <h1 class="site-title"><a href="<?= $site->url() ?>"><?= $site->title() ?></a></h1>
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
