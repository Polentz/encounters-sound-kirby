<?= snippet('header') ?>

    <header class="header">
        <h1 class="site-title"><a class="js-href" href="#info"><?= $site->title() ?></a></h1>
    </header>

    <main class="main"> 
        <div class="main-wrapper">
            <h2 class="main-title">Stories</h2>
            <a class="main-link" href="listenings.html">Enter</a>
            <h2 class="main-title">Objects</h2>
        </div>
        <div class="main-svg">
            <svg viewBox="0 0 450 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M-196.07 17.71C-167.63 9.83002 -136.69 2.40003 -107 3.64003C-85.8298 4.52003 -64.1298 10.84 -47.6798 24.6C-33.3898 36.55 -27.2798 57.31 -10.7598 66.5C-1.71981 71.53 9.38018 71.73 19.4202 69.24C39.3202 64.31 57.7102 54.03 75.0202 43.33C90.9402 33.49 104.91 20.02 124.86 20.12C154.46 20.26 176.78 46.06 205.13 51.9C225.92 56.18 244.91 50.49 261.71 38.19C274.76 28.64 287.57 15.97 303.91 12.32C323.5 7.94003 344.03 17.77 359.66 28.73C376.27 40.37 390.87 54.98 408.74 64.57C434.44 78.37 465.16 80.64 493.94 75.89C532.78 69.48 570.07 52.27 603.94 32.72"/>
            </svg>
        </div>
    </main>

    <section id="info" class="info">
        <?php foreach ($page->children()->listed() as $info): ?>
            <div class="info-wrapper">
                <h3 class="info-title"><?= $info->title() ?></h3>
                <div class="info-block">
                    <div class="info-column">
                        <?= $info->column_1()->kirbytext() ?>
                        <p class="info-caption"><?= $info->credits() ?></p>
                    </div>
                    <div class="info-column">
                        <?= $info->column_2()->kirbytext() ?>
                        <?= $info->image() ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </section>

    <footer class="footer">
        <a class="footer-link">Credits</a>
        <a class="footer-link">All about the project</a>
    </footer>

<?= snippet('footer') ?>
