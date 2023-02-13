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
        if (mainLink.innerHTML = "Enter") {
            mainLink.innerHTML = "Listen";
        } else if (mainLink.innerHTML = "Entra") {
            mainLink.innerHTML = "Ascolta";
        }
    });
    mainLink.addEventListener("mouseleave", () => {
        if (mainLink.innerHTML = "Listen") {
            mainLink.innerHTML = "Enter";
        } else if (mainLink.innerHTML = "Ascolta") {
            mainLink.innerHTML = "Entra";
        }
    });

    const handleMediaQuery = (e) => {
        if (e.matches) {
            mainLink.innerHTML = "Listen";
        } else {
            mainLink.innerHTML = "Enter";
        }
    };

    mediaQuery.addListener(handleMediaQuery);
    handleMediaQuery(mediaQuery);
}
