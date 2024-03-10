document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("edit-form-profile");
    const emailInput = document.getElementById("edit-email");
    const usernameInput = document.getElementById("edit-username");
    const firstNameInput = document.getElementById("edit-first-name");
    const lastNameInput = document.getElementById("edit-last-name");
    const avatarInput = document.getElementById("edit-avatar");

    const editButton = document.getElementById("edit-button-profile");
    const usernameError = document.getElementById("edit-username-error");
    const emailError = document.getElementById("edit-email-error");
    const firstNameError = document.getElementById("edit-first-name-error");
    const lastNameError = document.getElementById("edit-last-name-error");
    const avatarError = document.getElementById("edit-avatar-error");

    editButton.disabled = true;

    if (editButton.disabled === true) {
        editButton.classList.add("bg-gray-400", "cursor-not-allowed");
    }

    emailInput.addEventListener("input", validateForm);
    firstNameInput.addEventListener("input", validateForm);
    lastNameInput.addEventListener("input", validateForm);
    usernameInput.addEventListener("input", validateForm);
    avatarInput.addEventListener("input", validateForm);
    editButton.addEventListener("click", attemptRegister);

    function validateForm() {
        if (
            emailInput.value.trim() !== "" ||
            firstNameInput.value.trim() !== "" ||
            lastNameInput.value.trim() !== "" ||
            usernameInput.value.trim() !== "" ||
            avatarInput.value.trim !== ""
        ) {
            editButton.disabled = false;
            editButton.classList.remove("bg-gray-400", "cursor-not-allowed");

            emailError.textContent = "";
            firstNameError.textContent = "";
            lastNameError.textContent = "";
            usernameError.textContent = "";
            avatarError.textContent = "";
        } else {
            editButton.disabled = true;
            editButton.classList.add("bg-gray-400", "cursor-not-allowed");
        }
    }

    function attemptRegister(event) {
        const emailValid = validateEmail(emailInput.value);
        const firstNameValid = validateFirstName(firstNameInput.value);
        const lastNameValid = validateLastName(lastNameInput.value);
        const usernameValid = validateUsername(usernameInput.value);
        const avatarValid = validateAvatar(avatarInput.value);

        if (
            emailValid.length === 0 &&
            firstNameValid.length === 0 &&
            lastNameValid.length === 0 &&
            usernameValid.length === 0 &&
            avatarValid.length === 0
        ) {
        } else {
            event.preventDefault();
            emailError.textContent = emailValid.join(" ");
            firstNameError.textContent = firstNameValid.join(" ");
            lastNameError.textContent = lastNameValid.join(" ");
            usernameError.textContent = usernameValid.join(" ");
            avatarError.textContent = avatarValid.join(" ");
        }
    }

    function validateFirstName(firstName) {
        const isFirstNameValid = /^[a-zA-Z]+$/.test(firstName);
        let errorMessages = [];

        if (firstName.trim() !== "") {
            if (!isFirstNameValid) {
                errorMessages.push(
                    "Your first name must be alphabetic. Example: Hrms",
                );
            }
        }

        return errorMessages;
    }

    function validateLastName(lastName) {
        const isLastNameValid = /^[a-zA-Z]+$/.test(lastName);
        let errorMessages = [];

        if (lastName.trim() !== "") {
            if (!isLastNameValid) {
                errorMessages.push(
                    "Your last name must be alphabetic. Example: Admin",
                );
            }
        }

        return errorMessages;
    }

    function validateEmail(email) {
        const isEmailValid = /^\S+@\S+\.\S+$/.test(email);

        let errorMessages = [];

        if (email.trim() !== "") {
            if (!isEmailValid) {
                errorMessages.push(
                    "Please enter a valid email format. Example: hrms.admin@example.com",
                );
            }
        }

        return errorMessages;
    }

    function validateUsername(username) {
        const isUsernameValid = /^[a-z0-9]+$/.test(username);
        let errorMessages = [];

        if (username.trim() !== "") {
            if (!isUsernameValid) {
                errorMessages.push(
                    "Your username must not contain spaces, symbols, or uppercase letters",
                );
            }
        }

        return errorMessages;
    }

    function validateAvatar(avatar) {
        const allowedExtensions = ["jpg", "jpeg", "png"];
        const avatarName = avatarInput.value.toLowerCase();
        const avatarExtension = avatarName.substring(
            avatarName.lastIndexOf(".") + 1,
        );

        const errorMessages = [];

        if (avatar.trim() !== "") {
            if (!allowedExtensions.includes(avatarExtension)) {
                avatarInput.value = "";
                errorMessages.push(
                    "Please choose a file with .jpg, .jpeg, or .png extension only",
                );
            }
        }

        return errorMessages;
    }
});
