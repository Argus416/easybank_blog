<?php require_once 'template/header.php' ?>
<title>Articls management</title>
</head>

<body>
    <main class="dashboard">
        <?php require_once 'template/dashboard_aside.php' ?>
        <div class="dashboard_body">
            <?php require_once 'template/dashboard_header.php' ?>
            <div class="dashboard_content my_profile">
                <h3> Bienvenu Mohamad </h3>


                <form method="POST">
                    <div class="row">
                        <div class="col-lg-2 current_photo_container">
                            <img class="current_photo" src="style/images/image-currency.jpg" alt="profile_photo">
                            <input class="form-control" type="file" name="photo_profile"
                                accept="image/png, image/gif, image/jpeg" />

                        </div>

                        <div class="col-lg-10">
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="nom" class="form-label">Votre nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="prenom" class="form-label">Votre prenom</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="mdp" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="mdp" id="mdp">
                            </div>
                        </div>
                        <div class="btn-container">
                            <button type="submit" class="btn btn-third-cus">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>

</html>