const titleButton = document.querySelector(
    '.toggle-section[data-target="title-section"]'
);
titleButton.style.backgroundColor = "white";
titleButton.style.color = "black";

const imageInput = document.getElementById("image");
const imageUploadContainer = document.getElementById("image-upload-container");
const previewImage = document.getElementById("preview");

imageUploadContainer.addEventListener("click", () => {
    imageInput.click();
});

imageInput.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            previewImage.src = e.target.result;
            previewImage.style.display = "block";
            imageUploadContainer.querySelector(".upload-text").style.display =
                "none";
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById("reset-image").addEventListener("click", function () {
    imageInput.value = "";
    previewImage.src = "";
    previewImage.style.display = "none";
    imageUploadContainer.querySelector(".upload-text").style.display = "block";
});

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

document.getElementById("add-reference").addEventListener("click", function () {
    const container = document.querySelector(".reference-group");

    const newReferenceItem = document.createElement("div");
    newReferenceItem.classList.add("reference-item");

    newReferenceItem.innerHTML = `
        <input type="text" placeholder="Reference link" name="references[]" class="reference-input">
        <button type="button" class="remove-reference">
            <i class="iconoir-minus-circle"></i>
        </button>
    `;

    container.appendChild(newReferenceItem);
});

document
    .getElementById("references-container")
    .addEventListener("click", function (e) {
        if (e.target && e.target.closest(".remove-reference")) {
            e.target.closest(".reference-item").remove();
        }
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
