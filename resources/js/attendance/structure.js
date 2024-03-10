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
