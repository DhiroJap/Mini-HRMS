document.addEventListener("DOMContentLoaded", function () {
    function updateTime() {
        const element = document.getElementById("current-time");
        const now = new Date();
        const formattedTime = now.toLocaleString("en-ID", {
            weekday: "long",
            day: "2-digit",
            month: "long",
            year: "numeric",
            hour: "numeric",
            minute: "2-digit",
            second: "2-digit",
            hour12: true,
        });
        element.innerHTML = `Today is ${formattedTime}`;
    }

    updateTime();

    setInterval(updateTime, 1000);
});
