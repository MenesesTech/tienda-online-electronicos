const openFilterButton = document.getElementById("open-filter-drawer");
const closeFilterButton = document.getElementById("close-filter-drawer");
const filterDrawer = document.getElementById("collection-filter-drawer");
const priceRangeInput = document.getElementById("price-range-input");
const priceRangeValue = document.getElementById("price-range-value");
const overlay = document.querySelector(".overlay"); // Agrega esta línea

openFilterButton.addEventListener("click", () => {
    overlay.style.display = "block"; // Muestra el overlay
});

closeFilterButton.addEventListener("click", () => {
    overlay.style.display = "none"; // Oculta el overlay
});

priceRangeInput.addEventListener("input", () => {
    const price = priceRangeInput.value;
    priceRangeValue.textContent = price;
});
