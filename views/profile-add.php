<?php require_once 'inc/header.php' ?>
<title>Articls management</title>
</head>

<body>
    <main class="dashboard">
        <?php require_once 'inc/dashboard_aside.php' ?>
        <div class="dashboard_body">
            <?php require_once 'inc/dashboard_header.php' ?>
            <div class="dashboard_content my_profile">
                <h3> Nouveau utilisateur </h3>

                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-2 current_photo_container">
                            <img class="current_photo" src="<?= "$domain$public" ?>style/images/image-currency.jpg"
                                alt="profile_photo">
                            <input class="form-control" type="file" name="photo_profile"
                                accept="image/png, image/gif, image/jpeg" />

                        </div>

                        <div class="col-lg-10">
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="nom" class="form-label">Votre nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom"
                                        value="<?= $user->nom?>">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="prenom" class="form-label">Votre prenom</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom"
                                        value="<?= $user->prenom?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="<?= $user->email?>">
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" name="date-de-naissance" id="date-de-naissance"
                                    value="<?= $user->date_de_naissance?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    value="<?= $user->mdp?>">
                            </div>
                        </div>
                        <div class="btn-container">
                            <button type="submit" name="update-account" class="btn btn-third-cus">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>

</html>