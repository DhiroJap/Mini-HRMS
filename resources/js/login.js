document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("login-form");
    const emailInput = document.getElementById("login-email");
    const passwordInput = document.getElementById("login-password");
    const loginButton = document.getElementById("login-button");
    const emailError = document.getElementById("login-email-error");
    const passwordError = document.getElementById("login-password-error");

    loginButton.disabled = true;

    if ((loginButton.disabled = true)) {
        loginButton.classList.remove("bg-blue-600", "hover:bg-blue-500");
        loginButton.classList.add("bg-gray-400", "cursor-not-allowed");
    }

    emailInput.addEventListener("input", validateForm);
    passwordInput.addEventListener("input", validateForm);
    loginButton.addEventListener("click", attemptLogin);

    function validateForm() {
        if (
            emailInput.value.trim() !== "" &&
            passwordInput.value.trim() !== ""
        ) {
            loginButton.disabled = false;
            loginButton.classList.remove("bg-gray-400", "cursor-not-allowed");
            loginButton.classList.add("bg-blue-600", "hover:bg-blue-500");

            emailError.textContent = "";
            passwordError.textContent = "";
        } else {
            loginButton.disabled = true;
            loginButton.classList.remove("bg-blue-600", "hover:bg-blue-500");
            loginButton.classList.add("bg-gray-400", "cursor-not-allowed");
        }
    }

    function attemptLogin(event) {
        const emailValid = validateEmail(emailInput.value);
        const passwordValid = validatePassword(passwordInput.value);

        if (emailValid.length === 0 && passwordValid.length === 0) {
        } else {
            event.preventDefault();
            emailError.textContent = emailValid.join(" ");
            if (passwordValid.length !== 0) {
                passwordError.textContent =
                    "Password must contain at least " +
                    passwordValid.join(", ");
            }
        }
    }

    function validatePassword(password) {
        const isLowerCaseMissing = !/(?=.*[a-z])/.test(password);
        const isUpperCaseMissing = !/(?=.*[A-Z])/.test(password);
        const isNumberMissing = !/(?=.*\d)/.test(password);
        const isSymbolMissing = !/(?=.*[!@#$%^&*])/.test(password);

        let errorMessages = [];

        if (isLowerCaseMissing) {
            errorMessages.push("one lowercase letter");
        }

        if (isUpperCaseMissing) {
            errorMessages.push("one uppercase letter");
        }

        if (isNumberMissing) {
            errorMessages.push("one number");
        }

        if (isSymbolMissing) {
            errorMessages.push("one symbol");
        }

        return errorMessages;
    }

    function validateEmail(email) {
        const isEmailValid = !/^\S+@\S+\.\S+$/.test(email);

        let errorMessages = [];

        if (isEmailValid) {
            errorMessages.push(
                "Please enter a valid email format. Example: hrms.admin@example.com",
            );
        }

        return errorMessages;
    }
});
