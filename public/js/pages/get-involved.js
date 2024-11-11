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
    loginStatus.innerHTML = "";
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

    signUpStatus.innerHTML = "Registering...";
    signUpStatus.className = "ongoing";

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

        if (response.ok) {
            signUpStatus.textContent =
                result.message + ". Redirecting to login..."; // Successful registration
            signUpStatus.className = "success";
            signUpForm.reset();
            setTimeout(() => {
                signUpModal.close();
                openLogin();
            }, 2000);
        } else {
            console.log("Response not OK");
            console.log(result);

            // Validation error or other failure
            signUpStatus.className = "error";
            // If validation fails, show the error messages
            signUpStatus.innerHTML = "";

            // The error, if present, is an object with each key holding an array of error strings.
            // is this right then?
            Object.entries(result).forEach(([key, errors]) => {
                console.log(errors);
                errors.forEach((error) => {
                    signUpStatus.innerHTML += `<p>${error}</p>`;
                });
            });
        }
    } catch (error) {
        console.error("Error:", error);
        signUpStatus.textContent = "An error occurred. Please try again.";
        signUpStatus.className = "error";
    }
}

async function login(event) {
    event.preventDefault();

    loginStatus.innerHTML = "Logging in...";
    loginStatus.className = "ongoing";

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

        if (response.ok) {
            loginStatus.textContent =
                result.message + ". Redirecting to articles page...";
            loginStatus.className = "success";
            loginForm.reset();
            setTimeout(() => {
                window.location.href = "/articles";
            }, 500);
        } else {
            // Validation error or other failure
            console.log("Response not OK");
            console.log(result);

            loginStatus.className = "error";
            // If validation fails, show the error messages
            loginStatus.innerHTML = "";

            if (result.message) {
                loginStatus.innerHTML = result.message;
            } else {
                for (let key in result.errors) {
                    result.errors[key].forEach((error) => {
                        loginStatus.innerHTML += `<p>${error}</p>`;
                    });
                }
            }
        }
    } catch (error) {
        console.error("Error:", error);
        loginStatus.textContent = "An error occurred. Please try again.";
        loginStatus.className = "error";
    }
}
