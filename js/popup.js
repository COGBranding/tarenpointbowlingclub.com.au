document.addEventListener("DOMContentLoaded", (event) => {
    const singlePopup = document.querySelector(".single-popup");

    if (singlePopup) {
        const popupOpen = document.querySelector("html");
        const popupParent = document.querySelector(".pum");
        const popupContainer = document.querySelector(".pum-container");
        const popupClose = document.querySelector(".pum-close");
        const popupHead = document.querySelector(
            ".single-popup__head__flex-container"
        );

        popupParent.classList.add("single-popup__section");
        popupContainer.classList.add("single-popup__container");
        popupHead.appendChild(popupClose);

        const buttonWrappers = document.querySelectorAll(
            ".single-popup .et_pb_button_module_wrapper"
        );
        const wrapperDiv = document.createElement("div");
        wrapperDiv.classList.add("single-popup__button-wrapper");

        buttonWrappers.forEach((buttonWrapper) => {
            wrapperDiv.appendChild(buttonWrapper);
        });

        const contentRowCol = document.querySelector(
            ".single-popup__content-row__col--content"
        );
        contentRowCol.appendChild(wrapperDiv);

        const btnClose = document.querySelector(".single-popup .btn--white");

        btnClose.addEventListener("click", (event) => {
            popupParent.style.display = "none";
            popupParent.style.opacity = "0";

            // Remove classes from <html> as it prevented scrolling when the popup was closed
            popupOpen.classList.remove("pum-open-overlay");
            popupOpen.classList.remove("pum-open-scrollable");
        });
    }
});
