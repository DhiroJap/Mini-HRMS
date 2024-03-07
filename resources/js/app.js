import './bootstrap';

const menuButton = document.querySelector("#menu-button")
const menuItem = document.querySelector("#menu-item")

menuButton.addEventListener("click", () => {
    menuItem.classList.toggle("hidden");
});
