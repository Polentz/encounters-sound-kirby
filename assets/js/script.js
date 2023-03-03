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
};

const mainLink = document.querySelector(".main-link");
const langLink = document.querySelector(".header-link");
// const mediaQuery = window.matchMedia("(max-width: 600px)");
const langLinkHtml = langLink.innerHTML;

if (langLinkHtml == "Ita") {
    langLink.addEventListener("mouseenter", () => {
        langLink.innerHTML = "Eng";
    });
    langLink.addEventListener("mouseleave", () => {
        langLink.innerHTML = "Ita";
    });
} else if (langLinkHtml == "Eng") {
    langLink.addEventListener("mouseenter", () => {
        langLink.innerHTML = "Ita";
    });
    langLink.addEventListener("mouseleave", () => {
        langLink.innerHTML = "Eng";
    });
};

if (mainLink) {
    const mainLinkHtml = mainLink.innerHTML;
    if (mainLinkHtml == "Enter") {
        mainLink.addEventListener("mouseenter", () => {
            mainLink.innerHTML = "Listen";
        });
        mainLink.addEventListener("mouseleave", () => {
            mainLink.innerHTML = "Enter";
        });
    } else if (mainLinkHtml == "Entra") {
        mainLink.addEventListener("mouseenter", () => {
            mainLink.innerHTML = "Ascolta";
        });
        mainLink.addEventListener("mouseleave", () => {
            mainLink.innerHTML = "Entra";
        });
    };
    // const handleMediaQuery = (e) => {
    //     if (e.matches) {
    //         mainLink.innerHTML = "Listen";
    //     } else {
    //         mainLink.innerHTML = "Enter";
    //     }
    // };

    // mediaQuery.addListener(handleMediaQuery);
    // handleMediaQuery(mediaQuery);
};

// const path = document.querySelector(".line-path");
// if (path) {
//     const pathLength = path.getTotalLength();
//     path.style.strokeDasharray = pathLength + ' ' + pathLength;
//     path.style.strokeDashoffset = pathLength;
//     window.addEventListener("scroll", (e) => {
//         const scrollPercentage = (document.documentElement.scrollTop + document.body.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight);
//         const drawLength = pathLength * scrollPercentage;
//         path.style.strokeDashoffset = pathLength - drawLength;
//     });
// };

const paths = document.querySelectorAll(".marquee");
if (paths) {
    window.addEventListener("scroll", () => {
        paths.forEach(path => {
            path.style.animationPlayState = "paused";
        });
        if (window.scrollY == 0) {
            paths.forEach(path => {
                path.style.animationPlayState = "running";
            });
        };
    });

};