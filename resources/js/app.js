// import {
//     Alpine,
//     Livewire,
// } from "../../vendor/livewire/livewire/dist/livewire.esm";
// import ToastComponent from "../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts";
import "./bootstrap";

// Alpine.plugin(ToastComponent);
// Livewire.start();

document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("login-form");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const loginButton = document.getElementById("login-button");

    loginButton.disabled = true;

    if ((loginButton.disabled = true)) {
        loginButton.classList.remove("bg-blue-600", "hover:bg-blue-500");
        loginButton.classList.add("bg-gray-400", "cursor-not-allowed");
    }

    emailInput.addEventListener("input", validateForm);
    passwordInput.addEventListener("input", validateForm);

    function validateForm() {
        const emailValid = validateEmail(emailInput.value);
        const passwordValid = validatePassword(passwordInput.value);

        if (emailValid && passwordValid) {
            loginButton.disabled = false;
            loginButton.classList.remove("bg-gray-400", "cursor-not-allowed");
            loginButton.classList.add("bg-blue-600", "hover:bg-blue-500");
        } else {
            loginButton.disabled = true;
            loginButton.classList.remove("bg-blue-600", "hover:bg-blue-500");
            loginButton.classList.add("bg-gray-400", "cursor-not-allowed");
        }
    }

    function validatePassword(password) {
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*d).{8,}$/;
        return passwordRegex.test(password);
    }

    function validateEmail(email) {
        const emailRegex = /\S+@\S+\.\S+/;
        return emailRegex.test(email);
    }
});
