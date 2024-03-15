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

    const changePasswordButton = document.getElementById(
        "change-password-form-button",
    );
    const confirmChangePasswordModal = document.getElementById(
        "confirm-change-password-modal",
    );
    const cancelConfirmChangePasswordButton = document.getElementById(
        "cancel-confirm-change-password",
    );
    const backgroundOverlay = document.getElementById("background-overlay");
    const changePasswordInput = document.getElementById("change-password");
    const changePasswordError = document.getElementById(
        "change-password-error",
    );
    const confirmChangePasswordInput = document.getElementById(
        "confirm-change-password",
    );
    const confirmChangePasswordError = document.getElementById(
        "confirm-change-password-error",
    );
    const confirmChangePasswordButton = document.getElementById(
        "confirm-change-password-button",
    );

    editButton.disabled = true;
    confirmChangePasswordButton.disabled = true;
    changePasswordButton.disabled = true;

    setButtonDisabled(editButton, true);
    setButtonDisabled(confirmChangePasswordButton, true);
    setButtonDisabled(changePasswordButton, true);

    emailInput.addEventListener("input", validateForm);
    firstNameInput.addEventListener("input", validateForm);
    lastNameInput.addEventListener("input", validateForm);
    usernameInput.addEventListener("input", validateForm);
    avatarInput.addEventListener("input", validateForm);
    editButton.addEventListener("click", attemptEditProfile);

    confirmChangePasswordInput.addEventListener(
        "input",
        validateFormConfirmChangePassword,
    );
    confirmChangePasswordButton.addEventListener(
        "click",
        attemptConfirmChangePassword,
    );

    changePasswordInput.addEventListener("input", validateFormChangePassword);
    changePasswordButton.addEventListener("click", attemptChangePassword);

    function setButtonDisabled(button, disabled) {
        button.disabled = disabled;
        if (disabled) {
            button.classList.add("bg-gray-400", "cursor-not-allowed");
        } else {
            button.classList.remove("bg-gray-400", "cursor-not-allowed");
        }
    }

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

    function attemptEditProfile(event) {
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

    // Change avatar after input file, but not POST to server
    let image = document.getElementById("img-container");
    avatarInput.addEventListener("change", function () {
        let reader = new FileReader();
        reader.onload = function(e) {
            image.src = e.target.result;
        };

        reader.readAsDataURL(this.files[0]);
    });

    function validateFormConfirmChangePassword() {
        if (confirmChangePasswordInput.value.trim() !== "") {
            confirmChangePasswordButton.disabled = false;
            confirmChangePasswordButton.classList.remove(
                "bg-gray-400",
                "cursor-not-allowed",
            );
            confirmChangePasswordError.textContent = "";
        } else {
            confirmChangePasswordButton.disabled = true;
            confirmChangePasswordButton.classList.add(
                "bg-gray-400",
                "cursor-not-allowed",
            );
        }
    }

    function attemptConfirmChangePassword(event) {
        const confirmChangePasswordValid = validateConfirmChangePassword(
            confirmChangePasswordInput.value,
        );

        if (confirmChangePasswordValid.length === 0) {
        } else {
            event.preventDefault();
            if (confirmChangePasswordValid.length !== 0) {
                confirmChangePasswordError.textContent =
                    "Password must contain at least " +
                    confirmChangePasswordValid.join(", ");
            }
        }
    }

    function validateFormChangePassword() {
        if (changePasswordInput.value.trim() !== "") {
            changePasswordButton.disabled = false;
            changePasswordButton.classList.remove(
                "bg-gray-400",
                "cursor-not-allowed",
            );
            changePasswordError.textContent = "";
        } else {
            changePasswordButton.disabled = true;
            changePasswordButton.classList.add(
                "bg-gray-400",
                "cursor-not-allowed",
            );
        }
    }

    function attemptChangePassword(event) {
        const changePasswordValid = validateChangePassword(
            changePasswordInput.value,
        );
        event.preventDefault();

        if (changePasswordValid.length === 0) {
            const transferData =
                document.getElementById("change-password").value;
            document.getElementById("new-password-input-transferred").value =
                transferData;
            showModal();
        } else {
            if (changePasswordValid.length !== 0) {
                changePasswordError.textContent =
                    "Password must contain at least " +
                    changePasswordValid.join(", ");
            }
        }
    }

    function validateConfirmChangePassword(confirmPassword) {
        const isLowerCaseMissing = !/(?=.*[a-z])/.test(confirmPassword);
        const isUpperCaseMissing = !/(?=.*[A-Z])/.test(confirmPassword);
        const isNumberMissing = !/(?=.*\d)/.test(confirmPassword);
        const isSymbolMissing = !/(?=.*[!@#$%^&*])/.test(confirmPassword);

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

    function validateChangePassword(newPassword) {
        const isLowerCaseMissing = !/(?=.*[a-z])/.test(newPassword);
        const isUpperCaseMissing = !/(?=.*[A-Z])/.test(newPassword);
        const isNumberMissing = !/(?=.*\d)/.test(newPassword);
        const isSymbolMissing = !/(?=.*[!@#$%^&*])/.test(newPassword);

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

    cancelConfirmChangePasswordButton.addEventListener("click", function () {
        closeModal();
    });

    backgroundOverlay.addEventListener("click", function (event) {
        if (event.target === backgroundOverlay) {
            closeModal();
        }
    });

    function showModal() {
        confirmChangePasswordModal.classList.remove("hidden");
        document.body.classList.add("overflow-hidden");
    }

    function closeModal() {
        confirmChangePasswordModal.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    }
});
