const filterStoriesBtn = document.getElementById("filters-stories-btn");
const filtersStories = document.getElementById("filters-stories");
const filtersStoriesClose = document.getElementById("filters-stories-close");
const filterObjectsBtn = document.getElementById("filters-objects-btn");
const filtersObjects = document.getElementById("filters-objects");
const filtersObjectsClose = document.getElementById("filters-objects-close");
const audioFiles = document.querySelectorAll("audio");

const openFilterMenu = (button, elementOne, className, elementTwo) => {
    button.addEventListener("click", () => {
        elementOne.classList.toggle(className);
        if (elementTwo.classList.contains(className)) {
            elementTwo.classList.remove(className)
        };
    });
};

const closeFilterMenu = (button, element, className) => {
    button.addEventListener("click", () => {
        if (element.classList.contains(className)) {
            element.classList.remove(className);
        }
    });
};

openFilterMenu(filterStoriesBtn, filtersStories, "show", filtersObjects);
openFilterMenu(filterObjectsBtn, filtersObjects, "show", filtersStories);
closeFilterMenu(filtersStoriesClose, filtersStories, "show");
closeFilterMenu(filtersObjectsClose, filtersObjects, "show");

const filterBtns = document.querySelectorAll(".filter-button");
const filterClear = document.querySelectorAll(".filter-clear");

filterBtns.forEach(btn => {
    btn.addEventListener("click", (e) => {
        applyFilter(e, btn);
        audioFiles.forEach(audio => {
            if (audio.play()) {
                audio.pause();
            }
        });
    });
});

filterClear.forEach(btn => {
    btn.addEventListener("click", () => {
        removeFilters();
        audioFiles.forEach(audio => {
            if (audio.play()) {
                audio.pause();
            }
        });
    });
});

const applyFilter = (e, btn) => {
    filterBtns.forEach(b => {
        b.classList.remove("sorted");
    });
    const filterName = e.currentTarget.dataset.filter;
    audioComponent.forEach(component => {
        const audioTagStories = component.dataset.stories;
        const audioTagObjects = component.dataset.objects;
        const audioTags = [audioTagStories, audioTagObjects];
        if (audioTags.includes(filterName)) {
            component.classList.remove("unfiltered");
            btn.classList.add("sorted");
        } else {
            component.classList.add("unfiltered");
        }
    });
    filtersStories.classList.remove("show");
    filtersObjects.classList.remove("show");
}

const removeFilters = () => {
    filterBtns.forEach(b => {
        b.classList.remove("sorted");
    });
    audioComponent.forEach(component => {
        component.classList.remove("unfiltered");
    });
    filtersStories.classList.remove("show");
    filtersObjects.classList.remove("show");
}