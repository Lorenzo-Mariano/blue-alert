const titleButton = document.querySelector(
    '.toggle-section[data-target="title-section"]'
);
titleButton.style.backgroundColor = "white";
titleButton.style.color = "black";

document.querySelectorAll(".toggle-section").forEach((button) => {
    button.addEventListener("click", () => {
        document.querySelectorAll(".toggle-section").forEach((btn) => {
            btn.style.backgroundColor = "";
            btn.style.color = "";
        });

        button.style.backgroundColor = "white";
        button.style.color = "black";

        const targetId = button.getAttribute("data-target");

        document.querySelectorAll(".editor").forEach((section) => {
            section.style.display = "none";
        });

        document.getElementById(targetId).style.display = "flex";
    });
});

document.querySelector(".to-content").addEventListener("click", () => {
    document.getElementById("title-section").style.display = "none";
    document.getElementById("content-section").style.display = "flex";
    document.getElementById("references-section").style.display = "none";
});

document.querySelector(".to-references").addEventListener("click", () => {
    document.getElementById("title-section").style.display = "none";
    document.getElementById("content-section").style.display = "none";
    document.getElementById("references-section").style.display = "flex";
});
