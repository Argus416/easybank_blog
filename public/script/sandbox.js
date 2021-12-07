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

function existAndlengthValidation(input) {
    const condition = input.val().length && input.val().length <= 255;
    return condition;
}

function loginSignUpalidator(input) {
    if (!existAndlengthValidation(input)) {
        if (!$(input).hasClass("err-input")) {
            $(input).addClass("err-input");
        }
    } else {
        if ($(input).hasClass("err-input")) {
            $(input).removeClass("err-input");
        }
    }

    return input.hasClass("err-input");
}

window.addEventListener("load", () => {
    const currentURL = window.location.href;

    // * Active navbar
    let navPage = document.querySelectorAll(".nav-link");
    for (i = 0; i < navPage.length; i++) {
        if (location.href === navPage[i].href) {
            navPage[i].className += " active";
        }
    }

    // * Fonctionne uniquement sur la page "blog"
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

    // * Alert Manager
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

    // * l'effet btn télécharger les logs
    if ($(".btn-see-me")) {
        $(".btn-see-me").click(function () {
            if ($(this).hasClass("btn-see-me")) {
                $(this).removeClass("btn-see-me");
            }
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

    if ($("#form-signup")) {
        $("#form-signup").submit(function () {
            const prenomSignup = $("#prenom-signup");
            const nomSignup = $("#nom-signup");
            const emailSignup = $("#email-signup");
            const passwordSignup = $("#password-signup");
            let send = true;

            if (loginSignUpalidator(prenomSignup)) {
                send = false;
            }
            if (loginSignUpalidator(nomSignup)) {
                send = false;
            }
            if (loginSignUpalidator(emailSignup)) {
                send = false;
            }
            if (loginSignUpalidator(passwordSignup)) {
                send = false;
            }
            return send;
        });
    }

    if ($("#form-login")) {
        $("#form-login").submit(function () {
            // e.preventDefault();
            const emailLogin = $("#email-login");
            const passwordLogin = $("#password-login");
            let send = true;

            if (loginSignUpalidator(emailLogin)) {
                send = false;
            }
            if (loginSignUpalidator(passwordLogin)) {
                send = false;
            }
            return send;
        });
    }
});
