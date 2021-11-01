let navPage = document.querySelectorAll(".nav-link");

for (i = 0; i < navPage.length; i++) {
    if (location.href === navPage[i].href) {
        navPage[i].className += " active";
    }
}
