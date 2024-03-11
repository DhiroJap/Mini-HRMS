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

// Fetch data for Report page
async function getAttendanceData() {
    // Weekly - fetch
    try {
        const url = `http://127.0.0.1:8000/api/attendance/getAttendanceWeek`;

        const res = await axios.get(url);

        if(res.status == 200) {
            const retrieved_data = res.data.data;
            let total_week_hour = 0;
            for(let i = 0; i < retrieved_data.length; i++) {
                const row_data = retrieved_data[i];

                total_week_hour += row_data.total_hour;
                                            
                const content_row = `
                    <tr class="divide-x divide-[#6A6A6A]">
                        <td class="px-6 py-4">${i + 1}</td>
                        <td class="px-6 py-4">${row_data.date}</td>
                        <td class="px-6 py-4">${row_data.check_in}</td>
                        <td class="px-6 py-4">${row_data.check_out}</td>
                        <td class="px-6 py-4">${row_data.total_hour}</td>   
                    </tr>       
                `;

                document.querySelector("#weekly-row").insertAdjacentHTML('beforeend', content_row);

            }

            if(total_week_hour >= 20) {
                document.querySelector("#total-weekly").innerHTML = `
                    Total Weekly Work Hours : <span class="text-[#2563EB]">${total_week_hour} Hours</span>
                `;
            }
            else {
                document.querySelector("#total-weekly").innerHTML = `
                    Total Weekly Work Hours : <span class="text-[#EF4444]">${total_week_hour} Hours</span>
                `;
            }
        }
        else {
            console.error("Error: ", res.status);
        }
    } catch(error) {
        console.error("Error: ", error);
    }

    // Monthly - fetch
    try {
        const url = `http://127.0.0.1:8000/api/attendance/getAttendanceMonth`;

        const res = await axios.get(url);

        if(res.status == 200) {
            const retrieved_data = res.data.data;
            let total_month_hour = 0;
            for(let i = 0; i < retrieved_data.length; i++) {
                const row_data = retrieved_data[i];

                const content = `
                    <tr class="divide-x divide-[#6A6A6A]">
                        <td class="px-6 py-4">${i + 1}</td>
                        <td class="px-6 py-4">${row_data.date}</td>
                        <td class="px-6 py-4">${row_data.check_in}</td>
                        <td class="px-6 py-4">${row_data.check_out}</td>
                        <td class="px-6 py-4">${row_data.total_hour}</td>   
                    </tr>       
                `;

                total_month_hour += row_data.total_hour;

                document.querySelector("#monthly-row").insertAdjacentHTML('beforeend', content);
            }

            if(total_month_hour >= 80) {
                document.querySelector("#total-monthly").innerHTML = `
                    Total Weekly Work Hours : <span class="text-[#2563EB]">${total_month_hour} Hours</span>
                `;
            }
            else {
                document.querySelector("#total-monthly").innerHTML = `
                    Total Monthly Work Hours : <span class="text-[#EF4444]">${total_month_hour} Hours</span>
                `;
            }
        }
        else {
            console.error("Error: ", res.status);
        }
    } catch(error) {
        console.error("Error: ", error);
    }
}

getAttendanceData();

