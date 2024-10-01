const signUpModal = document.querySelector(".sign-up-modal");
const signUpForm = document.querySelector(".sign-up-form");
const loginModal = document.querySelector(".login-modal");
const statusMsg = document.querySelector(".status");

function openSignUp() {
    signUpModal.showModal();
}

function openLogin() {
    loginModal.showModal();
}

window.addEventListener("mousedown", (e) => {
    if (e.target === signUpModal) {
        signUpModal.close();
    }

    if (e.target === loginModal) {
        loginModal.close();
    }
});

async function register(event) {
    event.preventDefault();

    console.log("registering...");
    const formData = new FormData(signUpForm);
    const data = Object.fromEntries(formData);

    console.log(data);

    try {
        const response = await fetch("/register", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify(data),
        });

        const result = await response.json();
        statusMsg.textContent = result.message;
        statusMsg.className = response.ok ? "success" : "error";
    } catch (error) {
        console.error("Error:", error);
        statusMsg.textContent = "An error occurred. Please try again.";
        statusMsg.className = "error";
    }
}
