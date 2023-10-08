document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('[data-btn-action="add-btn-cart"]');
    
    // Agregar un evento de clic a cada botón "Agregar al carrito"
    addToCartButtons.forEach(btn => {
        btn.addEventListener('click', (event) => {
            event.preventDefault();
            
            const nameModal = event.target.getAttribute('data-modal');
            const modal = document.querySelector(nameModal);

            // Abre el modal
            modal.classList.add('active');
        });
    });

    // Cerrar el modal cuando se hace clic en el botón de cierre
    const closeModalButtons = document.querySelectorAll('.jsModalClose');
    closeModalButtons.forEach(closeBtn => {
        closeBtn.addEventListener('click', (event) => {
            const modal = event.target.closest('.modal');
            if (modal) {
                modal.classList.remove('active');
            }
        });
    });

    // Cerrar el modal cuando se hace clic fuera del contenido del modal
    window.addEventListener('click', (event) => {
        const modals = document.querySelectorAll('.modal.active');
        modals.forEach(modal => {
            if (event.target === modal) {
                modal.classList.remove('active');
            }
        });
    });
});
