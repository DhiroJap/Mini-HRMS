document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("register-form");
    const emailInput = document.getElementById("register-email");
    const firstNameInput = document.getElementById("register-first-name");
    const lastNameInput = document.getElementById("register-last-name");
    const passwordInput = document.getElementById("register-password");
    const confirmPasswordInput = document.getElementById(
        "register-confirm-password",
    );
    const registerButton = document.getElementById("register-button");
    const emailError = document.getElementById("register-email-error");
    const firstNameError = document.getElementById("register-first-name-error");
    const lastNameError = document.getElementById("register-last-name-error");
    const passwordError = document.getElementById("register-password-error");
    const confirmPasswordError = document.getElementById(
        "register-confirm-password-error",
    );

    registerButton.disabled = true;

    if (registerButton.disabled === true) {
        registerButton.classList.remove("bg-blue-600", "hover:bg-blue-500");
        registerButton.classList.add("bg-gray-400", "cursor-not-allowed");
    }

    emailInput.addEventListener("input", validateForm);
    firstNameInput.addEventListener("input", validateForm);
    lastNameInput.addEventListener("input", validateForm);
    passwordInput.addEventListener("input", validateForm);
    confirmPasswordInput.addEventListener("input", validateForm);
    registerButton.addEventListener("click", attemptRegister);

    function validateForm() {
        if (
            emailInput.value.trim() !== "" ||
            firstNameInput.value.trim() !== "" ||
            lastNameInput.value.trim() !== "" ||
            passwordInput.value.trim() !== "" ||
            confirmPasswordInput.value.trim() !== ""
        ) {
            registerButton.disabled = false;
            registerButton.classList.remove(
                "bg-gray-400",
                "cursor-not-allowed",
            );
            registerButton.classList.add("bg-blue-600", "hover:bg-blue-500");

            emailError.textContent = "";
            firstNameError.textContent = "";
            lastNameError.textContent = "";
            passwordError.textContent = "";
            confirmPasswordError.textContent = "";
        } else {
            registerButton.disabled = true;
            registerButton.classList.remove("bg-blue-600", "hover:bg-blue-500");
            registerButton.classList.add("bg-gray-400", "cursor-not-allowed");
        }
    }

    function attemptRegister(event) {
        const emailValid = validateEmail(emailInput.value);
        const firstNameValid = validateFirstName(firstNameInput.value);
        const lastNameValid = validateLastName(lastNameInput.value);
        const passwordValid = validatePassword(passwordInput.value);
        const confirmPasswordValid = validateConfirmPassword(
            confirmPasswordInput.value,
        );

        if (
            emailValid.length === 0 &&
            firstNameValid.length === 0 &&
            lastNameValid.length === 0 &&
            passwordValid.length === 0 &&
            confirmPasswordValid.length === 0
        ) {
        } else {
            event.preventDefault();
            emailError.textContent = emailValid.join(" ");
            firstNameError.textContent = firstNameValid.join(" ");
            lastNameError.textContent = lastNameValid.join(" ");
            if (passwordValid.length !== 0) {
                passwordError.textContent =
                    "Password must contain at least " +
                    passwordValid.join(", ");
            }
            confirmPasswordError.textContent = confirmPasswordValid.join(" ");
        }
    }

    function validateFirstName(firstName) {
        const isFirstNameValid = /^[a-zA-Z]+$/.test(firstName);
        let errorMessages = [];

        if (!isFirstNameValid) {
            errorMessages.push(
                "Your first name must be alphabetic. Example: Hrms",
            );
        }

        return errorMessages;
    }

    function validateLastName(lastName) {
        const isLastNameValid = /^[a-zA-Z]+$/.test(lastName);
        let errorMessages = [];

        if (!isLastNameValid) {
            errorMessages.push(
                "Your last name must be alphabetic. Example: Admin",
            );
        }

        return errorMessages;
    }

    function validateEmail(email) {
        const isEmailValid = /^\S+@\S+\.\S+$/.test(email);

        let errorMessages = [];

        if (!isEmailValid) {
            errorMessages.push(
                "Please enter a valid email format. Example: hrms.admin@example.com",
            );
        }

        return errorMessages;
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

    function validateConfirmPassword(confirmPassword) {
        const password = passwordInput.value.trim();
        let errorMessages = [];

        if (confirmPassword !== password) {
            errorMessages.push("Passwords do not match");
        }

        return errorMessages;
    }
});
