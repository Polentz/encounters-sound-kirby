const playBtns = document.querySelectorAll(".play-btn");
const audioComponent = document.querySelectorAll(".audio-component");

playBtns.forEach(btn => {
    audioComponent.forEach(component => {
        if (component.id === `${btn.id}-component`) {
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