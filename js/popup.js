document.addEventListener("DOMContentLoaded", (event) => {
    const singlePopup = document.querySelectorAll(".pum");
    const popupOpen = document.querySelector("html");

    if (singlePopup) {
        singlePopup.forEach((popup) => {
            popup.classList.add("single-popup__section");
            const popupContainer = popup.querySelector(".pum-container");

            const popupClose = popup.querySelector(".pum-close");
            const popupHead = popup.querySelector(
                ".single-popup__head__flex-container"
            );

            popupContainer.classList.add("single-popup__container");
            popupHead.appendChild(popupClose);

            const buttonWrappers = popup.querySelectorAll(
                ".single-popup .et_pb_button_module_wrapper"
            );
            const wrapperDiv = document.createElement("div");
            wrapperDiv.classList.add("single-popup__button-wrapper");

            if (buttonWrappers) {
                buttonWrappers.forEach((buttonWrapper) => {
                    wrapperDiv.appendChild(buttonWrapper);
                });
            }

            const contentRowCol = popup.querySelector(
                ".single-popup__content-row__col--content"
            );
            contentRowCol.appendChild(wrapperDiv);

            const btnClose = popup.querySelector(".single-popup .btn--white");

            if (btnClose) {
                btnClose.addEventListener("click", (event) => {
                    //change css to child
                    popupContainer.style.display = "none";
                    popupContainer.style.opacity = "0";

                    //then change css to parent
                    popup.style.display = "none";
                    popup.style.opacity = "0";

                    // Remove classes from <html> as it prevented scrolling when the popup was closed
                    popupOpen.classList.remove("pum-open-overlay");
                    popupOpen.classList.remove("pum-open-scrollable");
                });
            }
        });
    }
});
