import {
    Alpine,
    Livewire,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import ToastComponent from "../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts";
import "./bootstrap";

Alpine.plugin(ToastComponent);
Livewire.start();

const menuButton = document.querySelector("#menu-button");
const menuItem = document.querySelector("#menu-item");

function isInside(element, container) {
    return container.contains(element);
}

menuButton.addEventListener("click", () => {
    menuItem.classList.toggle("hidden");
});

document.addEventListener("click", (event) => {
    if (
        !isInside(event.target, menuItem) &&
        !isInside(event.target, menuButton)
    ) {
        menuItem.classList.add("hidden");
    }
});
