import axios from "axios";

document.addEventListener("DOMContentLoaded", () => {
    clock();
    function clock() {
        const today = new Date();

        const hours = today.getHours();
        const minutes = today.getMinutes();

        const hour = hours < 10 ? "0" + hours : hours;
        const minute = minutes < 10 ? "0" + minutes : minutes;

        const hourTime = hour > 24 ? hour - 24 : hour;

        const ampm = hour < 12 ? "AM" : "PM";

        const month = today.getMonth();
        const year = today.getFullYear();
        const day = today.getDate();
        const currentDayOfWeek = today.getDay();

        const daysOfWeek = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
        ];

        const monthList = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];

        const date =
            daysOfWeek[currentDayOfWeek] +
            ", " +
            day +
            " " +
            monthList[month] +
            " " +
            year;

        document.getElementById("current-date").innerHTML = date;
        document.getElementById("current-hour").innerHTML = hourTime;
        document.getElementById("current-minute").innerHTML = minute;
        setTimeout(clock, 1000);
    }
});

const checkInButton = document.getElementById("check-in-button");
