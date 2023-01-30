<div id="<?= $audio->title()->slug()?>-component" class="audio-component" data-stories= "<?= $audio->stories()->slug()?>" data-objects="<?= $audio->objects()->slug()?>">
    <div class="audio-header">
        <h3 class="audio-title"><?= $audio->title()?></h3>
        <div class="audio-btns">
        <svg id="<?= $audio->title()->slug()?>" class="play-btn" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
            <path class="play-path" d="M0 0L20 14L0 28V0Z"/>
            <path class="pause-path" d="M0 0H8V28H0V0Z"/>
            <path class="pause-path" d="M10 0H18V28H10V0Z"/>
        </svg>
        <svg class="stop-btn" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0H28V28H0V0Z"/>
        </svg>
        </div>
    </div>
    <div class="audio-player">
        <input type="range" class="seek-slider" max="100" value="0">
        <div class="audio-time">
            <span class="audio-progress"></span>
            <span class="audio-duration"></span>
        </div>
    </div>
    <div class="audio-tag-wrapper">
        <?php if ($audio->parent()->isNotEmpty()): ?>
            <button class="btn-component" data-filter="<?= $audio->parent()->title()->slug() ?> "><?= $audio->parent()->title() ?></button>
        <?php endif ?>
        <?php if ($audio->recording()->isNotEmpty()): ?>
            <button class="btn-component" data-filter="<?= $audio->recording()->slug() ?>"><?= $audio->recording() ?></button>
        <?php endif ?>
        <?php if ($audio->stories()->isNotEmpty()): ?>
            <button class="btn-component" data-filter="<?= $audio->stories()->slug() ?>"><?= $audio->stories() ?></button>
        <?php endif ?>
        <?php if ($audio->objects()->isNotEmpty()): ?>
            <button class="btn-component" data-filter="<?= $audio->objects()->slug() ?>"><?= $audio->objects() ?></button>
        <?php endif ?>
    </div>
    <div class="audio-info">
        <a class="audio-info-btn">Index card</a>
        <div class="audio-info-card draggable">
            <div class="audio-info-card-wrapper">
                <p class="audio-info-card-title"><?= $audio->title()?></p>
                <div class="audio-info-card-info">
                    <?= $audio->information()->kirbytext()?>
                </div>
                <div class="audio-info-card-text">
                    <?= $audio->text()->kirbytext()?>
                </div>
                <svg class="close-btn" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2L2 10M10 10L2 2" stroke-linecap="square" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- <audio src="<?= $audio->audio()->toFile() ?>" preload="metadata"></audio> -->

    <audio src="<?= $audio->ascolto() ?>" preload="metadata"></audio>
    <!-- <audio src="https://assets.codepen.io/4358584/Anitek_-_Komorebi.mp3" preload="metadata"></audio> -->
</div>

