const signUpForm = document.querySelector(".sign-up-modal");
const loginForm = document.querySelector(".login-modal");

function openSignUp() {
    signUpForm.showModal();
}

function openLogin() {
    loginForm.showModal();
}

window.addEventListener("mousedown", (e) => {
    if (e.target === signUpForm) {
        signUpForm.close();
    }

    if (e.target === loginForm) {
        loginForm.close();
    }
});
