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
                        <label for="nickname-signup">Nickname</label>
                        <div class="input-parent">
                            <input type="text" name="nickname-signup" id="nickname-signup" placeholder="nickname">
                        </div>
                    </div>

                    <div class="label">
                        <label for="email-signup">Email</label>
                        <div class="input-parent">
                            <input type="text" name="email-signup" id="email-signup" placeholder="Email">
                        </div>
                    </div>

                    <div class="label">
                        <label for="password-signup">Mot de passe</label>
                        <div class="input-parent">
                            <input type="password" name="password-signup" id="password-signup"
                                placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn-secondary-cus btn-submit" value="Me connecter">
                    </div>
                </form>
                <div class="link-parent">
                    <a href="login.php" class="link">
                        Me connecter
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>