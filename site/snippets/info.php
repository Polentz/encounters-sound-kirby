<div class="info-wrapper">
    <h3 class="info-title"><?= $info->infotitle()->inline() ?></h3>
    <div class="info-block">
        <div class="info-column">
            <?php if ($info->hasimageleft()->isTrue()): ?>
                <?php if ($imageleft = $info->imageleft()->toFile()) : ?>
                    <img src="<?= $imageleft->crop(1200, 700, 72)->url() ?>" alt="<?= $imageleft->alt() ?>">
                <?php endif ?>
            <?php else : ?>
                <?= $info->columnone()->kt() ?>
                <p class="info-caption"><?= $info->creditsone()->kt()->inline() ?></p>
            <?php endif ?>
        </div>
        <div class="info-column">
            <?php if ($info->hasimageright()->isTrue()): ?>
                <?php if ($imageright = $info->imageright()->toFile()) : ?>
                    <img src="<?= $imageright->crop(1200, 700, 72)->url() ?>" alt="<?= $imageright->alt() ?>">
                <?php endif ?>
            <?php else : ?>
                <?= $info->columntwo()->kt() ?>
                <p class="info-caption"><?= $info->creditstwo()->kt()->inline() ?></p>
            <?php endif ?>
        </div>
    </div>
</div>