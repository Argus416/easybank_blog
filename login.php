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
                        <label for="email">Email</label>
                        <input type="text" name="email-login" id="email" placeholder="Email">
                    </div>

                    <div class="label">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password-login" id="password" placeholder="Mot de passe">
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn-secondary-cus btn-submit" value="Me connecter">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>