<?php require_once 'template/header.php' ?>

<title>Me connecter</title>

</head>

<body>
    <main class="loginSignUpForm">
        <div class="container">
            <div class="form-container">
                <a href="index.php">
                    <img src="style/images/logo.svg" class="logo" alt="logo">
                </a>
                <form method="POST">
                    <div class="label">
                        <label for="email-login">Email</label>
                        <div class="input-parent">
                            <input type="text" name="email-login" id="email-login" placeholder="Email">
                        </div>
                    </div>

                    <div class="label">
                        <label for="password-login">Mot de passe</label>
                        <div class="input-parent">
                            <input type="password" name="password-login" id="password-login" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn-secondary-cus btn-submit" value="Me connecter">
                    </div>
                </form>
                <div class="link-parent">
                    <a href="signup.php" class="link">
                        Créer un compte
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>