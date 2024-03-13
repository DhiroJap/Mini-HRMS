document.addEventListener("DOMContentLoaded", function () {
    const setScheduleModal = document.getElementById("set-schedule-modal");
    const scheduleRows = document.querySelectorAll(
        "#input-schedule-content #set-schedule-button",
    );
    const scheduleModalTitle = document.getElementById("schedule-modal-title");
    const scheduleModalClose = document.getElementById(
        "set-schedule-modal-close",
    );
    const scheduleBackdrop = document.getElementById("schedule-backdrop");
    const startTimeInput = document.getElementById("time-start");
    const endTimeInput = document.getElementById("time-end");
    const saveTimeButton = document.getElementById("save-time-button");
    const saveTimeError = document.getElementById("save-time-error");

    scheduleBackdrop.addEventListener("click", function () {
        setScheduleModal.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    });

    scheduleModalClose.addEventListener("click", function () {
        setScheduleModal.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    });

    scheduleRows.forEach((row) => {
        row.addEventListener("click", function () {
            const day = row.getAttribute("data-day");
            setScheduleModal.classList.remove("hidden");
            scheduleModalTitle.textContent = day;
            document.body.classList.add("overflow-hidden");
        });
    });

    saveTimeButton.disabled = true;
    saveTimeButton.classList.add("cursor-not-allowed", "bg-gray-400");

    startTimeInput.addEventListener("input", validateTime);
    endTimeInput.addEventListener("input", validateTime);
    saveTimeButton.addEventListener("click", attemptSaveTime);

    function validateTime() {
        if (
            startTimeInput.value.trim() !== "" ||
            endTimeInput.value.trim() !== ""
        ) {
            saveTimeButton.disabled = false;
            saveTimeButton.classList.remove(
                "cursor-not-allowed",
                "bg-gray-400",
            );
        }
    }

    function attemptSaveTime(event) {
        const startHourMinute = startTimeInput.value.split(":");
        const endHourMinute = endTimeInput.value.split(":");

        const startHour = parseInt(startHourMinute[0]);
        const startMinute = parseInt(startHourMinute[1]);

        const endHour = parseInt(endHourMinute[0]);
        const endMinute = parseInt(endHourMinute[1]);

        const timeValid = validTime(startHour, startMinute, endHour, endMinute);

        if (timeValid.length === 0) {
            console.log("Nice");
        } else {
            event.preventDefault();
            saveTimeError.textContent = timeValid.join(" ");
        }

        function validTime(startHour, startMinute, endHour, endMinute) {
            let errorMessages = [];

            if (
                startHour > endHour ||
                (startHour === endHour && startMinute >= endMinute)
            ) {
                errorMessages.push(
                    "Invalid input! Start time must be earlier than end time.",
                );
            }

            return errorMessages;
        }
    }
});
