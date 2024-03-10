document.addEventListener("DOMContentLoaded", function () {
    const editProfileContent = document.getElementById("edit-profile-content");
    const editProfileButton = document.getElementById("edit-profile-button");
    const changePasswordContent = document.getElementById(
        "change-password-content",
    );
    const changePasswordButton = document.getElementById(
        "change-password-button",
    );

    editProfileButton.classList.add("bg-[#F1F5F9]", "hover:bg-[#F1F5F9]");
    changePasswordButton.classList.add(
        "hover:bg-transparent",
        "hover:underline",
    );

    editProfileButton.addEventListener("click", function () {
        editProfileContent.classList.remove("hidden");
        changePasswordContent.classList.add("hidden");

        editProfileButton.classList.remove(
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
            "hover:bg-transparent",
            "hover:underline",
        );

        changePasswordButton.classList.remove(
            "hover:bg-transparent",
            "hover:underline",
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
        );

        editProfileButton.classList.add("bg-[#F1F5F9]", "hover:bg-[#F1F5F9]");

        changePasswordButton.classList.add(
            "hover:bg-transparent",
            "hover:underline",
        );
    });

    changePasswordButton.addEventListener("click", function () {
        editProfileContent.classList.add("hidden");
        changePasswordContent.classList.remove("hidden");

        changePasswordButton.classList.remove(
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
            "hover:bg-transparent",
            "hover:underline",
        );

        editProfileButton.classList.remove(
            "hover:bg-transparent",
            "hover:underline",
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
        );

        changePasswordButton.classList.add(
            "bg-[#F1F5F9]",
            "hover:bg-[#F1F5F9]",
        );

        editProfileButton.classList.add(
            "hover:bg-transparent",
            "hover:underline",
        );
    });
});
