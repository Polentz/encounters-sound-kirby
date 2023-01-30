<?php
return function($stories) {
    return page('stories')
        ->children()
        ->listed();
};
?>