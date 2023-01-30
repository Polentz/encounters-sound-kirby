<?php
return function($category) {
    return page('listenings')
        ->children()
        ->listed();
};
?>