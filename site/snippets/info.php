<div class="info-wrapper">
    <h3 class="info-title"><?= $info->infotitle()->inline() ?></h3>
    <div class="info-block">
        <div class="info-column">
            <?= $info->columnone()->kt() ?>
            <p class="info-caption"><?= $info->credits()->kt()->inline() ?></p>
        </div>
        <div class="info-column">
            <?php if ($info->hasimage()->isTrue()): ?>
                <?= $info->image() ?>
            <?php else : ?>
                <?= $info->columntwo()->kt() ?>
            <?php endif ?>
        </div>
    </div>
</div>