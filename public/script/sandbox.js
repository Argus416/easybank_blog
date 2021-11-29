const currentURL = window.location.href;
let navPage = document.querySelectorAll(".nav-link");

for (i = 0; i < navPage.length; i++) {
    if (location.href === navPage[i].href) {
        navPage[i].className += " active";
    }
}

// Fonctionne uniquement sur la page "blog"
if (document.querySelector(".categorie-select-form")) {
    const categorieSelectForm = document.querySelector(".categorie-select-form");
    const categories = Array.from(document.querySelectorAll(".categorie"));
    const btnSubmit = document.querySelector(".categorie-select");
    categories.forEach((categorie) => {
        this.addEventListener("change", function () {
            btnSubmit.click();
        });
    });
}
