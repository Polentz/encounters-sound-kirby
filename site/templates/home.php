<?= snippet('header') ?>
<body class="home">
    <header class="header">
        <h1 class="site-title"><a class="js-href" href="#info"><?= $site->title() ?></a></h1>
    </header>

    <main class="main"> 
        <div class="main-wrapper">
            <h2 class="main-title">Stories</h2>
            <a class="main-link" href="<?= $site->page('listenings')->url() ?>">Enter</a>
            <h2 class="main-title">Objects</h2>
        </div>
    </main>

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
