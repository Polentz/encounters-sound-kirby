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
const langLinkHtml = langLink.innerHTML;
const paths = document.querySelectorAll(".marquee");
const pathContainer = document.querySelector(".marquee-container");

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
            pathContainer.style.opacity = ".25";
        });
        mainLink.addEventListener("mouseleave", () => {
            mainLink.innerHTML = "Enter";
            pathContainer.style.opacity = "1";
        });
    } else if (mainLinkHtml == "Entra") {
        mainLink.addEventListener("mouseenter", () => {
            mainLink.innerHTML = "Ascolta";
            pathContainer.style.opacity = ".25";
        });
        mainLink.addEventListener("mouseleave", () => {
            mainLink.innerHTML = "Entra";
            pathContainer.style.opacity = "1";
        });
    };
};