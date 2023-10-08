document.addEventListener("DOMContentLoaded", function () {
    const openAddressModalButton = document.getElementById("open-address-modal-button");
    const modalContainer = document.getElementById("modalContainer");
    const modalAddressNew = document.getElementById("modal-address-new");
    const modalCloseButton = modalAddressNew.querySelector(".modal-close");

    // Función para abrir el modal
    function openModal() {
        modalContainer.style.display = "block";
    }

    // Función para cerrar el modal
    function closeModal() {
        modalContainer.style.display = "none";
    }

    // Agregar un evento de clic para abrir el modal
    openAddressModalButton.addEventListener("click", function (e) {
        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
        openModal();
    });

    // Agregar un evento de clic para cerrar el modal
    modalCloseButton.addEventListener("click", function (e) {
        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
        closeModal();
    });
});
