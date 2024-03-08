// import {
//     Alpine,
//     Livewire,
// } from "../../vendor/livewire/livewire/dist/livewire.esm";
// import ToastComponent from "../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts";
import "./bootstrap";

// Alpine.plugin(ToastComponent);
// Livewire.start();

//Login Page
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

//Attendance Page
document.addEventListener("DOMContentLoaded", function () {
    const takeAttendanceContent = document.getElementById(
        "take-attendance-content",
    );

    const inputScheduleContent = document.getElementById(
        "input-schedule-content",
    );

    const reportContent = document.getElementById("report-content");

    const takeAttendanceButton = document.getElementById(
        "take-attendance-button",
    );
    const inputScheduleButton = document.getElementById(
        "input-schedule-button",
    );
    const reportButton = document.getElementById("report-button");

    takeAttendanceButton.classList.add("bg-[#F1F5F9]", "hover:bg-[#F1F5F9]");
    inputScheduleButton.classList.add(
        "hover:bg-transparent",
        "hover:underline",
    );
    reportButton.classList.add("hover:bg-transparent", "hover:underline");

    //Click Take Attendance
    takeAttendanceButton.addEventListener("click", function () {
        takeAttendanceContent.classList.remove("hidden");
        inputScheduleContent.classList.add("hidden");
        reportContent.classList.add("hidden");

        takeAttendanceButton.classList.remove(
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
            "hover:bg-transparent",
            "hover:underline",
        );
        inputScheduleButton.classList.remove(
            "hover:bg-transparent",
            "hover:underline",
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
        );
        reportButton.classList.remove(
            "hover:bg-transparent",
            "hover:underline",
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
        );

        takeAttendanceButton.classList.add(
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
        );
        inputScheduleButton.classList.add(
            "hover:bg-transparent",
            "hover:underline",
        );
        reportButton.classList.add("hover:bg-transparent", "hover:underline");
    });

    //Click Input Schedule
    inputScheduleButton.addEventListener("click", function () {
        takeAttendanceContent.classList.add("hidden");
        inputScheduleContent.classList.remove("hidden");
        reportContent.classList.add("hidden");

        takeAttendanceButton.classList.remove(
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
            "hover:bg-transparent",
            "hover:underline",
        );
        inputScheduleButton.classList.remove(
            "hover:bg-transparent",
            "hover:underline",
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
        );
        reportButton.classList.remove(
            "hover:bg-transparent",
            "hover:underline",
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
        );

        takeAttendanceButton.classList.add(
            "hover:bg-transparent",
            "hover:underline",
        );
        inputScheduleButton.classList.add("bg-[#F1F5F9]", "hover:bg-[#F1F5F9]");
        reportButton.classList.add("hover:bg-transparent", "hover:underline");
    });

    //Click Report
    reportButton.addEventListener("click", function () {
        reportContent.classList.remove("hidden");
        inputScheduleContent.classList.add("hidden");
        takeAttendanceContent.classList.add("hidden");

        takeAttendanceButton.classList.remove(
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
            "hover:bg-transparent",
            "hover:underline",
        );
        inputScheduleButton.classList.remove(
            "hover:bg-transparent",
            "hover:underline",
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
        );
        reportButton.classList.remove(
            "hover:bg-transparent",
            "hover:underline",
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
        );

        takeAttendanceButton.classList.add(
            "hover:bg-transparent",
            "hover:underline",
        );
        inputScheduleButton.classList.add(
            "hover:bg-transparent",
            "hover:underline",
        );
        reportButton.classList.add("bg-[#F1F5F9]", "hover:bg-[#F1F5F9]");
    });
});

//Profile Page
document.addEventListener("DOMContentLoaded", function () {
    const editProfileContent = document.getElementById("edit-profile-content");
    const editProfileButton = document.getElementById("edit-profile-button");

    editProfileButton.classList.add("bg-[#F1F5F9]", "hover:bg-[#F1F5F9]");
});
