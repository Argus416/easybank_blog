<?php require_once 'inc/header.php' ?>

<title>Me connecter</title>

</head>

<body>
    <main class="loginForm">
        <div class="container">
            <div class="form-container">
                <a href="index.php">
                    <img src="<?= "$domain$public"?>style/images/logo.svg" class="logo" alt="logo">
                </a>

                <form method="POST" id="form-login">
                    <input type="hidden" name="token-login" value="<?= $token ?>">
                    <div class="label email-parent">
                        <label for="email-login">Email</label>
                        <div class="input-parent email-parent">
                            <input type="email" name="email-login" id="email-login" placeholder="Email">
                        </div>
                    </div>

                    <div class="label password-parent">
                        <label for="password-login">Mot de passe</label>
                        <div class="input-parent">
                            <input type="password" name="password-login" id="password-login" placeholder="Mot de passe">
                        </div>
                        <p class="text-danger err-text d-none">Veuillez remplir le champs</p>
                    </div>

                    <div class="label">
                        <?= $err; ?>
                    </div>

                    <div class="text-center">
                        <input type="submit" name="login" class="btn-secondary-cus btn-submit" value="Me connecter">
                    </div>
                </form>
                <!-- <div class="link-parent">
                    <a href=" $urlGenerator->generate('signup') " class="link">
                        Créer un compte
                    </a>
                </div> -->
            </div>
        </div>
    </main>
</body>

</html>