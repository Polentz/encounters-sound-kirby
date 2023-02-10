<?php 
    return function ($page) {
        $stories = $page->children()->listed()->first();
        $objects = $page->children()->listed()->last();
        $filterBy = get('filter');
        $storiesUnfiltered = $stories->children()->listed();
        $storiesAudio = $storiesUnfiltered
            ->when($filterBy, function($filterBy) {
            return $this->filterBy('Stories', $filterBy);
            });
        $storiesFilters = $storiesUnfiltered->pluck('Stories', null, true);
        $objectsUnfiltered = $objects->children()->listed();
        $objectsAudio = $objectsUnfiltered
            ->when($filterBy, function($filterBy) {
                return $this->filterBy('Objects', $filterBy);
            });
        $objectsFilters = $objectsUnfiltered->pluck('Objects', null, true);
        return [
            'stories' => $stories,
            'objects' => $objects,
            'filterBy' => $filterBy,
            'storiesUnfiltered' => $storiesUnfiltered,
            'storiesAudio' => $storiesAudio,
            'storiesFilters' => $storiesFilters,
            'objectsUnfiltered' => $objectsUnfiltered,
            'objectsAudio' => $objectsAudio,
            'objectsFilters' => $objectsFilters
        ];
    };
?>