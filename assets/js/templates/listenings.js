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

const tagsAndBtns = document.querySelectorAll(".btn-component");
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
        const audioTagSubjects = component.dataset.subjects;
        const audioTags = [audioTagStories, audioTagObjects, audioTagSubjects];
        const audioLabels = component.querySelectorAll(".btn-component");
        audioLabels.forEach(label => {
            if (label.dataset.filter.includes(filterName)) {
                label.classList.add("selected");
            } else {
                label.classList.remove("selected");
            };
        });
        if (audioTags.includes(filterName)) {
            component.classList.remove("unfiltered");
            btn.classList.add("sorted");
        } else {
            component.classList.add("unfiltered");
        }
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
    tagsAndBtns.forEach(label => {
        label.classList.remove("selected");
        label.classList.remove("sorted");
    });
    audioComponent.forEach(component => {
        component.classList.remove("unfiltered");
    });
    filtersStories.classList.remove("show");
    filtersObjects.classList.remove("show");
}

const audioComponent = document.querySelectorAll(".audio-component");
const playBtns = document.querySelectorAll(".play-btn");

audioComponent.forEach(component => {
    playBtns.forEach(btn => {
        if (btn.parentNode.parentNode.parentNode === component) {
            const audioPlayerContainer = component.querySelector(".audio-player");
            const seekSlider = component.querySelector(".seek-slider");
            const audio = component.querySelector("audio");
            const stopBtn = component.querySelector(".stop-btn");
            const durationContainer = component.querySelector(".audio-duration");
            const currentTimeContainer = component.querySelector(".audio-progress");
            const aboutBox = component.querySelector(".audio-info");
            const aboutLink = component.querySelector(".audio-info-btn");
            let raf = null;

            btn.addEventListener("click", () => {
                if (audio.paused) {
                    audio.play();
                    requestAnimationFrame(whilePlaying);
                } else {
                    audio.pause();
                    cancelAnimationFrame(raf);
                };
                btn.classList.toggle("change-btn");
                audioPlayerContainer.classList.add("slide");
                stopBtn.classList.add("move-btn");
                aboutBox.style.display = "flex";
                setTimeout(() => {
                    component.classList.add("highlight");
                }, 400);
                setTimeout(() => {
                    durationContainer.classList.add("toggle-opacity");
                    currentTimeContainer.classList.add("toggle-opacity");
                }, 800);
                setTimeout(() => {
                    aboutLink.classList.add("toggle-opacity");
                }, 1200);
            });

            stopBtn.addEventListener("click", () => {
                stopAudio();
            });

            audio.addEventListener("timeupdate", () => {
                if (audio.duration === audio.currentTime) {
                    stopAudio();
                };
            });

            const stopAudio = () => {
                audio.pause();
                component.classList.remove("highlight");
                btn.classList.remove("change-btn");
                stopBtn.classList.remove("move-btn");
                durationContainer.classList.remove("toggle-opacity");
                currentTimeContainer.classList.remove("toggle-opacity");
                aboutLink.classList.remove("toggle-opacity");
                setTimeout(() => {
                    aboutBox.style.display = "none";
                    audioPlayerContainer.classList.remove("slide");
                }, 400);
                setTimeout(() => {
                    audio.currentTime = 0;
                }, 800);
            };

            const showRangeProgress = (rangeInput) => {
                audioPlayerContainer.style.setProperty("--seek-before-width", rangeInput.value / rangeInput.max * 100 + "%");
            };

            seekSlider.addEventListener("input", (e) => {
                showRangeProgress(e.target);
            });

            const calculateTime = (sec) => {
                let minutes = Math.floor(sec / 60);
                let seconds = Math.floor(sec - minutes * 60);
                if (seconds < 10) {
                    seconds = `0${seconds}`;
                }
                return `${minutes}:${seconds}`;
            };

            const displayDuration = () => {
                durationContainer.textContent = calculateTime(audio.duration);
            };

            const setSliderMax = () => {
                seekSlider.max = Math.floor(audio.duration);
            };

            const whilePlaying = () => {
                seekSlider.value = Math.floor(audio.currentTime);
                currentTimeContainer.textContent = calculateTime(seekSlider.value);
                audioPlayerContainer.style.setProperty("--seek-before-width", `${seekSlider.value / seekSlider.max * 100}%`);
                raf = requestAnimationFrame(whilePlaying);
            };

            if (audio.readyState > 0) {
                displayDuration();
                setSliderMax();
            } else {
                audio.addEventListener("playing", () => {
                    displayDuration();
                    setSliderMax();
                });
            }

            // audio.addEventListener("playing", () => {
            //     displayDuration();
            //     setSliderMax();
            // });

            seekSlider.addEventListener("input", () => {
                currentTimeContainer.textContent = calculateTime(seekSlider.value);
                if (!audio.paused) {
                    cancelAnimationFrame(raf);
                };
            });

            seekSlider.addEventListener("change", () => {
                audio.currentTime = seekSlider.value;
                if (!audio.paused) {
                    requestAnimationFrame(whilePlaying);
                }
            });


            const cardOpen = component.querySelector(".audio-info-btn");
            const card = component.querySelector(".audio-info-card");
            const cardClose = card.querySelector(".close-btn");

            cardOpen.addEventListener("click", () => {
                card.classList.toggle("open");
                let randomLeft = Math.floor(Math.random() * 30);
                let randomTop = Math.floor(Math.random() * 10);
                card.style.setProperty("--random-left", `${randomLeft}` + "rem");
                card.style.setProperty("--random-top", `${randomTop}` + "rem");
            });
            cardClose.addEventListener("click", () => {
                card.classList.remove("open");
            });
        };
    });
});

let draggableElems = document.querySelectorAll(".draggable");
let draggies = []

for (let draggableElem of draggableElems) {
    let draggie = new Draggabilly(draggableElem, {
        containment: "html"
    });
    draggies.push(draggie);
}