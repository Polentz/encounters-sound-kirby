<?php 
    return function ($page) {
        $stories = $page->children()->listed()->first();
        $objects = $page->children()->listed()->last();
        $filterBy = get('filter');

        $storiesUnfiltered = $stories->children()->listed();
        $storiesAudio = $storiesUnfiltered
            ->when($filterBy, function($filterBy) {
            return $this->filterBy('stories', $filterBy);
            });
        $storiesFilters = $storiesUnfiltered->pluck('stories', null, true);

        $storiesAudio = $storiesUnfiltered
        ->when($filterBy, function($filterBy) {
        return $this->filterBy('subjects', $filterBy);
        });
        $storiesSubjects = $storiesUnfiltered->pluck('subjects', null, true);

        $objectsUnfiltered = $objects->children()->listed();
        $objectsAudio = $objectsUnfiltered
            ->when($filterBy, function($filterBy) {
                return $this->filterBy('objects', $filterBy);
            });
        $objectsFilters = $objectsUnfiltered->pluck('objects', null, true);
        return [
            'stories' => $stories,
            'objects' => $objects,
            'filterBy' => $filterBy,
            'storiesUnfiltered' => $storiesUnfiltered,
            'storiesAudio' => $storiesAudio,
            'storiesFilters' => $storiesFilters,
            'storiesSubjects' => $storiesSubjects,
            'objectsUnfiltered' => $objectsUnfiltered,
            'objectsAudio' => $objectsAudio,
            'objectsFilters' => $objectsFilters
        ];
    };
?>