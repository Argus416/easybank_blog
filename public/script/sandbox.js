function showErrMessageInput(input, errMassage) {
    if (input.length && input.length <= 255) {
        if (!errMassage.hasClass("d-none")) {
            errMassage.addClass("d-none");
        }
    } else if (errMassage.hasClass("d-none")) {
        errMassage.removeClass("d-none");
    }

    return errMassage.hasClass("d-none");
}

function showErrMessageTextarea(textarea, errMassage) {
    if (textarea.length) {
        if (!errMassage.hasClass("d-none")) {
            errMassage.addClass("d-none");
        }
    } else if (errMassage.hasClass("d-none")) {
        errMassage.removeClass("d-none");
    }

    return errMassage.hasClass("d-none");
}

window.addEventListener("load", () => {
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

    // Alert Manager
    setTimeout(function () {
        if ($(".alert")) {
            $(".alert").animate(
                {
                    bottom: "30px",
                    opacity: [0, "linear"],
                },
                600,
                function () {
                    $(this).hide();
                }
            );
        }
    }, 1000);

    // l'effet btn télécharger les logs
    if ($(".btn-see-me")) {
        $(".btn-see-me").click(function () {
            if ($(this).hasClass("btn-see-me")) {
                $(this).removeClass("btn-see-me");
            }
        });
    }

    // TODO : regex
    if ($(".form-login")) {
        $(".form-login").submit(function (e) {
            // e.preventDefault();
            const emailLength = $("#email-login").val().length;
            const password = $("#password-login").val().length;
        });
    }

    if ($("#add-article")) {
        $("#add-article").submit(function () {
            const titleArticleAdd = $("#title-article-add").val();
            const bodyArticleAdd = $("#body-article-add").val();

            let errMassageTitle = $("#title-article-add").parent().find(".err-text");
            let errMassageBody = $("#body-article-add").parent().find(".err-text");

            let send = true;
            if (!showErrMessageInput(titleArticleAdd, errMassageTitle)) {
                send = false;
            }
            if (!showErrMessageTextarea(bodyArticleAdd, errMassageBody)) {
                send = false;
            }
            return send;
        });
    }

    if ($("#edit-article")) {
        $("#edit-article").submit(function () {
            const titleArticleEdit = $("#title-article-edit").val();
            const bodyArticleEdit = $("#body-article-edit").val();

            let errMassageTitle = $("#title-article-edit").parent().find(".err-text");
            let errMassageBody = $("#body-article-edit").parent().find(".err-text");

            let send = true;
            if (!showErrMessageInput(titleArticleEdit, errMassageTitle)) {
                send = false;
            }

            if (!showErrMessageTextarea(bodyArticleEdit, errMassageBody)) {
                send = false;
            }

            return send;
        });
    }

    if ($("#edit-profile")) {
        $("#edit-profile").submit(function () {
            const nomProfil = $("#nom-profil").val();
            const prenomProfil = $("#prenom-profil").val();
            const emailProfil = $("#email-profil").val();

            let errMassageNom = $("#nom-profil").parent().find(".err-text");
            let errMassagePrenom = $("#prenom-profil").parent().find(".err-text");
            let errMassageEmail = $("#email-profil").parent().find(".err-text");

            let send = true;
            if (!showErrMessageInput(nomProfil, errMassageNom)) {
                send = false;
            }

            if (!showErrMessageInput(prenomProfil, errMassagePrenom)) {
                send = false;
            }

            if (!showErrMessageInput(emailProfil, errMassageEmail)) {
                send = false;
            }

            return send;
        });
    }
});
