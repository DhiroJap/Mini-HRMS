let schedule = {
    Monday: {
        currentDay: `Monday`,
        start: `00:00`,
        end: `00:00`,
        workTimeInMins: 0,
    },
    Tuesday: {
        currentDay: `Tuesday`,
        start: `00:00`,
        end: `00:00`,
        workTimeInMins: 0,
    },
    Wednesday: {
        currentDay: `Wednesday`,
        start: `00:00`,
        end: `00:00`,
        workTimeInMins: 0,
    },
    Thursday: {
        currentDay: `Thursday`,
        start: `00:00`,
        end: `00:00`,
        workTimeInMins: 0,
    },
    Friday: {
        currentDay: `Friday`,
        start: `00:00`,
        end: `00:00`,
        workTimeInMins: 0,
    },
    Saturday: {
        currentDay: `Saturday`,
        start: `00:00`,
        end: `00:00`,
        workHour: 0,
    },
    Sunday: {
        currentDay: `Sunday`,
        start: `00:00`,
        end: `00:00`,
        workHour: 0,
    },
};

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
    const saveScheduleButton = document.getElementById("save-schedule");
    const confirmScheduleForm = document.getElementById(
        "confirm-schedule-form",
    );
    const confirmScheduleModal = document.getElementById(
        "confirm-input-schedule-modal",
    );
    const ultimateCancelButton = document.getElementById(
        "cancel-confirm-schedule-form-button",
    );
    const ultimateConfirmButton = document.getElementById(
        "confirm-schedule-form-button",
    );

    scheduleBackdrop.addEventListener("click", function () {
        closeModal();
    });

    scheduleModalClose.addEventListener("click", function () {
        closeModal();
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

    saveScheduleButton.disabled = true;
    saveScheduleButton.classList.add("cursor-not-allowed", "bg-gray-400");

    startTimeInput.addEventListener("input", validateTime);
    endTimeInput.addEventListener("input", validateTime);
    saveTimeButton.addEventListener("click", attemptSaveTime);

    ultimateConfirmButton.addEventListener("click", function (event) {});

    ultimateCancelButton.addEventListener("click", function (event) {
        confirmScheduleModal.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
        event.preventDefault();
    });

    saveScheduleButton.addEventListener("click", function (event) {
        event.preventDefault();
        confirmScheduleModal.classList.remove("hidden");
        document.body.classList.add("overflow-hidden");
        for (const day in schedule) {
            const scheduleData = schedule[day];
            for (const key in scheduleData) {
                const input = document.createElement("input");
                input.type = "hidden";
                input.name = `schedules[${day}][${key}]`;
                input.value = scheduleData[key];
                confirmScheduleForm.appendChild(input);
            }
        }
    });

    function validateTime() {
        if (
            startTimeInput.value.trim() !== "" &&
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

        const startHour = startHourMinute[0];
        const startMinute = startHourMinute[1];

        const endHour = endHourMinute[0];
        const endMinute = endHourMinute[1];

        const timeValid = validTime(startHour, startMinute, endHour, endMinute);

        const startTime = new Date();
        const endTime = new Date();
        startTime.setHours(startHour);
        startTime.setMinutes(startMinute);
        endTime.setHours(endHour);
        endTime.setMinutes(endMinute);

        if (timeValid.length === 0) {
            saveTimeError.textContent = "";
            displayTime(
                startHour,
                startMinute,
                endHour,
                endMinute,
                startTime,
                endTime,
            );
            totalWorkHour();
            closeModal();
            startTimeInput.value = "";
            endTimeInput.value = "";
            saveTimeButton.disabled = true;
            saveTimeButton.classList.add("cursor-not-allowed", "bg-gray-400");
        } else {
            event.preventDefault();
            saveTimeError.textContent = timeValid.join(" ");
        }
    }

    function displayTime(
        startHour,
        startMinute,
        endHour,
        endMinute,
        startTime,
        endTime,
    ) {
        const day = document.getElementById("schedule-modal-title").textContent;
        const timeDisplay = document.querySelector(`td[data-day="${day}"]`);
        const [totalHour, totalMinute, workTimeInMins] = subtractTime(
            startTime,
            endTime,
        );

        schedule[day] = {
            currentDay: `${day.charAt(0).toUpperCase()}${day.slice(1)}`,
            start: `${startHour}:${startMinute}`,
            end: `${endHour}:${endMinute}`,
            workTimeInMins: workTimeInMins,
        };

        timeDisplay.textContent = `${formatTime(startHour, startMinute)} - ${formatTime(endHour, endMinute)} (${totalHour}hr ${totalMinute}m)`;
    }

    function totalWorkHour() {
        let totalMinute = 0;

        for (const day in schedule) {
            const { workTimeInMins } = schedule[day];
            if (workTimeInMins) {
                totalMinute = totalMinute + workTimeInMins;
            }
        }

        if (totalMinute >= 1200) {
            saveScheduleButton.disabled = false;
            saveScheduleButton.classList.remove(
                "cursor-not-allowed",
                "bg-gray-400",
            );
        } else {
            saveScheduleButton.disabled = true;
            saveScheduleButton.classList.add(
                "cursor-not-allowed",
                "bg-gray-400",
            );
        }

        displayTotalWorkHours(totalMinute);

        return totalMinute;
    }

    function displayTotalWorkHours(totalMinute) {
        let totalWorkHours = Math.floor(totalMinute / 60);
        if (totalWorkHours >= 20 && schedule !== null) {
            document.getElementById("total-work-hour").innerHTML = `
                Work Hours: <span class="text-[#2563EB]" >${totalWorkHours} Hours
            `;
        } else {
            document.getElementById("total-work-hour").innerHTML = `
                Work Hours: <span class="text-[#EF4444]" >${totalWorkHours} Hours
            `;
        }
    }

    function subtractTime(startTime, endTime) {
        let startTimeDuration =
            startTime.getHours() * 60 + startTime.getMinutes();
        let endTimeDuration = endTime.getHours() * 60 + endTime.getMinutes();

        let workTimeInMins = endTimeDuration - startTimeDuration;

        if (startTime.getHours() <= 12 && endTime.getHours() >= 13) {
            workTimeInMins = workTimeInMins - 60;
        }

        let hour = Math.floor(workTimeInMins / 60);
        let minute = workTimeInMins % 60;
        return [hour, minute, workTimeInMins];
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

    function formatTime(hour, minute) {
        const ampm = hour >= 12 ? "PM" : "AM";

        hour = hour % 12;
        hour = hour === 0 ? 12 : hour;
        hour = hour < 10 ? "0" + hour : hour;

        return `${hour}:${minute} ${ampm}`;
    }

    function closeModal() {
        setScheduleModal.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    }
});
