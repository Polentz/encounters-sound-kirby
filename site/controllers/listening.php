<?php
return function ($page) {

    $filterBy = get('filter');
    $unfiltered = $page->children()->listed();
    $projects = $unfiltered
    ->when($filterBy, function($filterBy) {
        return $this->filterBy('category', $filterBy);
    });
    $filters = $unfiltered->pluck('category', null, true);

    return [
        'filterBy' => $filterBy,
        'unfiltered' => $unfiltered,
        'projects' => $projects,
        'filters' => $filters
    ];
};
?>