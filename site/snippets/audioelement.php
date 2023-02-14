<?php
    $recordingField = $audioelement->blueprint()->field('recording');
    $recordingValue = $audioelement->recording()->value();
    $storiesField = $audioelement->blueprint()->field('stories');
    $storiesValue = $audioelement->stories()->value();
    $objectsField = $audioelement->blueprint()->field('objects');
    $objectsValue = $audioelement->objects()->value();
?>

<div class="audio-component" data-stories= "<?= $audioelement->stories()->slug()?>" data-objects="<?= $audioelement->objects()->slug()?>">
    <div class="audio-header">
        <h3 class="audio-title"><?= $audioelement->title()?></h3>
        <div class="audio-btns">
        <svg class="play-btn" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
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
        <?php if ($audioelement->parent()->isNotEmpty()): ?>
            <button class="btn-component" data-filter="<?= $audioelement->parent()->title()->slug() ?> "><?= $audioelement->parent()->title() ?></button>
        <?php endif ?>
        <?php if ($audioelement->recording()->isNotEmpty()): ?>
            <button class="btn-component" data-filter="<?= $audioelement->recording()->slug() ?>"><?= $recordingField['options'][$recordingValue][$kirby->language()->code()] ?></button>
        <?php endif ?>
        <?php if ($audioelement->stories()->isNotEmpty()): ?>
            <button class="btn-component" data-filter="<?= $audioelement->stories()->slug() ?>"><?= $audioelement->stories() ?></button>
        <?php endif ?>
        <?php if ($audioelement->objects()->isNotEmpty()): ?>
            <button class="btn-component" data-filter="<?= $audioelement->objects()->slug() ?>"><?= $audioelement->objects() ?></button>
        <?php endif ?>
    </div>
    <div class="audio-info">
        <a class="audio-info-btn">Index card</a>
        <div class="audio-info-card draggable">
            <div class="audio-info-card-wrapper">
                <p class="audio-info-card-title"><?= $audioelement->title()?></p>
                <div class="audio-info-card-info">
                    <?= $audioelement->information()->kirbytext()?>
                </div>
                <div class="audio-info-card-text">
                    <?= $audioelement->text()->kirbytext()?>
                </div>
                <svg class="close-btn" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2L2 10M10 10L2 2" stroke-linecap="square" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>
    <audio autobuffer preload="metadata" type="audio/mp3" src="<?= $audioelement->file()->url() ?>"></audio>
</div>

