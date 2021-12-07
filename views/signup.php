<?php require_once 'inc/header.php' ?>

<title>Me connecter</title>

</head>

<body>
    <main class="signUpForm">
        <div class="container">
            <div class="form-container">
                <a href="/">
                    <img src="<?= "$domain$public"?>style/images/logo.svg" class="logo" alt="logo">
                </a>
                <p>
                    Il semble que c'est votre premier fois d'utiliser le site. <br>
                    Veuillez créer un compte pour que le site soit utilisable
                </p>
                <form method="POST" id="form-signup">
                    <input type="hidden" name="token-signup" value="<?= $token ?>">
                    <div class="label prenom-signup-container">
                        <div class="input-parent">
                            <input type="text" name="prenom-signup" id="prenom-signup" placeholder="Prénom">
                        </div>
                    </div>

                    <div class="label nom-signup-container">
                        <div class="input-parent">
                            <input type="text" name="nom-signup" id="nom-signup" placeholder="Nom">
                        </div>
                    </div>

                    <div class="label email-signup-container">
                        <div class="input-parent">
                            <input type="email" name="email-signup" id="email-signup" placeholder="Email">
                        </div>
                    </div>

                    <div class="label password-signup-container">
                        <div class="input-parent">
                            <input type="password" name="password-signup" id="password-signup"
                                placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn-secondary-cus btn-submit" name="create-account"
                            value="Créer un compte">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>