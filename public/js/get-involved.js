const signUpModal = document.querySelector(".sign-up-modal");
const signUpForm = document.querySelector(".sign-up-form");
const signUpStatus = document.querySelector(".sign-up-form .status");

const loginModal = document.querySelector(".login-modal");
const loginForm = document.querySelector(".login-form");
const loginStatus = document.querySelector(".login-form .status");

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

    const formData = new FormData(signUpForm);
    const data = Object.fromEntries(formData);

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
        signUpStatus.textContent = result.message + ". Opening login form...";

        if (response.ok) {
            signUpStatus.className = "success";
            signUpForm.reset();

            setTimeout(() => {
                signUpModal.close();
                openLogin();
            }, 2000);
        } else {
            signUpStatus.className = "error";
        }
    } catch (error) {
        console.error("Error:", error);
        signUpStatus.textContent = "An error occurred. Please try again.";
        signUpStatus.className = "error";
    }
}

async function login(event) {
    event.preventDefault();

    const formData = new FormData(loginForm);
    const data = Object.fromEntries(formData);

    try {
        const response = await fetch("/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify(data),
        });

        const result = await response.json();
        loginStatus.textContent =
            result.message + ". Redirecting to articles page...";

        if (response.ok) {
            loginStatus.className = "success";
            loginForm.reset();

            setTimeout(() => {
                window.location.href = "/articles";
            }, 500);
        } else {
            loginStatus.className = "error";
        }
    } catch (error) {
        console.error("Error:", error);
        loginStatus.textContent = "An error occurred. Please try again.";
        loginStatus.className = "error";
    }
}
