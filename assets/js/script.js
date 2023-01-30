const documentHeight = () => {
    const doc = document.documentElement;
    doc.style.setProperty("--doc-height", `${window.innerHeight}px`);
}
window.addEventListener("resize", documentHeight)
documentHeight();

const anchorTags = document.querySelector(".js-href");
if (anchorTags) {
    anchorTags.addEventListener("click", (event) => {
        event.preventDefault();
        const href = anchorTags.getAttribute("href");
        document.querySelector(href).scrollIntoView({
            behavior: "smooth"
        });
    });
}

const mainWrapper = document.querySelector(".main-wrapper");
const mainLink = document.querySelector(".main-link");
const mediaQuery = window.matchMedia("(max-width: 600px)");

if (mainWrapper, mainLink) {
    mainWrapper.addEventListener("mouseenter", () => {
        mainWrapper.classList.add("skew");
    })
    mainWrapper.addEventListener("mouseleave", () => {
        mainWrapper.classList.remove("skew");
    });

    mainLink.addEventListener("mouseenter", () => {
        mainLink.innerHTML = "Listen";
    });
    mainLink.addEventListener("mouseleave", () => {
        mainLink.innerHTML = "Enter";
    });

    const handleMediaQuery = (e) => {
        if (e.matches) {
            mainLink.innerHTML = "Listen";
        } else {
            mainLink.innerHTML = "Enter";
        }
    };

    mediaQ.addListener(handleMediaQuery);
    handleMediaQuery(mediaQ);
}
